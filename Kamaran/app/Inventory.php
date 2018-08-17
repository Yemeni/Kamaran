<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'arrival_status', 'shipment_id', 'transaction_type', 'user_id', 'category_id', 'item_id', 'date', 'quantity', 'comment'
    ];
    
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
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
