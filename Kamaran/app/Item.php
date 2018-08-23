<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	protected $fillable = ['category_id', 'name', 'description', 'specification', 'unit', 'danger_level', 'important'];

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

    public function pendingOrders($withString = true , $item)
    {
        $total = 0;

        foreach ($this->orders as $order)
        {
            if ($order->order_status != 'cancelled')
            {
                $total += $order->quantity;
            }

        }

        $itemOrders = Item::where('id', $item)->first()
            ->order()->select('id')->get();

        $total -= Shipment::whereIn('order_id', $itemOrders)->whereIn('shipment_status' ,['on_hold','moving','delayed','arrived','cancelled'])->get()->sum('quantity');


        if ($withString)
            return (string) number_format($total) . ' ' . $this->unit;

        return $total;
    }

    public function shippingItems($withString = true, $item)
    {
        $total = 0;
        $itemOrders = Item::where('id', $item)->first()
            ->order()->select('id')->get();

        $total += Shipment::whereIn('order_id', $itemOrders)->whereIn('shipment_status' ,['on_hold','moving','delayed','arrived'])->get()->sum('quantity');
        $total -= Inventory::with('shipment')->get()->where('item_id' , $item)->where('arrival_status', 1)->where('transaction_type','voucher')->sum('quantity');
        if ($withString)
            return (string) number_format($total) . ' ' . $this->unit;

        return $total;
    }

	public function order()
	{
		return $this->hasOne(Order::class);
	}
}
