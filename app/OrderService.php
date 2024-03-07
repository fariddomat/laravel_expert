<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{

    public  function service()
    {
        return $this->belongsTo('App\Service');
    }
}
