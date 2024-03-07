<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSliderImage extends Model
{
    protected $table = 'service_slider_images';

    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
