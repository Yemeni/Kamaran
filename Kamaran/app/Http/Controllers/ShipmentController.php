<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ShipmentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		Gate::authorize('admin||manager||employee');

		$pending = Shipment::with(['user', 'order.item'])->where('arrival_date', null)
			->where('expected_date', null)->get();
		$onHold = Shipment::with(['user', 'order.item'])->where('shipment_status', 'on_hold')->get();

		return view('track_shipments', compact('pending', 'onHold'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
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
	 * @param  \App\Shipment $shipment
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Shipment $shipment)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Shipment $shipment
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Shipment $shipment)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Shipment            $shipment
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(Request $request, Shipment $shipment)
	{
		$this->authorize('update', $shipment);

		$request->validate([
			'arrival_date'    => 'required|date',
			'expected_date'   => 'required|date',
			'quantity'        => 'required|numeric|max:' . ($shipment->order->quantity - $shipment->order->shipmentTotalQuantity()),
			'shipment_status' => [
				'required',
				Rule::in(['on_hold', 'moving', 'cancelled', 'arrived', 'delayed'])
			],
		]);


		if ((int) $request->quantity < ($shipment->order->quantity - $shipment->order->shipmentTotalQuantity()))
		{
			Shipment::create([
				'order_id'        => $shipment->order->id,
				'user_id'         => $shipment->user->id,
				'category_id'     => $shipment->category_id,
				'partial'         => 1,
				'expected_date'   => Carbon::createFromFormat('Y-m-d H:i', $request->expected_date),
				'arrival_date'    => Carbon::createFromFormat('Y-m-d H:i', $request->arrival_date),
				'quantity'        => $request->quantity,
				'shipment_status' => $request->shipment_status,
				'date'            => Carbon::now()->timestamp
			]);

			$shipment->update([
				'partial' => 1,
			]);
		} else
		{
			$shipment->update([
				'expected_date'   => Carbon::createFromFormat('Y-m-d H:i', $request->expected_date),
				'arrival_date'    => Carbon::createFromFormat('Y-m-d H:i', $request->arrival_date),
				'quantity'        => $request->quantity,
				'shipment_status' => $request->shipment_status,
			]);
		}

		Alert::flash('The shipment has been updated', 'success');

		return redirect('/track_shipments');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Shipment $shipment
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Shipment $shipment)
	{
		//
	}
}
