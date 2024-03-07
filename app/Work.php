<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Work extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'description'];

    public function category()
    {
        return $this->belongsTo('App\WorkCategory', 'work_category_id', 'id');
    }
}
