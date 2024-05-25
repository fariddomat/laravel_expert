<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded=[];

     /**
     * Get the trips for the location.
     */
    public function location_trips()
    {
        return $this->hasMany(LocationTrip::class);
    }

    public function location_social_media()
    {
        return $this->hasMany(LocationSocialMedia::class);
    }
}
