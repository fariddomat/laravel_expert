<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\CustomerContactUs;

class CustomerContactUsPolicy
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
    public function update(User $user, CustomerContactUs $contact)
    {
        return $user->customer->id === $contact->customer_id;
    }
}
