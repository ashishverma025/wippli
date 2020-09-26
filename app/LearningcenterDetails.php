<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningcenterDetails extends Model {

    protected $fillable = [
        'lc_name', 'lc_address', 'lc_status',
    ];

}
