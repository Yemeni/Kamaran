<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Item;
use App\Order;
use App\Shipment;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        $consumption = $this->consumptionCalculator();
        $items = Item::select('id', 'name','important')->get()->toArray();

        return view('inventory_balance', compact('balance','percentage','items', 'consumption'));
    }

    private function getItems(){
        return Item::pluck('id')->toArray();
    }


    private function quantityCalculator($withUnit = true){
        $items = $this->getItems();
        foreach($items as $item) {
            if (Item::where('id', $item)->first()) {

                $currentOrdered = Item::where('id', $item)->first()
                    ->pendingOrders($withUnit, $item);

                $currentShipping = Item::where('id', $item)->first()
                    ->shippingItems($withUnit, $item);

                $currentInventory = Item::where('id', $item)->first()
                    ->inventoryBalance($withUnit);

            }else{
                $currentOrdered = 0;
                $currentShipping = 0;
                $currentInventory = 0;
            }
                $data[$item]['currentOrdered'] = $currentOrdered;
                $data[$item]['currentShipping'] = $currentShipping;
                $data[$item]['currentInventory'] = $currentInventory;

        }
        return ($data);

    }

    private function percentageCalculator(){
        $percentage = $this->quantityCalculator(false);
        $items = $this->getItems();
        foreach($items as $item) {
            if(Item::where('id', $item)->first()) {
                $total = $percentage[$item]['currentOrdered']
                    + $percentage[$item]['currentShipping']
                    + $percentage[$item]['currentInventory'];

                if ($total <= 0) {
                    $total = 1;
                }

                $data[$item]['currentOrdered'] = (($percentage[$item]['currentOrdered'] / $total) * 76) + 8;
                $data[$item]['currentShipping'] = (($percentage[$item]['currentShipping'] / $total) * 76)+ 8;
                $data[$item]['currentInventory'] = (($percentage[$item]['currentInventory'] / $total) * 76)+ 8;
                while(($data[$item]['currentOrdered'] + $data[$item]['currentShipping'] + $data[$item]['currentInventory']) < 99.9){
                    $data[$item]['currentOrdered'] += 0.1;
                    $data[$item]['currentShipping'] += 0.1;
                    $data[$item]['currentInventory'] += 0.1;
                }
            }else{
                $data[$item]['currentOrdered'] = 33.3;
                $data[$item]['currentShipping'] = 33.3;
                $data[$item]['currentInventory'] = 33.3;
            }
        }
        return ($data);
    }

    private function consumptionCalculator(){
        $items = $this->getItems();
        foreach($items as $item){
            $itemInventory = Item::where('id', $item)->first();
            // TODO: use system month instead of static number
            $year = 2018;
            $month = 8;
            $data[$item]['consumptionLastMonth'] = $itemInventory->inventory()->where('transaction_type', 'consume')
                ->whereYear('date', '=', date($year))
                ->whereMonth('date', '=', date($month-1)) // exception when last month is January, it returns month 0
                ->get()->sum('quantity');

            $data[$item]['consumptionThisMonth'] = $itemInventory->inventory()->where('transaction_type', 'consume')
                ->whereYear('date', '=', date($year))
                ->whereMonth('date', '=', date($month))
                ->get()->sum('quantity');
        }
        return ($data);
    }

}