<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceWorkWayTranslation extends Model
{
    public $timestamps = false;
    protected $table = 'service_work_way_translations';
    protected $fillable = ['title', 'content'];
}
