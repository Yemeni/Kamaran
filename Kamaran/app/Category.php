<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
}
