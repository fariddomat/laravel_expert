<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class Blog extends Model implements Viewable,TranslatableContract
{

    use InteractsWithViews;
    use Translatable;
    public $translatedAttributes = ['title', 'description', 'introduction', 'content_table', 'first_paragraph', 'author_name', 'author_title'];

    public function category()
    {
        return $this->belongsTo('App\BlogCategory', 'blog_category_id', 'id');
    }


    public function scopeWhenSearch($query, $search)
    {
        return $this->with('translation')
        ->whereHas('translation', function ($query) use ($search) {
          $query->where('title', 'like', '%' . $search . '%');
        });
    }


    public function scopeWhenCategory($query, $search)
    {
        return $this->with('translation')
        ->whereHas('category', function ($query) use ($search) {
          $query->where('id', $search);
        });
    }

    public function tags()
{
    return $this->belongsToMany(Tag::class);
}
}
