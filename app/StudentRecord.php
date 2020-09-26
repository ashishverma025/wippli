<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentRecord extends Model {

    protected $fillable = [
        'id','user_id','student_name','student_email', 'pid', 'status'
    ];

}
