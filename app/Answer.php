<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model {

    protected $fillable = [
        'answer', 'question_id', 'status','is_correct',
    ];

}
