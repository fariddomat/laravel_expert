<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class BlogCategory extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name'];

    public function blogs(){
        return $this->hasMany(Blog::class);
    }
}
