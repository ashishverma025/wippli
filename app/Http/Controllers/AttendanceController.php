<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Author,
    App\Tutorclass,
    App\Attendance,
    App\Subject;
use App\User;
use Auth,
    DB,
    Hash,
    Session;
use DataTables;
use DateTime;

class AttendanceController extends Controller {

    public function fetchAttendance(Request $request) {
        $userId = getUser_Detail_ByParam('id');
        $auth = new Attendance();
        $Query = $auth->getAllLearningCenterAttendance($request);
        $iTotal = $Query['countQuery']->count();
        $response = ['iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iTotal, 'aaData' => []];
//        pr($response);
        if (count($Query) > 0) {
            $k = 0;
            foreach ($Query['dataQuery'] as $attendance) {
                $img = !empty($attendance->avatar) ? "public/sites/images/student/$userId/$attendance->avatar" : "public/sites/images/dummy.jpg";
                $present_checked = ($attendance->present == 1) ? 'checked' : '';
                $absent_checked = ($attendance->absent == 1) ? 'checked' : '';
                $not_engaged_checked = ($attendance->not_engaged == 1) ? 'checked' : '';
                $response['aaData'][$k] = array(
                    0 => $k + 1,
                    1 => '<img src="' . $img . '"  height="50" width="50"> ',
                    2 => $attendance->fname,
                    3 => $attendance->lname,
                    4 => !empty($attendance->class_date) ? date('d-m-Y', strtotime($attendance->class_date)) : "N/A",
                    5 => $attendance->email,
                    6 => $attendance->class_name,
                    7 => "<div class='icheck-success d-inline'><input type='radio' id='radioSuccess$k' name='attendance[$attendance->attendance_id]' value='1' $present_checked><label for='radioSuccess$k'></label></div>",
                    8 => "<div class='icheck-danger d-inline'><input type='radio' id='radioDanger$k' name='attendance[$attendance->attendance_id]' value='0' $absent_checked><label for='radioDanger$k'></label></div>",
                    9 => "<div class='icheck-primary d-inline'><input type='radio' id='radioPrimary$k' name='attendance[$attendance->attendance_id]' value='2' $not_engaged_checked><label for='radioPrimary$k'></label></div>",
                    10 => $attendance->phone,
                    11 => '<a href="edit/' . $attendance->id . '" '
                    . 'class="delete hidden-xs hidden-sm" title="Edit">'
                    . '<i class="fa fa-pencil text-warning"></i></a> &nbsp;'
                    . ' <a href="user/delete/' . $attendance->id . '"'
                    . ' class="delete hidden-xs hidden-sm" title="Delete"'
                    . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                    . '<i class="fa fa-trash text-danger"></i></a>',
                );
                $k++;
            }
        }
        return response()->json($response);
    }

//Save Studance Attendence Dashboard
    public function saveattendence(Request $request, $type = null) {
        if (Auth::check()) {
            $tutorId = getUser_Detail_ByParam('id');
            if (!empty($tutorId)) { // New record, save it
                $postData = $request->all();
                $class = !empty($postData['class']) ? $postData['class'] : "";

                $filterDate = !empty($postData['date']) ? $postData['date'] : date("Y-m-d");
                $d = new DateTime($filterDate); // For today/now, don't pass an arg.
                $d->modify("-0 day");
                $date = $d->format("Y-m-d");

                $checkClass = DB::table('tutorclasses as tc')
                                ->where('tc.tutor_id', $tutorId)
                                ->where('tc.id', $class)
                                ->whereDate('tc.class_date', '<=', $date)->first();
//                prd($checkClass);
                if (!empty($checkClass)) {
                    if (!empty($postData) && isset($postData['attendance'])) {
                        foreach ($postData['attendance'] as $studentId => $value) {
                            $checkRecord = DB::table('attendances as a')
                                    ->where('a.student_id', $studentId)
                                    ->where('a.tutor_id', $tutorId)
                                    ->where('a.class_id', $class)
                                    ->whereDate('a.created_at', '=', $date)
                                    ->first();

//                            prd($checkRecord);
                            if (empty($checkRecord)) {
                                $Attendence = new Attendance();
                                if ($value == 1) {
                                    $Attendence->present = 1;
                                }
                                if ($value == 0) {
                                    $Attendence->absent = 1;
                                }
                                if ($value == 2) {
                                    $Attendence->not_engaged = 1;
                                }
                                $Attendence->tutor_id = $tutorId;
                                $Attendence->student_id = $studentId;
                                $Attendence->subject_id = 4;
                                $Attendence->class_id = $class;
                                $Attendence->type = 1;
                                $Attendence->status = 1;
                                $Attendence->created_at = $date ? $date : date('Y-m-d H:i:s');
                                $Attendence->save();
                                set_flash_message('Attendence Save Successfully.', 'alert-success');
                            } else {
                                $Attendence = Attendance::where(['student_id' => $studentId, 'tutor_id' => $tutorId])->whereDate('created_at', $date)->first();
                                if ($value == 1) {
                                    $Attendence->present = 1;
                                    $Attendence->absent = 0;
                                    $Attendence->not_engaged = 0;
                                }
                                if ($value == 0) {
                                    $Attendence->present = 0;
                                    $Attendence->absent = 1;
                                    $Attendence->not_engaged = 0;
                                }
                                if ($value == 2) {
                                    $Attendence->present = 0;
                                    $Attendence->absent = 0;
                                    $Attendence->not_engaged = 1;
                                }
                                $Attendence->updated_at = date('Y-m-d H:i:s');
                                $Attendence->update();
                                set_flash_message('Attendence Updated successfully', 'alert-success');
                            }
                        }
                    }
                } else {
                    set_flash_message('No classes found.', 'alert-danger');
                    return redirect('/attendence');
                }
            }
            return redirect('/attendance');
        }
        return redirect('/');
    }

//Show Studance Attendence Summary
    public function attendenceSummary(Request $request, $type = null) {
        if (Auth::check()) {
//            echo $defaultPwd = randomPassword();die;
//        echo 'work in progress';die;
            $userId = getUser_Detail_ByParam('id');
            $auth = new Attendance();
            $allRecords = $auth->getAllattendenceSummary($request);
            if (!empty($allRecords['classfilter'])) {
                $filteredRecord = $allRecords['AttendenceSummary'][$allRecords['classfilter']];
                $allRecords['AttendenceSummary'] = [];
                $allRecords['AttendenceSummary'][$allRecords['classfilter']] = $filteredRecord;
            }
//            pr($allRecords);
            return view('sites.listLcAttendanceSummary', $allRecords);
        }
        return redirect('/');
    }

    public function fetchStudentsAttendance(Request $request) {
        $userId = getUser_Detail_ByParam('id');
        $Attendance = new Attendance();
        $Query = $Attendance->getAllLearningCenterStudents($request);
        $iTotal = $Query['countQuery']->count();
        $response = ['iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iTotal, 'aaData' => []];
        if (count($Query) > 0) {
            $k = 0;
            foreach ($Query['dataQuery'] as $attendance) {
                $img = !empty($attendance->avatar) ? "public/sites/images/student/$userId/$attendance->avatar" : "public/sites/images/dummy.jpg";
                $response['aaData'][$k] = array(
                    0 => $k + 1,
                    1 => '<img src="' . $img . '"  height="50" width="50"> ',
                    2 => $attendance->name,
                    3 => $attendance->class_name,
                    4 => !empty($attendance->class_date) ? date('d-m-Y', strtotime($attendance->class_date)) : "N/A",
                    5 => "<div class='icheck-success d-inline'><input type='radio' id='radioSuccess$k' name='attendance[$attendance->user_id]' value='1' ><label for='radioSuccess$k'></label></div>",
                    6 => "<div class='icheck-danger d-inline'><input type='radio' id='radioDanger$k' name='attendance[$attendance->user_id]' value='0' ><label for='radioDanger$k'></label></div>",
                    7 => "<div class='icheck-primary d-inline'><input type='radio' id='radioPrimary$k' name='attendance[$attendance->user_id]' value='2' ><label for='radioPrimary$k'></label></div>",
                );
                $k++;
            }
        }
//        prd($response);
        return response()->json($response);
    }

//Show Studance Attendence Dashboard
    public function attendence(Request $request, $type = null) {
        if (Auth::check()) {
            $input = $request->all();
            $userId = getUser_Detail_ByParam('id');
            $classes = DB::table("tutorclasses")
//                    ->where('status', '=', '1')
                    ->where('tutor_id', '=', $userId)
                    ->pluck("class_name", 'id');
            $class = !empty($input['class']) ? $input['class'] : "";
            $date = !empty($input['date']) ? $input['date'] : "";
            return view('sites.listLcAttendanceStudents', ['classes' => $classes, 'classfilter' => $class, 'dateFilter' => $date]);
        }
        return redirect('/');
    }

//Show Studance Attendence Dashboard
    public function attendance(Request $request, $type = null) {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $input = $request->all();
            $classes = DB::table("tutorclasses")
//                    ->where('status', '=', '1')
                    ->where('tutor_id', '=', $userId)
                    ->pluck("class_name", 'id');
            $class = !empty($input['class']) ? $input['class'] : "";
            $date = !empty($input['date']) ? $input['date'] : "";

            return view('sites.listLcAttendance', ['active' => 'attendence', 'classes' => $classes, 'classfilter' => $class, 'dateFilter' => $date]);
        }
        return redirect('/');
    }

//Save Studance Attendence Dashboard
    public function updateattendance(Request $request, $type = null) {
        if (Auth::check()) {
            $postData = $request->all();
            if (isset($postData['attendance']) && !empty($postData)) {
                $userId = getUser_Detail_ByParam('id');

                foreach ($postData['attendance'] as $attendanceId => $value) {
                    $Attendence = Attendance::where(['id' => $attendanceId])->first();
//                    prd($Attendence);
                    if ($value == 1) {
                        $Attendence->present = 1;
                        $Attendence->absent = 0;
                        $Attendence->not_engaged = 0;
                    }
                    if ($value == 0) {
                        $Attendence->present = 0;
                        $Attendence->absent = 1;
                        $Attendence->not_engaged = 0;
                    }
                    if ($value == 2) {
                        $Attendence->present = 0;
                        $Attendence->absent = 0;
                        $Attendence->not_engaged = 1;
                    }
                    $Attendence->updated_at = date('Y-m-d H:i:s');
                    $Attendence->update();
                    set_flash_message('Attendence Updated successfully', 'alert-success');
//                    prd($postData);
                }
                return redirect('/attendance');
            }
            set_flash_message('No attendance available.', 'alert-danger');
            return redirect('/attendance');
        }
        return redirect('/');
    }

}
?>


