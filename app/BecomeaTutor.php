<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BecomeaTutor extends Model {

    protected $fillable = [
        'profile_description', 'teaching_style', 'title',
    ];

}
