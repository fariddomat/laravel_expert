<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSliderImage extends Model
{
    protected $table = 'service_slider_images';

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
}
