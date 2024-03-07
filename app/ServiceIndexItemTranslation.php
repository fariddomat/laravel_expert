<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceIndexItemTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description'];
    protected $table = 'service_index_item_translations';
}
