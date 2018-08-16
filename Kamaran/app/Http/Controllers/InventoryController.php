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
	public function index()
	{
		Gate::authorize('admin||inventory');

		$onHold = Inventory::where('arrival_status', 0)->get();
		$inventories = Inventory::query();

		if (\request()->has('category_id'))
		{
			$inventories = $inventories->where('category_id', \request('category_id'));
		}
		if (\request()->has('item_id'))
		{
			$inventories = $inventories->where('item_id', \request('item_id'));
		}
		if (\request()->has('status'))
		{
			$inventories = $inventories->where('transaction_type', \request('status'));
		}

		$inventories = $inventories->get();

		$categories = Category::orderBy('name', 'asc')->get();
		$items = Item::orderBy('name', 'asc')->get();

		session()->put('filtered', $inventories);

		return view('inventory', compact('onHold', 'inventories', 'items', 'categories'));
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
				$total -= $inv->quantity;
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
		Gate::authorize('admin||inventory');

		$total = 0;
		$result = '';
		$pos = ['voucher', 'initial_balance', 'surplus'];

		foreach (session('filtered') as $inv)
		{
			if (in_array($inv->transaction_type, $pos))
			{
				$total += $inv->quantity;
			} else
			{
				$total -= $inv->quantity;
			}
		}

		$result = (string) number_format($total);

		return view('print_reports', ['inventories' => session('filtered'), 'result' => $result]);
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
