<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerContactUs extends Model
{
    protected $table = 'customer_contact_us';

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
}
