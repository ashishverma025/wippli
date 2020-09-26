<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningCenter extends Model {

    protected $fillable = [
        'lc_name', 'lc_address', 'lc_contact',
    ];

}
