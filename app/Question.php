<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model {

    protected $fillable = [
        'question', 'question_type', 'status',
    ];

    public function getQuestionList() {
//         syllabus as s ON s.subject_id = sl.id
        $Plan = DB::table('answers as a')
                ->select('q.id', 'question', 'description')
                ->leftJoin('p.status', '1')
                ->where('p.status', '1')
                ->get();
        return $Plan ? $Plan : "";
    }

}
