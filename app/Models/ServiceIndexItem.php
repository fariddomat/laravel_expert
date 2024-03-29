<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ServiceIndexItem extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name', 'description'];
    protected $table = 'service_index_items';

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
}
