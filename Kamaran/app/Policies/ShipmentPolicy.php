<?php

namespace App\Policies;

use App\User;
use App\Shipment;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShipmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the shipment.
     *
     * @param  \App\User  $user
     * @param  \App\Shipment  $shipment
     * @return mixed
     */
    public function view(User $user, Shipment $shipment)
    {

    }

    /**
     * Determine whether the user can create shipments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->level == 'employee' || $user->level == 'admin';
    }

    /**
     * Determine whether the user can update the shipment.
     *
     * @param  \App\User  $user
     * @param  \App\Shipment  $shipment
     * @return mixed
     */
    public function update(User $user, Shipment $shipment)
    {
        return ($user->level == 'employee' && $user->id == $shipment->user_id && $user->category_id == $shipment->category_id) || $user->level == 'admin' || ($user->level == 'manager' && $user->category_id == $shipment->category_id);
    }

    /**
     * Determine whether the user can delete the shipment.
     *
     * @param  \App\User  $user
     * @param  \App\Shipment  $shipment
     * @return mixed
     */
    public function delete(User $user, Shipment $shipment)
    {
        return $user->id == $shipment->user_id || ($user->level == 'admin' && $shipment->category->id == $user->category->id);
    }
}
