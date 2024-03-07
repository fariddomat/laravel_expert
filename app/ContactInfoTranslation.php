<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfoTranslation extends Model
{
    protected $table = 'contact_info_translations';
    public $timestamps = false;
    protected $fillable = ['location'];
}
