<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packagee extends Model
{
    protected $fillable = ['service_id', 'name','img', 'price'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function packageServices()
    {
        return $this->hasMany(PackageService::class);
    }
}
