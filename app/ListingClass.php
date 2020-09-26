<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingClass extends Model {

    protected $fillable = [
        'title', 'description', 'status',
    ];

}