<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    protected $table = 'about_translations';
    public $timestamps = false;
    protected $fillable = ['about_me', 'brief', 'who_are_we', 'history', 'massage', 'goals', 'vision', 'ambition', 'values'];
}
