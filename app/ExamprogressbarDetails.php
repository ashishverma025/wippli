<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamprogressbarDetails extends Model {

    protected $fillable = [
        'id', 'progress'
    ];

}
