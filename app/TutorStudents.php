<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TutorStudents extends Model {

    protected $fillable = [
        'tutor_id', 'student_id', 'status',
    ];

    public function getLcStudents($request) {
        $userId = getUser_Detail_ByParam('id');
        $AttendenceDetails = [];
        $input = $request->all();
        $class = !empty($input['class']) ? $input['class'] : "";

        //GET ALL LEARNING CENTER STUDENT QUERY START
        $query = DB::table('tutor_students as ts')
                ->leftJoin('users as u', 'u.id', '=', 'ts.student_id')
                ->Join('class_students as cs', function($join) {
                    $join->on('cs.student_id', '=', 'ts.student_id');
                    $join->on('cs.lc_id', '=', 'ts.tutor_id');
                })
                ->leftJoin('tutorclasses as tc', 'tc.id', '=', 'cs.class_id')
                ->select('u.id as user_id', 'u.name', 'u.avatar', 'tc.class_date', 'tc.class_name')
                ->where('ts.tutor_id', $userId);

        if (!empty($class)) {
            $query = $query->where('cs.class_id', $class);
        }

        $AttendenceDetails['students'] = $query->groupBy('user_id')
                ->get();

        return ['active' => 'attendence',
            'AttendenceDetails' => $AttendenceDetails,
            'tutorId' => $userId,
            'classes' => $classes,
            'classfilter' => $class,
            'dateFilter' => $filterDate
        ];
    }

    //GET ALL VERIFIED STUDENT EXCEPT LC STUDENTS
    public function getVerifiedStudents() {
        $response = [];
        $stud = [];
        $LcVerifiedStudents = implode(",", $this->getCurrentLcStudents()->toArray());
        $students = DB::table("users")
                ->where('email_verified_at', '!=', null)
                ->where('user_type', '=', 4);
        if ($this->getCurrentLcStudents()->toArray()) {
            $students = $students->whereNotIn('email', [$LcVerifiedStudents]);
        }
        $stud['byEmail'] = $students->pluck("email", 'id');
        $stud['byName'] = $students->pluck("name", 'id');
//        prd($stud);
        if (!empty($stud['byEmail']) && !empty($stud['byName'])) {
            return $stud;
        }
        return $response;
    }

    public function getCurrentLcStudents() {
        $response = [];
        $LcId = getUser_Detail_ByParam('id');
        //GET ALL LEARNING CENTER STUDENT
        $students = DB::table('tutor_students as ts')
                ->leftJoin('users as u', 'u.id', '=', 'ts.student_id')
                ->where('ts.tutor_id', $LcId)
                ->pluck("u.email", 'u.id');
        if (!empty($students)) {
            return $students;
        }
        return $response;
    }

}
