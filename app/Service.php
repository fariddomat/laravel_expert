<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Service extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'brief', 'main_title'];
    protected $guarded=[];
    public function indexItems()
    {
        return $this->hasMany('App\ServiceIndexItem', 'service_id', 'id');
    }

    public function sections()
    {
        return $this->hasMany('App\ServiceSection', 'service_id', 'id');
    }

    public function workWays()
    {
        return $this->hasMany('App\ServiceWorkWay', 'service_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany('App\ServiceQuestion', 'service_id', 'id');
    }

    public function sliderImages()
    {
        return $this->hasMany('App\ServiceSliderImage', 'service_id', 'id');
    }

    public function getSlider($slider)
    {
        $s=ServiceSliderImage::where('service_id',$this->id)->where('slider',$slider)->get();
        return $s;
    }
    public function sliderHeaderImages()
    {
        return $this->hasMany('App\ServiceHeaderSliderImage', 'service_id', 'id');
    }



    // Define the relationship for child services
    public function subServices()
    {
        return $this->hasMany(Service::class, 'parent_id');
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
