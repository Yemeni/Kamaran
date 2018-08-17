<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'invoice', 'order_id', 'partial', 'date', 'category_id', 'expected_date', 'user_id', 'arrival_date', 'quantity', 'shipment_status', 'comment'
    ];

    protected $dates = ['date', 'expected_date', 'arrival_date'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function inventory()
	{
		return $this->hasOne(Inventory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
