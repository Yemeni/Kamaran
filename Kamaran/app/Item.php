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
		$pos = ['voucher', 'initial_balance', 'surplus'];

		foreach ($this->inventory as $inv)
		{
			if (in_array($inv->transaction_type, $pos))
			{
				$total += $inv->quantity;
			} else
			{
				$total -= $inv->quantity;
			}
		}

		if ($withString)
			return (string) number_format($total) . ' ' . $this->unit;

		return $total;
	}

    public function pendingOrders($withString = true)
    {
        $total = 0;

        foreach ($this->orders as $order)
        {
            if ($order->order_status == 'pending')
            {
                $total += $order->quantity;
            }

        }

        if ($withString)
            return (string) number_format($total) . ' ' . $this->unit;

        return $total;
    }

	public function order()
	{
		return $this->hasOne(Order::class);
	}
}
