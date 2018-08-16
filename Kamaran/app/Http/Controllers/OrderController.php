<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Category;
use App\Order;
use App\Shipment;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class OrderController extends Controller {

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
		Gate::authorize('admin||manager');

		$pendingOrders = Order::where('order_status', 'pending')->get();
		$approvedOrders = Order::where('order_status', 'approved')->get();
		$cancelledOrders = Order::where('order_status', 'cancelled')->get();

		return view('review_orders', compact('pendingOrders', 'approvedOrders', 'cancelledOrders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		Gate::authorize('admin||manager||employee');

		$suppliers = Supplier::orderBy('name', 'asc')->get();
		$categories = Category::orderBy('name', 'asc')->get();

		return view('fill_order', compact('suppliers', 'categories'));
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
		$request->validate([
			'date'             => 'required|date',
			'letter_of_credit' => [
				'required',
				Rule::in(['cif', 'cf', 'fob', 'cfr', 'other']),
			],
			'supplier_id'      => 'required|exists:suppliers,id',
			'comment'          => 'nullable',
			'item_id'          => 'required|exists:items,id',
			'quantity'         => 'required|integer',
			'cost'             => 'required|integer',
		]);

		Order::create([
			'date'             => Carbon::createFromFormat('Y-m-d H:i', $request->date),
			'letter_of_credit' => $request->letter_of_credit,
			'supplier_id'      => $request->supplier_id,
			'comment'          => $request->comment,
			'item_id'          => $request->item_id,
			'quantity'         => $request->quantity,
			'cost'             => $request->cost,
			'user_id'          => auth()->id(),
			'category_id'      => auth()->user()->isAdmin() ? $request->category_id : auth()->user()->category_id
		]);

		Alert::flash('New order has been added', 'success');

		return redirect('/review_orders');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Order $order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Order $order)
	{
		//
	}

	/**
	 * @param Order $order
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function approve(Order $order)
	{
		$this->authorize('statusChange', $order);

		$order->update([
			'order_status'  => 'approved',
			'approved_date' => Carbon::now()->timestamp
		]);

		Shipment::create([
			'order_id'    => $order->id,
			'user_id'     => auth()->id(),
			'category_id' => auth()->user()->category_id,
			'date'        => Carbon::now()->timestamp
		]);

		Alert::flash('Order has been approved', 'success');

		return back();
	}

	/**
	 * @param Order $order
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function cancel(Order $order)
	{
		$this->authorize('statusChange', $order);

		$order->update([
			'order_status' => 'cancelled',
		]);

		Alert::flash('Order has been cancelled', 'success');

		return back();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Order $order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Order $order)
	{
		Gate::authorize('admin||manager||employee');

		$suppliers = Supplier::with('items')->orderBy('name', 'asc')->get();
		$categories = Category::orderBy('name', 'asc')->get();

		return view('edit_order', compact('order', 'suppliers', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Order               $order
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(Request $request, Order $order)
	{
		$request->validate([
			'date'             => 'required|date',
			'letter_of_credit' => [
				'required',
				Rule::in(['cif', 'cf', 'fob', 'cfr', 'other']),
			],
			'supplier_id'      => 'required|exists:suppliers,id',
			'comment'          => 'nullable',
			'item_id'          => 'required|exists:items,id',
			'quantity'         => 'required|integer',
			'cost'             => 'required|integer',
		]);

		$order->update([
			'date'             => Carbon::createFromFormat('Y-m-d H:i', $request->date),
			'letter_of_credit' => $request->letter_of_credit,
			'supplier_id'      => $request->supplier_id,
			'comment'          => $request->comment,
			'item_id'          => $request->item_id,
			'quantity'         => $request->quantity,
			'cost'             => $request->cost,
			'user_id'          => auth()->id(),
			'category_id'      => auth()->user()->isAdmin() ? $request->category_id : auth()->user()->category_id
		]);

		Alert::flash('Order has been updated', 'success');

		return redirect('/review_orders');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Order $order
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Order $order)
	{
		$order->delete();

		Alert::flash('Order has been deleted', 'success');

		return back();
	}
}
