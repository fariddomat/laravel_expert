<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceQuestionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['question', 'answer'];
    protected $table = 'service_question_translations';
}
