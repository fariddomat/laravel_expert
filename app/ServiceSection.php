<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ServiceSection extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'content'];
    protected $table = 'service_sections';

    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\ServiceSectionImage', 'service_section_id', 'id');
    }
}
