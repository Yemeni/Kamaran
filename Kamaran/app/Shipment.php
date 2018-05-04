<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'orderitem_id', 'partial', 'date', 'expected_date', 'user_id', 'arrival_date', 'quantity', 'shipment_status', 'comment'
    ];

    protected $dates = ['date', 'expected_date', 'arrival_date'];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
