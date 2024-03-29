<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ServiceWorkWay extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'content'];
    protected $table = 'service_work_ways';

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
}
