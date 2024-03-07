<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\CustomerGallery;

class CustomerGalleryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, CustomerGallery $customerGallery)
    {
        return $user->customer->id === $customerGallery->customer_id;
    }
}
