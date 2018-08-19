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

        $balance = $this->quantityCalculator();
        $percentage = $this->percentageCalculator(false);

//

        return view('inventory_balance', compact('balance','percentage'));
    }

    private function quantityCalculator($withUnit = true , $itemName ='Tobacco3'){

        $currentOrdered = Item::where('name', $itemName)->first()
            ->pendingOrders($withUnit);

        $currentShipping = Item::where('name', $itemName)->first()
            ->shippingItems($withUnit , $itemName);

        $currentInventory = Item::where('name', $itemName)->first()
            ->inventoryBalance($withUnit);

        $data['currentOrdered'] = $currentOrdered;
        $data['currentShipping'] = $currentShipping;
        $data['currentInventory'] = $currentInventory;

        return ($data);

    }

    private function percentageCalculator(){
        $percentage = $this->quantityCalculator(false);

        $total = $percentage['currentOrdered']
            + $percentage['currentShipping']
            + $percentage['currentInventory'];

        if($total <= 0){
            $total = 1;
        }

        $data['currentOrdered'] = ($percentage['currentOrdered']/$total) * 100;
        $data['currentShipping'] = ($percentage['currentShipping']/$total) * 100;
        $data['currentInventory'] = ($percentage['currentInventory']/$total) * 100;

        return ($data);
    }

}
