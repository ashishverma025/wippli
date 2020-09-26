<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorclass extends Model {

    protected $fillable = [
        'class_name', 'start_time', 'end_time',
    ];

}
