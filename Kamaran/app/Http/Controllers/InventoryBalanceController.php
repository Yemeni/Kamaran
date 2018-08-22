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

    public $itemNames = array('Tobacco','Tobacco3','Tobacco','Tobacco4');

    public function index()
    {
        Gate::authorize('admin||manager');

        $balance = $this->quantityCalculator();
        $percentage = $this->percentageCalculator(false);
        $itemNames = $this->itemNames;
//

        return view('inventory_balance', compact('balance','percentage','itemNames'));
    }


    private function quantityCalculator($withUnit = true){
//        $itemName = $this->itemName;
        foreach($this->itemNames as $itemName) {
            if (Item::where('name', $itemName)->first()) {

                $currentOrdered = Item::where('name', $itemName)->first()
                    ->pendingOrders($withUnit, $itemName);

                $currentShipping = Item::where('name', $itemName)->first()
                    ->shippingItems($withUnit, $itemName);

                $currentInventory = Item::where('name', $itemName)->first()
                    ->inventoryBalance($withUnit);
            }else{
                $currentOrdered = 0;
                $currentShipping = 0;
                $currentInventory = 0;
            }
                $data[$itemName]['currentOrdered'] = $currentOrdered;
                $data[$itemName]['currentShipping'] = $currentShipping;
                $data[$itemName]['currentInventory'] = $currentInventory;

        }
        return ($data);

    }

    private function percentageCalculator(){
        $percentage = $this->quantityCalculator(false);
        foreach($this->itemNames as $itemName) {
            if(Item::where('name', $itemName)->first()) {
                $total = $percentage[$itemName]['currentOrdered']
                    + $percentage[$itemName]['currentShipping']
                    + $percentage[$itemName]['currentInventory'];

                if ($total <= 0) {
                    $total = 1;
                }

                $data[$itemName]['currentOrdered'] = (($percentage[$itemName]['currentOrdered'] / $total) * 76) + 8;
                $data[$itemName]['currentShipping'] = (($percentage[$itemName]['currentShipping'] / $total) * 76)+ 8;
                $data[$itemName]['currentInventory'] = (($percentage[$itemName]['currentInventory'] / $total) * 76)+ 8;
                while(($data[$itemName]['currentOrdered'] + $data[$itemName]['currentShipping'] + $data[$itemName]['currentInventory']) < 99.9){
                    $data[$itemName]['currentOrdered'] += 0.1;
                    $data[$itemName]['currentShipping'] += 0.1;
                    $data[$itemName]['currentInventory'] += 0.1;
                }
            }else{
                $data[$itemName]['currentOrdered'] = 33.3;
                $data[$itemName]['currentShipping'] = 33.3;
                $data[$itemName]['currentInventory'] = 33.3;
            }
        }
        return ($data);
    }

}
