<?php

namespace App\Policies;

use App\CustomerBlogCategory;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerBlogCategoryPolicy
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

    public function update(User $user, CustomerBlogCategory $customerBlogCategory)
    {
        return $user->customer->id === $customerBlogCategory->customer_id;
    }

    public function create(User $user)
    {
        return $user->customer->blogs ===  1;
    }
}
