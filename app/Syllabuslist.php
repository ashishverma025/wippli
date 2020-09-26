<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Syllabuslist extends Model {

    protected $fillable = [
        'syllabus_name', 'subject_id', 'created_at',
    ];

    public function getSyllabusListBySubjectId($subId) {
//         syllabus as s ON s.subject_id = sl.id
        $Syllabus = DB::table('syllabuses as sl')
                ->select('sl.id as subId', 'subjects_name', 's.id as sylId', 'syllabus_name')
                ->leftJoin('subjects as s', 's.id', '=', 'sl.subject_id')
                ->where('s.id', $subId)
//                ->groupBy('lc.user_id')
                ->get();

//        $syllabus = [];
        if (!empty($Syllabus)) {
            foreach ($Syllabus as $key => $value) {
                $syllabus[$value->subjects_name][] = ['sylId' => $value->sylId, 'syllabus_name' => $value->syllabus_name];
            }
        }
//        prd($syllabus);
        return $syllabus ? $syllabus : "";
    }

    public function getSubjectName($subId) {
//         syllabus as s ON s.subject_id = sl.id
        $subjectName = DB::table('subjects as s')
                ->select('subjects_name', 'id')
                ->where('s.id', $subId)
                ->get();
        return $subjectName ? $subjectName : "";
    }

}
