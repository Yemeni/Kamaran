<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Category;
use App\Inventory;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class InventoryController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showInventoryReports()
	{
		Gate::authorize('admin||manager||employee||inventory');

		$inventories = Inventory::query();

		if (\request()->has('category_id'))
		{
			if (\request('category_id') != 'all')
			{
				$inventories = $inventories->where('category_id', \request('category_id'));
			}
		}
		if (\request()->has('item_id'))
		{
			if (\request('item_id') != 'all')
			{
				$inventories = $inventories->whereIn('item_id', \request('item_id'));
			}
		}
		if (\request()->has('status'))
		{
			if (\request('status') != 'all'){
				$inventories = $inventories->where('transaction_type', \request('status'));
			}
		}
		if (\request()->has('from'))
		{
			if (\request('from') != ''){
				$inventories = $inventories->where('date', '>=', Carbon::createFromFormat('Y-m-d H:i', \request('from')));
			}
		}
		if (\request()->has('to'))
		{
			if (\request('to') != ''){
				$inventories = $inventories->where('date', '<=', Carbon::createFromFormat('Y-m-d H:i', \request('to')));
			}
		}

		$inventories = $inventories->where('arrival_status', 1)->get();

		$categories = Category::orderBy('name', 'asc')->get();
		$items = Item::orderBy('name', 'asc')->get();

        $reportHeader = array();

        $category_id = request('category_id');
        $reportHeader['category'] = is_object(Category::where('id', $category_id)->first()) ? Category::where('id', $category_id)->first()->name : 'All Departments';

        $item_id = request('item_id');
        $reportHeader['item'] = is_object(Item::where('id', $item_id)->first()) ? "Item " . Item::where('id', $item_id)->first()->name : 'All Items';
//        $reportHeader['item'] = isset($item_id[1]) ? 'Selected Items' : 'All Items 2';
        if(isset($item_id[1])){
            $reportHeader['item'] ='Selected Items';
        }


        $status = request('status');
        if(!is_object(Inventory::where('transaction_type', $status)->first())){
            $reportHeader['status'] = 'All';
        }else{
//            $reportHeader['status'] = $status;
            switch($status) {
                case 'voucher':
                    $reportHeader['status'] = "In Stock";
                    break;
                case 'initial_balance':
                    $reportHeader['status'] = "Initial Balance";
                    break;
                case 'surplus':
                    $reportHeader['status'] = "Surplus";
                    break;
                case 'on_hold':
                    $reportHeader['status'] = "On Hold";
                    break;
                case 'consume':
                    $reportHeader['status'] = "Consume";
                    break;
                case 'returns':
                    $reportHeader['status'] = "Returns";
                    break;
                case 'shortage':
                    $reportHeader['status'] = "Shortage";
                    break;
                case 'normal_shortage':
                    $reportHeader['status'] = "Normal Shortage";
                    break;

                default:
                    // you should not end up here
            }

        }


        $fromDate = request('from');
        $reportHeader['fromDate'] = is_null($fromDate) ? "" : "- From Date: " . $fromDate;

        $toDate = request('to');
        $reportHeader['toDate'] = is_null($toDate) ? "" : "- To Date: " . $toDate;

        session()->put('filtered', $inventories);
		session()->put('reportHeader', $reportHeader);

		return view('inventory', compact('inventories', 'items', 'categories'));
	}
    public function showIncomingShipments()
    {
        Gate::authorize('admin||inventory');
        $onHold = Inventory::where('arrival_status', 0)->get();
        return view('inventory_incoming_shipments', compact('onHold'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		Gate::authorize('admin||inventory');

		$items = Item::whereHas('inventory')->get();


		return view('inventory_transaction', compact('items'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(Request $request)
	{
		Gate::authorize('admin||inventory');

		$item = '';
		if ($request->item_id)
		{
			$item = Item::find($request->item_id);
		}

//		$total = array();
        $total = 0;
		$result = '';
		$pos = ['voucher', 'initial_balance', 'surplus'];

		foreach ($item->inventory as $inv)
		{
			if (in_array($inv->transaction_type, $pos))
			{
				$total += $inv->quantity;
			} else
			{
			    if($inv->arrival_status){
                    $total -= $inv->quantity;
            }

			}
		}

		$result = (string) number_format($total);


		$request->validate([
			'transaction_type' => [
				'required',
				Rule::in(['voucher', 'on_hold', 'consume', 'initial_balance', 'returns', 'surplus', 'shortage', 'normal_shortage'])
			],
			'item_id'          => 'required|exists:items,id',
			'date'             => 'required|date',
			'quantity'         => 'required|numeric|max:' . $total,
		]);

		Inventory::create([
			'transaction_type' => $request->transaction_type,
			'item_id'          => $request->item_id,
			'date'             => Carbon::createFromFormat('Y-m-d H:i', $request->date),
			'quantity'         => $request->quantity,
			'category_id'      => $item->category_id,
			'user_id'          => auth()->id(),
			'arrival_status'   => 1
		]);

		Alert::flash('New inventory has been added', 'success');

		return redirect('/inventory');
	}

	public function print()
	{
		Gate::authorize('admin||manager||employee||inventory');


		$pos = ['voucher', 'initial_balance', 'surplus'];


		foreach (session('filtered') as $inv)
		{
            $total[$inv->item_id]['total'] = isset($total[$inv->item_id]['total']) ? $total[$inv->item_id]['total'] : 0;
            if(!isset($total[$inv->item_id]['name'])){
                $total[$inv->item_id]['name'] = Item::where('id', $inv->item_id)->first()->name;
                $total[$inv->item_id]['unit'] = Item::where('id', $inv->item_id)->first()->unit;
            }


            if (in_array($inv->transaction_type, $pos))
			{
				$total[$inv->item_id]['total'] += $inv->quantity;
			} else
			{
				$total[$inv->item_id]['total'] -= $inv->quantity;
			}
		}

//        foreach($questions as $key => $question){
//            $questions[$key]['answers'] = $answers_model->get_answers_by_question_id($question['question_id']);
//        }

        if(isset($total)){
        foreach ($total as $key => $tot) {
            $total[$key]['total'] = (string)number_format($tot['total']);
        }
            $result = $total;

        }else{
            $result = array();
        }
//        foreach($total as $key => $tot){
//            $total[$key]['total']  = (string)number_format($tot['total']);
//        }


//        $result = array_map(function($var){
//            return (string) number_format($var);
//        }, $total);


        $reportHeader = session('reportHeader');

		return view('print_report', ['inventories' => session('filtered'), 'result' => $result, 'reportHeader' => $reportHeader]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Inventory $inventory
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function approved(Inventory $inventory)
	{
		Gate::authorize('admin||inventory');

		$inventory->update([
			'arrival_status'   => 1,
			'date'             => Carbon::now()->timestamp,
			'user_id'          => auth()->id(),
			'transaction_type' => 'voucher',
		]);

		Alert::flash('The Inventory has been approved', 'success');

		return back();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Inventory $inventory
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Inventory $inventory)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Inventory           $inventory
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Inventory $inventory)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Inventory $inventory
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Inventory $inventory)
	{
		//
	}
}
