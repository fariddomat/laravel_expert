<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerTranslation extends Model
{
    protected $table = 'customer_translations';
    public $timestamps = false;
    protected $fillable = ['name', 'about', 'services'];
}
