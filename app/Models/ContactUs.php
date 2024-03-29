<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'contact_us_service', 'contact_us_id', 'service_id')->withTimestamps();
    }
}
