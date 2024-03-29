<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorInformation extends Model
{
     // Table name (if different from the default convention)
     protected $table = 'visitor_information';

     // Fillable fields (optional, for mass assignment)
     protected $fillable = [
         'ip',
         'user_agent',
         'url',
         'device',
         'browser',
     ];
}
