<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	protected $fillable = ['category_id', 'name', 'description', 'specification', 'unit', 'danger_level'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function inventory()
	{
		return $this->hasMany(Inventory::class);
	}

	public function orders()
    {
        return $this->hasMany(Order::class);
    }


	public function suppliers()
	{
		return $this->belongsToMany(Supplier::class, 'catalogs');
	}

	public function inventoryBalance($withString = true)
	{
		$total = 0;
//		$pos = ['voucher', 'initial_balance', 'surplus'];

		foreach ($this->inventory as $inv)
		{
		    switch($inv->transaction_type){
                case 'voucher':
                case 'initial_balance':
                case 'surplus':
                    $total += $inv->quantity;
                    break;
                case 'on_hold':
                    if($inv->arrival_status){
                        $total += $inv->quantity;
                    }
                    break;
                case 'consume':
                case 'returns':
                case 'shortage':
                case 'normal_shortage':
                    $total -= $inv->quantity;
                    break;

                default:
                    // you should not end up here
        }

		}

		if ($withString)
			return (string) number_format($total) . ' ' . $this->unit;

		return $total;
	}

    public function pendingOrders($withString = true , $itemName)
    {
        $total = 0;

        foreach ($this->orders as $order)
        {
            if ($order->order_status != 'cancelled')
            {
                $total += $order->quantity;
            }

        }

        $itemOrders = Item::where('name', $itemName)->first()
            ->order()->select('id')->get();

        $total -= Shipment::whereIn('order_id', $itemOrders)->whereIn('shipment_status' ,['on_hold','moving','delayed','arrived'])->get()->sum('quantity');


        if ($withString)
            return (string) number_format($total) . ' ' . $this->unit;

        return $total;
    }

    public function shippingItems($withString = true, $itemName)
    {
        $pos = ['on_hold','moving','delayed'];
        $total = 0;
        $itemOrders = Item::where('name', $itemName)->first()
            ->order()->select('id')->get();

        $total += Shipment::whereIn('order_id', $itemOrders)->whereIn('shipment_status' ,['on_hold','moving','delayed','arrived'])->get()->sum('quantity');
        //$total -= Shipment::whereIn('order_id', $itemOrders)->whereIn('shipment_status' ,['cancelled'])->get()->sum('quantity');
        //TODO: fix bug where accepting shipment then sending it counts it twice
        if ($withString)
            return (string) number_format($total) . ' ' . $this->unit;

        return $total;
    }

	public function order()
	{
		return $this->hasOne(Order::class);
	}
}
