<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'blog_category_translations';
    public $timestamps = false;
    protected $fillable = ['name'];
}
