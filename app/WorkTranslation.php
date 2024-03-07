<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkTranslation extends Model
{
    protected $table = 'work_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'description'];
}
