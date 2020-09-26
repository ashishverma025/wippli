<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InviteFriend extends Model {

    protected $fillable = [
        'sender_email', 'receiver_email', 'status',
    ];

}
