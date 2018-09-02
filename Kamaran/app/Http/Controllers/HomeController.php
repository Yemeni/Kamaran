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
		Gate::authorize('admin||inventory');

		$ordersChart = $this->ordersChart();
		$tobaccoChart = $this->tobaccoChart();

		$pendingOrders = Order::where('order_status', 'pending')->count();
		$pendingShipments = Shipment::where('arrival_date', null)->where('expected_date', null)->count();
		$totalSuppliers = Supplier::all()->count();
		$totalItems = Item::all()->count();
		$onHoldInventories = Inventory::where('arrival_status', 0)->count();

		$tobacco = Item::where('name', 'Tobacco')->first();
        $currentTobacco = $tobacco->inventoryBalance(false);
        $tobaccoUnit = $tobacco->unit;
		if ($tobacco)
		{
			$consumedTobacco = $tobacco
				->inventory()->where('transaction_type', 'consume')->where(\DB::raw('MONTH(date)'), '=', date('m') - 1)->get()->sum('quantity');

			$orderedTobacco = $tobacco
				->order()->where(\DB::raw('MONTH(date)'), '=', date('m') - 1)->get()->sum('quantity');
		}

		$latestOrders = Order::latest()->take(5)->get();
		$latestInventories = Inventory::where('arrival_status', 1)->latest()->take(5)->get();

		return view('overview', compact('tobaccoChart', 'consumedTobacco', 'orderedTobacco', 'ordersChart', 'tobacco', 'currentTobacco', 'tobaccoUnit', 'latestInventories', 'latestOrders', 'pendingOrders', 'pendingShipments', 'totalItems', 'totalSuppliers', 'onHoldInventories'));
	}

	private function tobaccoChart()
	{
		return app()->chartjs
			->name('Tobacco')
			->type('bar')
			->size(['width' => 700, 'height' => 400])
			->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
			->datasets([
				[
					'data'                 => $this->getTobaccoStatistics(true),
					'backgroundColor'      => '#3498db',
					'borderColor'          => 'rgba(136,136,136,0.5)',
					'pointBackgroundColor' => '#3498db',
					'pointBorderColor'     => '#fff',
					'label'                => "Tobacco Consumed",
				],
				[
					'data'                 => $this->getTobaccoStatistics(false, true),
					'backgroundColor'      => '#2ecccc',
					'borderColor'          => '#aaaaaa',
					'pointBackgroundColor' => '#6d2ecc',
					'pointBorderColor'     => '#fff',
					'label'                => "Tobacco Ordered"
				]
			])
			->options([]);

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
	private function getTobaccoStatistics($consumed = false, $orders = false)
	{
        $tobacco = Item::where('name', 'Tobacco')->first();
		if ($tobacco){
			if ($consumed){
                $totalConsumedArray =[];
                for ($index = 0; $index <= 11; $index++) {
                    // TODO: fetch year date from system time instead of 2018
                    // TODO: the query is heavy
                    $totalConsumedArray[$index] = $tobacco->inventory()->where('transaction_type', 'consume')->whereYear('date', '=', date('2018'))->whereMonth('date', '=', date($index + 1))
                        ->get()->sum('quantity');
                }
                return $totalConsumedArray;

			}elseif ($orders){
                $totalOrdersArray =[];
                for ($index = 0; $index <= 11; $index++) {

                    // TODO: fetch year date from system time instead of 2018
                    // TODO: the query is heavy
                    $totalOrdersArray[$index] =
                        $tobacco->order()->where('order_status', 'approved')->whereYear('date', '=', date('2018'))->whereMonth('date', '=', date($index+1))
                        ->get()->sum('quantity');
                }
                return $totalOrdersArray;
			}

//			$tobaccomcount = [];
//			$tobaccoArr = [];
//			$totalTo = 0;
//
//			foreach ($tobaccos as $key => $value)
//			{
//				foreach ($value as $tob){
//					$totalTo += $tob->quantity;
//				}
//				$tobaccomcount[(int) $key] = $totalTo;
//			}
//
//			for ($i = 1; $i <= 12; $i ++)
//			{
//				if (!empty($tobaccomcount[$i]))
//				{
//					$tobaccoArr[] = $tobaccomcount[$i];
//				} else
//				{
//					$tobaccoArr[] = 0;
//				}
//			}
//
//			return $tobaccoArr;
		}

		return false;
	}

	/**
	 * @return array
	 */
	private function getOrdersStatistics($approved = false): array
	{
		if ($approved)
		{
			$orders = Order::select('id', 'approval_date')->where('order_status', 'approved')
				->get()
				->groupBy(function ($date) {
					//return Carbon::parse($date->created_at)->format('Y'); // grouping by years
					return Carbon::parse($date->approval_date)->format('m'); // grouping by months
				});
		} else
		{
			$orders = Order::select('id', 'date')
				->get()
				->groupBy(function ($date) {
					//return Carbon::parse($date->created_at)->format('Y'); // grouping by years
					return Carbon::parse($date->date)->format('m'); // grouping by months
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
