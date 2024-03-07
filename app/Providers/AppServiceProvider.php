<?php

namespace App\Providers;

use App\Blog;
use App\Color;
use App\ContactInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\SocialMedia;
use App\Info;
use App\Service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        // Using closure based composers...
        View::composer('layouts.site', function ($view) {
            $view->with('socialMedias', SocialMedia::all())
                ->with('info', Info::find(1))
                ->with('contactInfo', ContactInfo::find(1))
                ->with('color', Color::find(1))
                ->with('services', Service::all())
                ->with('blogs', Blog::limit(3)->get());
        });


    }
}
