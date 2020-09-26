<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classvideo extends Model {

    protected $fillable = [
        'name', 'description','url','image', 'status'
    ];

}
