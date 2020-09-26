<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingRequest extends Model {

    protected $fillable = [
        'title', 'description', 'status',
    ];

}