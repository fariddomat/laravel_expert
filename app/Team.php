<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded=[];

    public function teamRole(){
        return $this->belongsTo(TeamRole::class);
    }
}
