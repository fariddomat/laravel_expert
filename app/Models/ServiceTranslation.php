<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $table = 'service_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'brief', 'main_title'];
}
