<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamRole extends Model
{
    protected $guarded=[];

    public function teams(){
        return $this->hasMany(Team::class);
    }
}
