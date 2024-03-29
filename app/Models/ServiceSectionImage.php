<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ServiceSectionImage extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['caption'];
    protected $table = 'service_section_images';

    public function serviceSection()
    {
        return $this->belongsTo('App\Models\ServiceSection', 'service_section_id', 'id');
    }
}
