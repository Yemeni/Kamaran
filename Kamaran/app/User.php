<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'phone', 'category_id', 'level', 'address', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
