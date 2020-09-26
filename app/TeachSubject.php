<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachSubject extends Model {

    protected $fillable = [
        'subjects_name','subject_image', 'status', 'created_at',
    ];

    public function getSubjectSyllabusList() {
//         syllabus as s ON s.subject_id = sl.id
        $SubjectsSyllabus = DB::table('subjects as sl')
                ->select('sl.id as subId', 'subjects_name', 's.id as sylId', 'syllabus_name')
                ->leftJoin('syllabuslists as s', 's.subject_id', '=', 'sl.id')
                ->where('sl.status','1')
                ->get();
        $subject = [];
        if (!empty($SubjectsSyllabus)) {
            foreach ($SubjectsSyllabus as $key => $value) {
                $subject[$value->subjects_name][] = ['sylId' => $value->sylId, 'syllabus_name' => $value->syllabus_name];
            }
        }
        return $subject ? $subject : "";
    }

}
