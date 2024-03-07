<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBlogTranslation extends Model
{
    protected $table = 'customer_blog_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'introduction', 'content_table', 'first_paragraph', 'author_name', 'author_title'];
}
