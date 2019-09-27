<?php

namespace App\Policies;

use App\User;
use App\Supplier;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplierPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the supplier is approved to access the resource
     *
     * @param  \App\User  $user
     * @param  \App\Supplier  $supplier
     * @return boolean $is_approved (database value)
     */
    public function isApproved(User $user, Supplier $supplier)
    {

        return $user->supplier->is_approved;
        // abort_if((!Supplier::find(Auth::id())->is_approved), 403);

    }
}
