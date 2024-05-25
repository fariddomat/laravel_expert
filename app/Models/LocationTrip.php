<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationTrip extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'title',
        'description',
        'img',
    ];

    /**
     * Get the location that owns the trip.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
