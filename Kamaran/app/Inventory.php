<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'arrival_status', 'transaction_type', 'user_id', 'category_id', 'shipment_id', 'date', 'quantity', 'comment'
    ];
    
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
