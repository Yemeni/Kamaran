<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'email'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'catalogs');
    }
}
