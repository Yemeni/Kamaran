<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Inventory;
use App\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ShipmentController extends Controller {

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
		Gate::authorize('admin||manager||employee');

		$pending = Shipment::with(['user', 'order.item'])->where('arrival_date', null)
			->where('expected_date', null)->get();
		$onHold = Shipment::with(['user', 'order.item'])->where('shipment_status', 'on_hold')
			->where('arrival_date', '!=', null)
			->where('expected_date', '!=', null)->get();
		$moving = Shipment::with(['user', 'order.item'])->where('shipment_status', 'moving')
			->where('arrival_date', '!=', null)
			->where('expected_date', '!=', null)->get();
		$cancelled = Shipment::with(['user', 'order.item'])->where('shipment_status', 'cancelled')
			->where('arrival_date', '!=', null)
			->where('expected_date', '!=', null)->get();
		$delayed = Shipment::with(['user', 'order.item'])->where('shipment_status', 'delayed')
			->where('arrival_date', '!=', null)
			->where('expected_date', '!=', null)->get();
		$arrived = Shipment::with(['user', 'order.item'])->where('shipment_status', 'arrived')
			->where('arrival_date', '!=', null)
			->where('expected_date', '!=', null)->get();

		return view('track_shipments', compact('pending', 'onHold', 'moving', 'cancelled', 'delayed', 'arrived'));
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
			'expected_date'   => 'required|date',
			'quantity'        => 'nullable|numeric|max:' . ($shipment->order->quantity - $shipment->order->shipmentTotalQuantity()),
			'shipment_status' => [
				'required',
				Rule::in(['on_hold', 'moving', 'cancelled', 'arrived', 'delayed'])
			],
			'invoice'         => 'required|integer',
		]);

		if ($request->has('quantity'))
		{
			if ((int) $request->quantity < ($shipment->order->quantity - $shipment->order->shipmentTotalQuantity()))
			{
				Shipment::create([
					'order_id'        => $shipment->order->id,
					'user_id'         => $shipment->user->id,
					'category_id'     => $shipment->category_id,
					'partial'         => 1,
					'expected_date'   => Carbon::createFromFormat('Y-m-d H:i', $request->expected_date),
					'invoice'         => $request->invoice,
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
					'invoice'         => $request->invoice,
					'quantity'        => $request->quantity,
					'shipment_status' => $request->shipment_status,
				]);
			}
		} else
		{
			$shipment->update([
				'expected_date'   => Carbon::createFromFormat('Y-m-d H:i', $request->expected_date),
				'invoice'         => $request->invoice,
				'shipment_status' => $request->shipment_status,
			]);
		}

		if ($request->shipment_status == 'arrived'){
			Inventory::create([
				'category_id' => $shipment->category_id,
				'item_id' => $shipment->order->item->id,
				'transaction_type' => 'on_hold',
				'quantity' => $shipment->quantity,
				'arrival_status' => 0,
				'arrival_date'    => Carbon::createFromFormat('Y-m-d H:i', $request->arrival_date),
			]);
		}

		Alert::flash('The shipment has been updated', 'success');

		return redirect('/track_shipments');
	}

	/**
	 * @param Shipment $shipment
	 * @param          $status
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function changeStatus(Shipment $shipment, $status)
	{
		$this->authorize('update', $shipment);

		if ($status == 'arrived'){
			Inventory::create([
				'category_id' => $shipment->category_id,
				'item_id' => $shipment->order->item->id,
				'transaction_type' => 'on_hold',
				'quantity' => $shipment->quantity,
				'arrival_date'    => Carbon::createFromFormat('Y-m-d H:i', $shipment->arrival_date),
				'arrival_status' => 0,
			]);
		}

		$shipment->update([
			'shipment_status' => $status
		]);

		Alert::flash('The shipment has been updated', 'success');

		return back();
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
