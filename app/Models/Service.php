<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
class Service extends Model implements Viewable,TranslatableContract
{

    use InteractsWithViews;
    use Translatable;
    public $translatedAttributes = ['title', 'intro', 'brief', 'main_title'];
    protected $guarded=[];
    public function indexItems()
    {
        return $this->hasMany('App\Models\ServiceIndexItem', 'service_id', 'id');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\ServiceSection', 'service_id', 'id');
    }

    public function workWays()
    {
        return $this->hasMany('App\Models\ServiceWorkWay', 'service_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\ServiceQuestion', 'service_id', 'id');
    }

    public function sliderImages()
    {
        return $this->hasMany('App\Models\ServiceSliderImage', 'service_id', 'id');
    }

    public function getSlider($slider)
    {
        $s=ServiceSliderImage::where('service_id',$this->id)->where('slider_id',$slider)->get();
        return $s;
    }
    public function sliderHeaderImages()
    {
        return $this->hasMany('App\Models\ServiceHeaderSliderImage', 'service_id', 'id');
    }



    // Define the relationship for child services
    public function subServices()
    {
        return $this->hasMany(Service::class, 'parent_id')->orderBy('position');
    }

    // Define the relationship for the parent service
    public function parentService()
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }

    public function getAllSubServices()
    {
        return $this->subServices->map(function ($service) {
            return [
                'service' => $service,
                'sub_services' => $service->getAllSubServices(),
            ];
        });
    }

}
