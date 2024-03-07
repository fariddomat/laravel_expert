<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    protected $table = 'blog_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'introduction', 'content_table', 'first_paragraph', 'author_name', 'author_title'];
}
