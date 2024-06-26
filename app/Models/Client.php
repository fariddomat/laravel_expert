<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Client extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name', 'company', 'position', 'talk'];
}
