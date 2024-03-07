<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\CustomerSocialMedia;
use App\Policies\CustomerSocialMediaPolicy;
use App\CustomerGallery;
use App\Policies\CustomerGalleryPolicy;
use App\CustomerContactUs;
use App\Policies\CustomerContactUsPolicy;
use App\CustomerBlog;
use App\Policies\CustomerBlogPolicy;
use App\CustomerBlogCategory;
use App\Policies\CustomerBlogCategoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        CustomerSocialMedia::class => CustomerSocialMediaPolicy::class,
        CustomerGallery::class => CustomerGalleryPolicy::class,
        CustomerContactUs::class => CustomerContactUsPolicy::class,
        CustomerBlog::class => CustomerBlogPolicy::class,
        CustomerBlogCategory::class => CustomerBlogCategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
