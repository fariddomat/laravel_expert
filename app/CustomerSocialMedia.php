<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSocialMedia extends Model
{
    protected $table = 'customer_social_media';

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
}
