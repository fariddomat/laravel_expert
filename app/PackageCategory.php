<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    //
    protected $fillable=['name'];

    public function packageServices(){
        return $this->hasMany(PackageService::class);
    }
}
