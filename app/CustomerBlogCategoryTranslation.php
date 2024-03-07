<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBlogCategoryTranslation extends Model
{
    protected $table = 'customer_blog_category_translations';
    public $timestamps = false;
    protected $fillable = ['name'];
}
