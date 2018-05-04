<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'specification', 'unit', 'danger_level', 'type'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'catalogs');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
