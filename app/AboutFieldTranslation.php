<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutFieldTranslation extends Model
{
    protected $table = 'about_field_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'value'];
}
