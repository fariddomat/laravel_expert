<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSectionImageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['caption'];
    protected $table = 'service_section_image_translations';
}
