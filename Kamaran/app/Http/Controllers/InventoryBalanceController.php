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

class InventoryBalanceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'auth.redirect']);
    }

    public function index()
    {
        Gate::authorize('admin||manager');

        //$ordered = $this->ordered();

//        $users = DB::table('users')->where([
//            ['status', '=', '1'],
//            ['subscribed', '<>', '1'],
//        ])->get();

//        $currentOrdered = Item::where('name', 'Tobacco')->first()
//            ->order()->where('order_status', 'pending')->get()->sum('quantity');

        $currentOrdered = Item::where('name', 'Tobacco')->first()
            ->pendingOrders();

        $itemOrders = Item::where('name', 'Tobacco')->first()
            ->order()->select('id')->get();

        $currentShipping = Shipment::whereIn('order_id', $itemOrders)->whereIn('shipment_status' ,['on_hold','moving','delayed'])->get()->sum('quantity');

        $currentInventory = Item::where('name', 'Tobacco')->first()
            ->inventoryBalance();
//        $currentOrdered = Order::where([
//            ['order_status', 'pending'],
//            ['']
//        ])->orWhere('order_status', 'approved')->count();
//        $pendingOrders = Order::where('order_status', 'pending')->count();
//        $pendingShipments = Shipment::where('shipment_status', 'pending')->count();
//        $totalSuppliers = Supplier::all()->count();
//        $totalItems = Item::all()->count();
//        $onHoldInventories = Inventory::where('arrival_status', 0)->count();
//
//        $tobacco = Item::where('name', 'Tobacco')->first();
//
//        if (Item::where('name','tobacco')->first())
//        {
//            $consumedTobacco = Item::where('name', 'Tobacco')->first()
//                ->inventory()->where('transaction_type', 'consume')->where(\DB::raw('MONTH(created_at)'), '=', date('n') - 1)->get()->sum('quantity');
//
//            $orderedTobacco = Item::where('name', 'Tobacco')->first()
//                ->order()->where(\DB::raw('MONTH(created_at)'), '=', date('n') - 1)->get()->sum('quantity');
//        }
//
//        $latestOrders = Order::latest()->take(5)->get();
//        $latestInventories = Inventory::where('arrival_status', 1)->latest()->take(5)->get();

//        return view('inventory_balance', compact('tobaccoChart', 'consumedTobacco', 'orderedTobacco', 'ordersChart', 'tobacco', 'latestInventories', 'latestOrders', 'pendingOrders', 'pendingShipments', 'totalItems', 'totalSuppliers', 'onHoldInventories'));
        return view('inventory_balance', compact('currentOrdered', 'currentShipping', 'currentInventory'));
    }

}
