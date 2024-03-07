<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['about_me', 'brief', 'who_are_we', 'history', 'massage', 'goals', 'vision', 'ambition', 'values'];
}
