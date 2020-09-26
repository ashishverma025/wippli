<?php

namespace App;

use DateTime;
use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model {

    protected $fillable = [
        'tutor_id', 'student_id', 'created_at',
    ];

    public function getAllLearningCenterStudents($request) {
        $userId = getUser_Detail_ByParam('id');
        $input = $request->all();

        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "";
        $class = !empty($input['class']) ? $input['class'] : "";
        $filterDate = !empty($input['amp;date']) ? $input['amp;date'] : "";
        $where = '';
        $returnData = [];


        $class = !empty($input['class']) ? $input['class'] : "";
        $filterDate = !empty($input['date']) ? $input['date'] : "";

        $date = new DateTime($filterDate); // For today/now, don't pass an arg.
        $date->modify("-0 day");
        $filterDay = $date->format("Y-m-d");

        // Datatable column number to table column name mapping
        $arr = ['u.id', 'u.name', 'u.avatar', 'tc.class_date', 'tc.class_name'];
        $sortBy = $arr[$col];
        
        $Attendence = Attendance::where(['tutor_id' => $userId, 'class_id' => $class])->first();
//        prd($Attendence);
        //GET ALL LEARNING CENTER STUDENT QUERY START
        $query = DB::table('tutor_students as ts')
                ->select('u.id as user_id', 'u.name', 'u.avatar', 'tc.class_date', 'tc.class_name')
                ->leftJoin('users as u', 'u.id', '=', 'ts.student_id')
                ->Join('class_students as cs', function($join) {
                    $join->on('cs.student_id', '=', 'ts.student_id');
                    $join->on('cs.lc_id', '=', 'ts.tutor_id')->groupBy('u.id');
                })
                ->leftJoin('tutorclasses as tc', 'tc.id', '=', 'cs.class_id')
                ->where('ts.tutor_id', $userId);

        //IF CLASS FILTER APPLY
        if (!empty($class)) {
            $query = $query->where('cs.class_id', $class);
        }
        //IF DATE FILTER APPLY
        if (!empty($date) && !empty($Attendence)) {
            $query->whereDate('tc.class_date', '<=', $filterDay);
        }

        $returnData['countQuery'] = $query;
        
        $query = $query
                ->orderBy($sortBy, $sortType)
                ->limit($length)
                ->offset($start)
                ->get();
        
        
        
        $returnData['dataQuery'] = $query;
        return $returnData;
    }

    public function getAllattendenceSummary($request) {
        $userId = getUser_Detail_ByParam('id');
        $AttendenceSummary = [];
        $input = $request->all();
        $class = !empty($input['class']) ? $input['class'] : "";
        $filterDate = !empty($input['date']) ? $input['date'] : "";

        $date = new DateTime($filterDate); // For today/now, don't pass an arg.
        $date->modify("-0 day");
        $filterDay = $date->format("Y-m-d");

        $CarbonDate = Carbon::now();
        $from = $CarbonDate->copy()->startOfDay();
        $to = $CarbonDate->copy()->endOfDay();
        //LEARNING CENTER ALL CLASS
        $classes = DB::table("tutorclasses")
                //->where('status', '=', '1')
                ->where('tutor_id', '=', $userId)
                ->pluck("class_name", 'id');
        //LEARNING CENTER ALL CLASS;
        foreach ($classes as $classId => $value) {

            $ClassStudent = ClassStudent::select('lc_id', 'class_id', DB::raw('count(student_id) as total_students'))
                    ->where(['lc_id' => $userId, 'class_id' => $classId])
                    ->groupBy('class_id')
                    ->first();
//            pr($ClassStudent);
            if (!empty($ClassStudent)) {
                $ClassStudent = $ClassStudent->toArray();
            }

            $AttendenceSummary[$value] = $ClassStudent;

            $Attendance = Attendance::select('class_id', 'tutor_id', DB::raw('count(student_id) as total_students_present'))
                    ->where(['tutor_id' => $userId, 'class_id' => $classId])
                    ->whereBetween('created_at', [$from, $to])
                    ->first()
                    ->toArray();

            $AttendenceSummary[$value]['total_students_present'] = $Attendance['total_students_present'];
            $AttendenceSummary[$value]['present_percentage'] = ($ClassStudent['total_students'] != 0) ? (($Attendance['total_students_present'] / $ClassStudent['total_students']) * 100) : 0;

//            SELECT class_id,tutor_id,count(student_id) FROM attendances WHERE tutor_id = 46 and class_id = 2 and created_at BETWEEN CURRENT_DATE() AND CURRENT_DATE()+1 GROUP BY class_id
        }
//        prd($AttendenceSummary);
        //GET ALL LEARNING CENTER STUDENT QUERY END
        return [
            'active' => 'attendence',
            'AttendenceSummary' => $AttendenceSummary,
            'tutorId' => $userId,
            'classes' => $classes,
            'classfilter' => $class,
            'dateFilter' => $filterDate
        ];
    }

    public function getAllLearningCenterAttendance($request) {
        $userId = getUser_Detail_ByParam('id');

        $input = $request->all();
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "";
        $class = !empty($input['class']) ? $input['class'] : "";
        $filterDate = !empty($input['amp;date']) ? $input['amp;date'] : "";
        $where = '';
        $returnData = [];

        //DATEWISE FILTER
        //$date = new DateTime("2017-05-18");
        $date = new DateTime($filterDate); // For today/now, don't pass an arg.
        $date->modify("-0 day");
        $filterDay = $date->format("Y-m-d");

        // Datatable column number to table column name mapping
        $arr = ['a.id', 'u.fname', 'u.lname', 'tc.class_date', 'u.email', 'tc.class_name', 'a.present', 'a.absent', 'not_engaged'];
        $sortBy = $arr[$col];

        $Query = DB::table('attendances as a')
                ->select('u.id', 'u.fname', 'u.lname', 'u.avatar', 'u.email', 'u.address', 'u.phone', 'a.class_id', 'a.class_id', 'tc.class_name', 'a.id as attendance_id', 'a.present', 'a.absent', 'a.not_engaged', 'a.created_at', 'tc.class_date')
                ->leftJoin('users as u', 'u.id', '=', 'a.student_id')
                ->leftJoin('class_students as cs', function($join) {
                    $join->on('cs.student_id', '=', 'a.student_id');
                    $join->on('cs.lc_id', '=', 'a.tutor_id');
                })
                ->leftJoin('tutorclasses as tc', 'tc.id', '=', 'a.class_id')
                ->where('a.tutor_id', $userId)
                ->where('u.user_type', 4)
                ->groupBy('u.id');

        if (!empty($class)) {
            $Query = $Query->where('tc.class_name', '=', "$class");
        }

        //DATE FILTER APPLIED
        if (!empty($filterDay)) {
//            $Query = $Query->whereDate('tc.class_date', '<=', "$filterDay");
            $Query = $Query->whereDate('a.created_at', '=', "$filterDay");
        } else {
            $Query = $Query->whereDate('a.created_at', '=', DB::raw('CURDATE()'));
        }
        if (!empty($sSearch)) {
            $Query = $Query->where('u.fname', 'like', '%' . $sSearch . '%');
        }
        $returnData['countQuery'] = $Query;
        $Query = $Query
                ->orderBy($sortBy, $sortType)
                ->limit($length)
                ->offset($start)
                ->get();
        $returnData['dataQuery'] = $Query;
        return $returnData;
    }

    public function fetchAllStudentAttendance($request, $studentId) {
        $input = $request->all();
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "";
        $class = !empty($input['class']) ? $input['class'] : "";
        $filterDate = !empty($input['amp;date']) ? $input['amp;date'] : "";
        $returnData = [];

        //DATEWISE FILTER
        //$date = new DateTime("2017-05-18");
        $date = new DateTime($filterDate); // For today/now, don't pass an arg.
        $date->modify("-0 day");
        $filterDay = $date->format("Y-m-d");

        // Datatable column number to table column name mapping
        $arr = ['a.id', 'tc.class_date', 'a.present', 'a.absent', 'a.not_engaged'];
        $sortBy = $arr[$col];

        $Query = DB::table('attendances as a')
                ->select('a.id', 'a.student_id', 'a.class_id', 'a.tutor_id', 'a.present', 'a.absent', 'a.not_engaged', 'a.created_at', 'tc.class_name', 'tc.class_date')
                ->leftJoin('tutorclasses as tc', 'tc.id', '=', 'a.class_id')
                ->where('a.student_id', $studentId);

        if (!empty($class)) {
            $Query = $Query->where('tc.class_name', '=', "$class");
        }

        //DATE FILTER APPLIED
//        if (!empty($filterDay)) {
//            $Query = $Query->whereDate('tc.class_date', '<=', $filterDay);
//            $Query = $Query->whereDate('a.created_at', '=', $filterDay);
//        } else {
//            $Query = $Query->whereDate('a.created_at', '=', DB::raw('CURDATE()'));
//        }
        if (!empty($sSearch)) {
            $Query = $Query->where('tc.class_name', 'like', '%' . $sSearch . '%');
        }
        $returnData['countQuery'] = $Query->count();
        $Query = $Query
                ->orderBy($sortBy, $sortType)
                ->limit($length)
                ->offset($start)
                ->get();
        $returnData['dataQuery'] = $Query;
        return $returnData;
    }

    public function getCalendarAttendance($request, $studentId) {
        $input = $request->all();
        $filterClass = !empty($input['class']) ? $input['class'] : "";
        $filterDate = !empty($input['amp;date']) ? $input['amp;date'] : "";
        $filterLc = !empty($input['lc']) ? $input['lc'] : "";
//        echo $filterLc;die;

        $returnData = [];

        //DATEWISE FILTER
        //$date = new DateTime("2017-05-18");
        $date = new DateTime($filterDate); // For today/now, don't pass an arg.
        $date->modify("-0 day");
        $filterDay = $date->format("Y-m-d");

        $Query = DB::table('attendances as a')
                ->select('a.id', 'a.student_id', 'a.class_id', 'a.tutor_id', 'a.present', 'a.absent', 'a.not_engaged', DB::raw('DATE_FORMAT(a.created_at, "%d-%m-%Y") as created_at'), 'tc.class_name', 'tc.class_date')
                ->leftJoin('tutorclasses as tc', 'tc.id', '=', 'a.class_id');
        if (!empty($filterLc)) {
            $Query = $Query->where(['a.tutor_id' => $filterLc]);
        }
        $Query = $Query->where(['a.student_id' => $studentId]);

        if (!empty($filterClass)) {
            $Query = $Query->where('a.class_id', '=', $filterClass);
        }

        if (!empty($sSearch)) {
            $Query = $Query->where('tc.class_name', 'like', '%' . $sSearch . '%');
        }
        return $Query->get();
    }

    public function getGetStudentLcs($request, $studentId) {
        $Query = DB::table('tutor_students as ts')
                ->select('lc.user_id', 'lc.lc_name', 'ts.student_id', 'ts.lc_id', 'ts.tutor_id')
                ->leftJoin('learning_centers as lc', 'lc.user_id', '=', 'ts.tutor_id')
                ->groupBy('lc.user_id')
                ->where('ts.student_id', $studentId)
                ->pluck("lc.lc_name", 'lc.user_id');
        return $Query ? $Query : "";
    }

    public function getStudentClasss($request, $studentId) {
        $Classes = DB::table("class_students as cs")
                ->leftJoin('tutorclasses as tc', 'tc.id', 'cs.class_id')
                ->where('cs.student_id', '=', $studentId)
                ->groupBy('class_id')
                ->pluck("class_name", 'tc.id');

        return $Classes ? $Classes : "";
    }

}
