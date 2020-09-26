<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model {

    protected $fillable = [
        'class_id', 'student_id', 'lc_id',
    ];

}
