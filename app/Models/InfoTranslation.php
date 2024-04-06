<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoTranslation extends Model
{
    protected $table = 'info_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'footer', 'work', 'work_description'];
}
