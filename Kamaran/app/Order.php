<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class 	Order extends Model
{
    protected $fillable = [
        'order_status', 'date', 'quantity', 'letter_of_credit', 'cost', 'category_id', 'approval_date', 'user_id', 'supplier_id', 'comment', 'item_id'
    ];
    
    protected $dates = ['date', 'approval_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function shipmentTotalQuantity()
	{
		$total = 0;

		if ($this->shipments()->count()){
			foreach ($this->shipments as $shipment)
			{
				$total += $shipment->quantity;
			}
		}


		return $total;
	}

	public function shipments()
	{
		return $this->hasMany(Shipment::class);
	}
}
