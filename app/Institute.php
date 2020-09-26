<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institute extends Model {

    protected $fillable = [
        'subjects_name', 'status', 'created_at',
    ];

    public function getAllInstitute() {
        $institutes = DB::table("institutes")
                ->where('status','Active')
                ->pluck("id", 'institute_name');
        return $institutes;
    }

}
