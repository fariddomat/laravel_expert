<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientTranslation extends Model
{
    protected $table = 'client_translations';
    public $timestamps = false;
    protected $fillable = ['name', 'company', 'position', 'talk'];
}
