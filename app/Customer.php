<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Customer extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name', 'about', 'location', 'services'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function socialMedia()
    {
        return $this->hasMany('App\CustomerSocialMedia', 'customer_id', 'id');
    }

    public function showedSocialMedia()
    {
        return $this->hasMany('App\CustomerSocialMedia', 'customer_id', 'id')->where('showed', 1);
    }

    public function VCardImages()
    {
        return $this->hasMany('App\VCardImage', 'customer_id', 'id');
    }

    public function showedVCardImages()
    {
        return $this->hasMany('App\VCardImage', 'customer_id', 'id')->where('showed', 1);
    }

    public function gallery()
    {
        return $this->hasMany('App\CustomerGallery', 'customer_id', 'id');
    }
    public function showedGallery()
    {
        return $this->hasMany('App\CustomerGallery', 'customer_id', 'id')->where('showed', 1);
    }

    public function contactUs()
    {
        return $this->hasMany('App\CustomerContactUs', 'customer_id', 'id');
    } 
}
