<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class CustomerBlog extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'description', 'introduction', 'content_table', 'first_paragraph', 'author_name', 'author_title'];

    public function category()
    {
        return $this->belongsTo('App\CustomerBlogCategory', 'blog_category_id', 'id');
    }
}
