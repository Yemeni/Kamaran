<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Item;
use App\Order;
use App\Shipment;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware(['auth', 'auth.redirect']);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		Gate::authorize('admin||manager');

		$ordersChart = $this->ordersChart();

		$pendingOrders = Order::where('order_status', 'pending')->count();
		$pendingShipments = Shipment::where('shipment_status', 'pending')->count();
		$totalSuppliers = Supplier::all()->count();
		$totalItems = Item::all()->count();
		$onHoldInventories = Inventory::where('arrival_status', 0)->count();

		$tobacco = Item::where('name', 'tobacco')->first();

		$latestOrders = Order::latest()->take(5)->get();
		$latestInventories = Inventory::latest()->take(5)->get();

		return view('overview', compact('ordersChart', 'tobacco', 'latestInventories', 'latestOrders', 'pendingOrders', 'pendingShipments', 'totalItems', 'totalSuppliers', 'onHoldInventories'));
	}

	private function ordersChart()
	{
		return app()->chartjs
			->name('Orders')
			->type('line')
			->size(['width' => 700, 'height' => 400])
			->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
			->datasets([
				[
					"label"                => "Approved Orders",
					'backgroundColor'      => '#2ecccc',
					'borderColor'          => '#aaaaaa',
					'pointBackgroundColor' => '#6d2ecc',
					'pointBorderColor'     => '#fff',
					'data'                 => $this->getOrdersStatistics(true),
				],
				[
					"label"                     => "Total Orders",
					'backgroundColor'           => "#3498db",
					'borderColor'               => "rgba(136,136,136,0.5)",
					"pointBorderColor"          => "#fff",
					"pointBackgroundColor"      => "#3498db",
					"pointHoverBackgroundColor" => "#fff",
					'data'                      => $this->getOrdersStatistics(),
				],
			])
			->options([]);
	}

	/**
	 * @return array
	 */
	private function getOrdersStatistics($approved = false): array
	{
		if ($approved)
		{
			$orders = Order::select('id', 'created_at')->where('order_status', 'approved')
				->get()
				->groupBy(function ($date) {
					//return Carbon::parse($date->created_at)->format('Y'); // grouping by years
					return Carbon::parse($date->created_at)->format('m'); // grouping by months
				});
		} else
		{
			$orders = Order::select('id', 'created_at')
				->get()
				->groupBy(function ($date) {
					//return Carbon::parse($date->created_at)->format('Y'); // grouping by years
					return Carbon::parse($date->created_at)->format('m'); // grouping by months
				});
		}

		$ordermcount = [];
		$orderArr = [];

		foreach ($orders as $key => $value)
		{
			$ordermcount[(int) $key] = count($value);
		}

		for ($i = 1; $i <= 12; $i ++)
		{
			if (!empty($ordermcount[$i]))
			{
				$orderArr[] = $ordermcount[$i];
			} else
			{
				$orderArr[] = 0;
			}
		}

		return $orderArr;
	}
}
