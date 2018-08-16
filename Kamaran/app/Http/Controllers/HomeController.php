<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Item;
use App\Order;
use App\Shipment;
use App\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$pendingOrders = Order::where('order_status', 'pending')->count();
		$pendingShipments = Shipment::where('shipment_status', 'pending')->count();
		$totalSuppliers = Supplier::all()->count();
		$totalItems = Item::all()->count();
		$onHoldInventories = Inventory::where('arrival_status', 0)->count();

		$latestOrders = Order::latest()->take(5)->get();
		$latestInventories = Inventory::latest()->take(5)->get();

		return view('overview', compact('latestInventories','latestOrders','pendingOrders', 'pendingShipments', 'totalItems', 'totalSuppliers', 'onHoldInventories'));
	}
}
