<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller {

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

		return view('fill_order');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
			'order_status' => 'approved',
			'approved_date' => Carbon::now()->timestamp
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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Order               $order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Order $order)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Order $order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Order $order)
	{
		//
	}
}
