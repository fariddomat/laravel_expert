<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
      // Table name (if different from the model name)
      protected $table = 'counters';

      // Fillable fields
      protected $fillable = [
          'value',
          'icon',
          'title',
      ];
}
