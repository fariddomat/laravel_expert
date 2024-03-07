<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSectionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content'];
    protected $table = 'service_section_translations';
}
