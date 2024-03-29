<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkCategoryTranslation extends Model
{
    protected $table = 'work_category_translations';
    public $timestamps = false;
    protected $fillable = ['name'];
}
