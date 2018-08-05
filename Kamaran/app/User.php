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
        'name', 'username', 'email', 'password', 'gender', 'phone', 'category_id', 'level', 'address', 'status'
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

	public function isAdmin()
	{
		return $this->level == 'admin';
    }

	public function isManager()
	{
		return $this->level == 'manager';
    }

	public function withoutCategory()
	{
		return $this->level == 'admin' || $this->level == 'inventory_employee' || $this->level == 'head_of_suppliers';
    }

	public function hasCategoryEmployees()
	{
		return count($this->categoryEmployees());
    }

	public function categoryEmployees()
	{
		return Category::find($this->category_id)->users ?? 0;
    }

	public function hasCategoryAdmin()
	{
		return count($this->categoryAdmin());
    }

	public function categoryAdmin()
	{
		return Category::find($this->category_id)->users()->where('level', 'manager')->first() ?? 0;
    }

}
