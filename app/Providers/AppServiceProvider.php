<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Models\Blog;
use App\Models\Color;
use App\Models\ContactInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\SocialMedia;
use App\Models\Info;
use App\Models\Service;
use Intervention\Image\ImageManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        // Using closure based composers...
        View::composer('layouts.site', function ($view) {
            $view->with('socialMedias', SocialMedia::all())
                ->with('info', Info::find(1))
                ->with('contactInfo', ContactInfo::find(1))
                ->with('color', Color::find(1))
                ->with('servicesA', Service::where('showed', 1)->where('show_at_home', 1)->limit(3)->get())
                ->with('blogs', Blog::latest()->limit(3)->get());
        });

        View::composer('layouts.siteNetherland', function ($view) {
            $view->with('socialMedias', SocialMedia::all())
                ->with('info', Info::find(1))
                ->with('contactInfo', ContactInfo::find(1))
                ->with('color', Color::find(1))
                ->with('servicesA', Service::where('slug', 'netherland')?->first()->subServices)
                ->with('blogs', Blog::latest()->limit(3)->get());
        });
    }
}
