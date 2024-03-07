<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\CustomerSocialMedia;

class CustomerSocialMediaPolicy
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

    public function update(User $user, CustomerSocialMedia $customerSocialMedia)
    {
        return $user->customer->id === $customerSocialMedia->customer_id;
    }
}
