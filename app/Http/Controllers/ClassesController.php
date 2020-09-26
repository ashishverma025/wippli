<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Tutorclass,
    App\TutorStudents,
    App\LearningCenter,
    App\ClassStudent;
use Auth,
    DB,
    Hash,
    Session;
use DataTables;
use DateTime;

class ClassesController extends Controller {

    public function assignClass(Request $request) {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $input = $request->all();
            $classes = DB::table("tutorclasses")
//                    ->where('status', '=', '1')
                    ->where('tutor_id', '=', $userId)
                    ->pluck("class_name", 'id');
            $Student = new TutorStudents();
            $students = $Student->getCurrentLcStudents();

//            pr($students);
            $class = !empty($input['class']) ? $input['class'] : "";
            $date = !empty($input['date']) ? $input['date'] : "";
            return view('sites-student.assign-class-to-students', ['classes' => $classes, 'students' => $students, 'classfilter' => $class, 'dateFilter' => $date]);
        }
        return redirect('/');
    }

    public function addClassToGlobalStudents(Request $request) {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $postData = $request->all();
            if (!empty($postData['students']) && !empty($postData['class'])) {
                $classId = $postData['class'] ? $postData['class'] : "";
                $newStudents = $postData['students'] ? $postData['students'] : "";
                //CLASS STUDENTS MAP DATA SAVE HERE
//                    prd($postData);
                foreach ($newStudents as $key => $student_id) {
                    $classStudent = ClassStudent::where(['student_id' => $student_id, 'lc_id' => $userId, 'class_id' => $classId])->first();
                    //Send Welcome Mail To students
                    $learningCenter = LearningCenter::where(['user_id' => $userId])->first();
                    $studentDetails = getUserDetailsById($student_id);
                    $bodyData = ['name' => $studentDetails->name, 'lc_name' => @$learningCenter->lc_name];
                    
                    if (empty($classStudent) && !empty($classId)) {
                        sendMail($request, $bodyData, 'Hii-Message', $studentDetails->email, 'Welcome to Learning center class', "tutifysg@gmail.com", 'addLcStudentToClass');
                        $ClassStudent = new ClassStudent();
                        $ClassStudent->lc_id = $userId;
                        $ClassStudent->student_id = $student_id;
                        $ClassStudent->class_id = $classId;
                        $ClassStudent->status = 1;
                        $ClassStudent->save();
                    }
                }
                //DELETE PREVIOUS vs NEW CLASSES RECORDS
//                $prevClasses = getStudentClases($student_id, $userId);
//                $newClasses = $request->input('student_class');
//                $result = array_diff($prevClasses, $newClasses);
//                if (!empty($result)) {
//                    foreach ($result as $key => $id_to_delete) {
//                        DB::table('class_students')->where(['student_id' => $student_id, 'lc_id' => $userId, 'class_id' => $id_to_delete])->delete();
//                    }
//                }
                set_flash_message('Class has been successfully assign to selected student ', 'alert-success');
                return redirect('/classes');
            }
            set_flash_message('Please select at least one student', 'alert-danger');
            return redirect('/assignclass');
        }
        return redirect('/');
    }

}
?>


