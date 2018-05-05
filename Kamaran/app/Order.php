<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_status', 'date', 'letter_of_credit', 'category_id', 'approval_date', 'user_id', 'supplier_id', 'comment'
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

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
