<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model {

    protected $fillable = [
        'subjects_name', 'status', 'created_at',
    ];

    public function getPlanList() {
//         syllabus as s ON s.subject_id = sl.id
        $Plan = DB::table('plans as p')
                ->select('p.id', 'name', 'description')
                ->where('p.status', '1')
                ->get();
        return $Plan ? $Plan : "";
    }

}
