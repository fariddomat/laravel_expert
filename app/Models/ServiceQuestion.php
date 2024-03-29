<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ServiceQuestion extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['question', 'answer'];
    protected $table = 'service_questions';

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
}
