<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlinequestionPaper extends Model {

    protected $fillable = [
        'paper_name', 'id', 'status'
    ];

}
