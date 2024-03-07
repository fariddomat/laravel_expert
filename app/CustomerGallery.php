<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerGallery extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
}
