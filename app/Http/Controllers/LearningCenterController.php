<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Tutordetail,
    App\Tutorclass,
    App\Attendance,
    App\TutorStudents,
    App\Subject,
    App\LearningCenter;

App\ThingsweTeach;

use App\User;
use Auth,
    DB,
    Hash,
    Session;
use DataTables;

class LearningCenterController extends Controller {

    //GET TUTOR Dashboard
    public function dashboard(Request $request, $type = null) {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');

            $uType = getUser_Detail_ByParam('user_type');
            if ($uType == 4) {
                return redirect('student/dashboard');
            }

            $DashboardDetails = [];
            $DashboardDetails['students'] = TutorStudents::where(['tutor_id' => $userId])->count();
            $DashboardDetails['classes'] = Tutorclass::where(['tutor_id' => $userId])->count();
            $DashboardDetails['subjects'] = Subject::where(['user_id' => $userId])->count();
            return view('sites.LcDashboard', ['active' => 'Dashboard', 'DashboardDetails' => $DashboardDetails]);
        }
        return redirect('/');
    }

    //Add Tutor Class data BY POST REQUEST
    public function saveClass(Request $request) {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $classId = $request->input('classId');
            $postData = $request->all();
//            $isExist = findData('tutorclasses', '*', 'tutor_id', $userId);
            if (empty($classId)) { // New record, save it
                $TutorClass = new Tutorclass();
                $TutorClass->tutor_id = $userId;
                $TutorClass->class_name = @$request->input('class_name');
                $TutorClass->class_time = $request->input('class_time');
                $TutorClass->class_day = $request->input('class_day') ? implode(',', $request->input('class_day')) : "";
                $TutorClass->class_date = $request->input('class_date');
                $TutorClass->duration = $request->input('duration');
                $TutorClass->subject = $request->input('subject');
                $TutorClass->status = 1;
                $TutorClass->created_at = date('Y-m-d H:i:s');

//            prd($TutorClass);
                set_flash_message('Class Added Successfully.', 'alert-success');
                $TutorClass->save();
            } else {
                $TutorClass = Tutorclass::where(['id' => $classId])->first();
                $TutorClass->class_name = @$request->input('class_name');
                $TutorClass->class_time = $request->input('class_time');
                $TutorClass->class_date = $request->input('class_date');
                $TutorClass->class_day = $request->input('class_day') ? implode(',', $request->input('class_day')) : "";
                $TutorClass->duration = $request->input('duration');
                $TutorClass->subject = $request->input('subject');
                $TutorClass->status = 1;
                $TutorClass->updated_at = date('Y-m-d H:i:s');

                $TutorClass->update();
                set_flash_message('Class Updated successfully', 'alert-success');
            }
            return redirect('/classes');
        }
        return redirect('/');
    }

    //GET TUTOR Class LIST POST REQUEST
    public function addClass(Request $request, $classId = null) {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $ClassDetails = Tutorclass::where(['id' => $classId])->first();
            $selectedClass = $ClassDetails['class_day'] ? explode(',', $ClassDetails['class_day']) : [];
//            pr($selectedClass);
            $subjects = DB::table("subjects")
                    ->where('status', '=', '1')
                    ->where('user_id', '=', $userId)
                    ->pluck("subjects_name", 'id');
            $week_days = get_custom_dob();
//            pr($subjects);
            return view('sites.addLcClass', ['active' => 'TutorClass', 'subjects' => $subjects, 'selectedClass' => $selectedClass, 'ClassDetails' => $ClassDetails, 'week_days' => $week_days['week_days']]);
        }
        return redirect('/');
    }

    //Fetch Student List Datables Ajax Request
    public function fetchClasses(Request $request) {
        $userId = getUser_Detail_ByParam('id');

        $dob = get_custom_dob();
        $week_days = $dob['week_days'];

        $input = $request->all();
//        pr($input);
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'class_name', 'class_time', 'class_day', 'duration', 'subject', 'status', 'created_at'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $classes = Tutorclass::where('tutor_id', $userId);
        if (!empty($sSearch)) {
            $classes = $classes->Where('class_name', 'like', '%' . $sSearch . '%');
        }
        $classes = $classes->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();

        $iTotal = Tutorclass::where('tutor_id', $userId);
        if (!empty($sSearch)) {
            $iTotal = $iTotal->Where('class_name', 'like', '%' . $sSearch . '%');
        }
        $iTotal = $iTotal->count();


        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );


        $k = 0;
        if (count($classes) > 0) {
            foreach ($classes as $class) {
//                $classes = $class->class_day ? implode(',', $class->class_day) : "";
//                pr($class->class_day);
                $response['aaData'][$k] = array(
                    0 => $k + 1,
                    1 => $class->class_name,
                    2 => $class->class_time,
                    3 => $class->class_day,
                    4 => $class->class_date,
                    5 => $class->duration,
                    6 => $class->subject,
                    7 => $class->status == 1 ? 'Active' : 'Inactive',
                    8 => $class->created_at,
                    9 => '<a href="addclass/' . $class->id . '" '
                    . 'class="delete hidden-xs hidden-sm" title="Edit">'
                    . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                    . ' <a href="deletesubjects/' . $class->id . '"'
                    . ' class="delete hidden-xs hidden-sm" title="Delete"'
                    . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                    . '<i class="fa fa-trash text-danger"></i></a>',
                );
                $k++;
            }
        }
        return response()->json($response);
    }

    //GET CLASSES LIST POST REQUEST
    public function classesList(Request $request, $type = null) {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $Classes = Tutorclass::where(['tutor_id' => $userId])->first();

            return view('sites.listLcClass', ['active' => 'classes', 'Tutorclass' => $Classes]);
        }
        return redirect('/');
    }

    //GET SUBJECTS LIST POST REQUEST
    public function subjectsList(Request $request, $type = null) {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $Subjects = Tutorclass::where(['tutor_id' => $userId])->first();
            return view('sites.listLcSubject', ['active' => 'classes', 'Subjects' => $Subjects]);
        }
        return redirect('/');
    }

    public function fetchSubjects(Request $request) {
        $tutorId = getUser_Detail_ByParam('id');

        $input = $request->all();
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'subjects_name', 'status', 'created_at'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $subjects = Subject::where('subjects_name', 'like', '%' . $sSearch . '%')->where('user_id', $tutorId)
                        ->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();

        $iTotal = $subjects->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );
        $k = 0;
        if (count($subjects) > 0) {
            foreach ($subjects as $subject) {
                $response['aaData'][$k] = array(
                    0 => $k + 1,
                    1 => $subject->subjects_name,
                    2 => $subject->status == 1 ? 'Active' : 'Inactive',
                    3 => $subject->created_at,
                    4 => '<a href="addsubjects/' . $subject->id . '" '
                    . 'class="delete hidden-xs hidden-sm" title="Edit">'
                    . '<i class="fa fa-pencil text-warning"></i></a> &nbsp;'
                    . ' <a href="deletesubjects/' . $subject->id . '"'
                    . ' class="delete hidden-xs hidden-sm" title="Delete"'
                    . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                    . '<i class="fa fa-trash text-danger"></i></a>',
                );
                $k++;
            }
        }
        return response()->json($response);
    }

    //GET ADD/UPDATE SUBJECT FORM
    public function addSubject(Request $request, $subId = null) {
        if (Auth::check()) {
            $lcId = getUser_Detail_ByParam('id');
            $Subject = Subject::where(['id' => $subId])->first();
            return view('sites.addLcSubject', ['active' => 'Subjects', 'Subject' => $Subject, 'lcId' => $lcId]);
        }
        return redirect('/');
    }

    //Add Subject data BY POST REQUEST
    public function saveSubject(Request $request) {
        if (Auth::check()) {
            $tutorId = getUser_Detail_ByParam('id');
            $subId = $request->input('subject_id');
            $requestData = $request->input();
            $isExist = findData('tutorclasses', '*', 'tutor_id', $tutorId);
//            prd($_FILES);
            if (empty($subId)) { // New record, save it
                $Subject = new Subject();
                $Subject->user_id = $tutorId;
                $Subject->subjects_name = $request->input('subject_name');
                if ($file = $request->hasFile('subject_image')) {
                    $file = $request->file('subject_image');
                    $Subject->subject_image = upload_site_images($tutorId, $file, 'subjects');
                }

                $Subject->status = $request->input('subject_status');
                $Subject->created_at = date('Y-m-d H:i:s');

                set_flash_message('Subject Added Successfully.', 'alert-success');
                $Subject->save();
            } else {
                $Subject = Subject::where(['id' => $subId, 'user_id' => $tutorId])->first();
                $Subject->subjects_name = $request->input('subject_name');
                if ($file = $request->hasFile('subject_image')) {
                    $file = $request->file('subject_image');
                    $Subject->subject_image = upload_site_images($tutorId, $file, 'subjects');
                }
                $Subject->status = $request->input('subject_status');
                $Subject->updated_at = date('Y-m-d H:i:s');

                $Subject->update();
                set_flash_message('Subject Updated successfully', 'alert-success');
            }
            return redirect('/subjects');
        }
        return redirect('/');
    }

    /**
     * Function to delete product
     * @param void
     * @return array
     */
    public function deleteSubject($subId) {
        $subject = Subject::find($subId);
        if ($subject->delete()) {
            set_flash_message('Subject Deleted successfully', 'alert-success');
            return redirect('/subjects');
            $response['resCode'] = 0;
            $response['resMsg'] = 'Subject deleted successfully';
        } else {
            $response['resCode'] = 2;
            $response['resMsg'] = 'Internal server error';
        }

        return response()->json($response);
    }

}
?>


