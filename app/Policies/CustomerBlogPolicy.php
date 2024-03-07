<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\CustomerBlog;

class CustomerBlogPolicy
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

    public function update(User $user, CustomerBlog $customerBlog)
    {
        return $user->customer->id === $customerBlog->customer_id;
    }

    public function create(User $user)
    {
        return $user->customer->blogs ===  1;
    }
}
