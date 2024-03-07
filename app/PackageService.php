<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageService extends Model
{
    protected $fillable = ['packagee_id','package_category_id' ,'name', 'value'];

    public function packagee()
    {
        return $this->belongsTo(Packagee::class);
    }

    public function packageCategoriess()
    {
        return $this->belongsTo(PackageCategory::class);
    }
}
