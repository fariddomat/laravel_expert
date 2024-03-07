<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceHeaderSliderImage extends Model
{

    protected $table = 'service_header_slider_images';

    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
