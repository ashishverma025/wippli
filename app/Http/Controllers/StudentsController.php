<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Question,
    App\Answer,
    App\Tutorclass,
    App\TutorStudents,
    App\Attendance,
    App\ClassStudent,
    App\StudentRecord,
    App\StudentAnswer,
    App\QuestionAttempt,
    App\Subscriber,
    App\LearningCenter,
    App\OnlinequestionPaper,
    App\ExamprogressbarDetails,
    App\Directpayment,
    App\Subscription,
    App\Subject;
use App\User;
use Auth,
    DB,
    Hash,
    Session;
use DataTables;

class StudentsController extends Controller {

//GET TUTOR STUDENTS LIST POST REQUEST
    public function onlinePractice(Request $request, $paperSlug = null) {
        if (Auth::check()) {
            $input = $request->all();
            $Subscriber = 'active';
            $userDetails = getUserDetails();
            $exist = QuestionAttempt::where(['user_id' => $userDetails['id']])->first();
            $SubscribeDetails = Subscriber::where(['user_id' => $userDetails['id'], 'status' => 'active'])->where('subscription_id', '!=', 1)->first();
            if (!empty($SubscribeDetails)) {
                $subscription = Subscription::where(['id' => $SubscribeDetails['subscription_id']])->first();
                $diff = DateDiff(date('Y-m-d'), $SubscribeDetails['end_date'], 'days');

                if ($diff == '-1 days') {
                    DB::table('subscribers')->where(['user_id' => $userDetails['id']])->update(['status' => 'expired']);
                    if (!empty($SubscribeDetails['directpayment_id'])) {
                        $cardDetails = Directpayment::where(['id' => $SubscribeDetails['directpayment_id']])->first();
                        $directpaymentId = $this->directPayment($SubscribeDetails, $cardDetails, $userDetails);
//                        echo ($directpaymentId) . ' direct payment id';
                        if (!empty($directpaymentId)) {
                            $duration = $subscription['duration'];
                            $endDate = createDate(date('Y-m-d'), "+" . $duration, 'Y-m-d');
//                            prd($endDate);
                            DB::table('subscribers')->where(['user_id' => $userDetails['id']])->update(['status' => 'active', 'end_date' => $endDate]);
                            $Subscriber = 'active';
                        }
                    }
                }
            } else {
                $Subscriber = 'inactive';
            }
            // prd($Subscriber);
//            if ($exist['question_attempt'] >= 10) {
//                if(empty($Subscriber)){
//                    return redirect('/subscribe');
//                }
//            }
            $queryString = $paperSlug ? $paperSlug : "";
            if (empty($paperSlug)) {
                $paperSlug = "SEAMO 2016 Paper A";
            }

            $Question = Answer::all();
            $QADetails = [];

            ////////// Total Questions //////////
            $Question = DB::table('questions')
                    ->select('*');
            if (!empty($paperSlug)) {
                $Question = $Question->where(['paper_slug' => $paperSlug]);
            }
            $Question = $Question->where(['live' => 'yes']);
            $Question = $Question->get()->toArray();

            ////////// Total Questions Marks //////////
            $QuestionMarks = DB::table('questions')
                    ->select(DB::raw('SUM(question_mark) as totalMarks'));
            if (!empty($paperSlug)) {
                $QuestionMarks = $QuestionMarks->where(['paper_slug' => $paperSlug]);
            }
            $QuestionMarks = $QuestionMarks->where(['live' => 'yes']);
            $QuestionMarks = $QuestionMarks->get()->toArray();

            ////////// Total Questions With Answer //////////
            $QuestionAnswer = DB::table('questions as q')
                    ->select('q.id', 'q.help', 'q.question_image', 'q.question_mark', 'q.paper_slug', 'q.explanation', 'q.question', 'q.question_type', 'a.answer', 'a.answer_image', 'a.is_correct')
                    ->leftJoin('answers as a', 'a.question_id', '=', 'q.id');
            if (!empty($paperSlug)) {
                $QuestionAnswer = $QuestionAnswer->where(['paper_slug' => $paperSlug]);
            }
            $QuestionAnswer = $QuestionAnswer->where(['live' => 'yes']);
            $QuestionAnswer = $QuestionAnswer->get()->toArray();

            if (!empty($QuestionAnswer)) {
                $possibilityAnswer = [];
                foreach ($QuestionAnswer as $key => $value) {
                    $QIds['QIds'][$value->id] = $value->id;
                    $QADetails[$value->id]['Question'] = $value->question;
                    $QADetails[$value->id]['qId'] = $value->id;
                    $QADetails[$value->id]['Image'] = $value->question_image;
                    if ($value->question_type != 'MCQ') {
                        $answer = strtolower(preg_replace('/\s+/', '', $value->answer));
                        $QADetails[$value->id]['possibilityAnswer'][] = $answer;
//                        $QADetails[$value->id]['possibilityAnswer'] = json_encode($QADetails[$value->id]['Options']);
                    } else {
                        $QADetails[$value->id]['Options'][] = $value->answer;
                    }
                    $QADetails[$value->id]['ViewAnswer'] = $value->help;
                    $QADetails[$value->id]['Explanation'] = $value->explanation;
                    $QADetails[$value->id]['isCorrect'][] = $value->is_correct;
                    $QADetails[$value->id]['questionMark'] = $value->question_mark;
                    $QADetails[$value->id]['questionType'] = $value->question_type;
                    // $QADetails[$value->id]['embededUrl'] = $value->video_solution;
                    // $QADetails[$value->id]['videoType'] = $value->video_type;
                }
            }


            $practicePaper = OnlinequestionPaper::where(['status' => 'active'])->pluck("paper_name", 'paper_slug');
            $PaperProgress = ExamprogressbarDetails::select('progress', 'score_now')->where(['user_id' => $userDetails['id'], 'paper_id' => $paperSlug])->first();

            //////////RESULT////////////
            $result = [];
            if (isset($input['answer']) && !empty($input['answer'])) {
                $result['yourScore'] = 0;
                $result['wrongScore'] = 0;
                foreach ($input['answer'] as $key => $value) {
                    $keyExplode = explode('-', $key);
                    $qMark = $keyExplode['1'];
                    if ($value == 'Yes') {
                        $result['yourScore'] += $qMark;
                    } else {
                        $result['wrongScore'] += $qMark;
                    }
                }
                $attempts = array_count_values($input['answer']);
                $result['totalQuestions'] = count($QADetails);
                $result['totalScore'] = @$QuestionMarks[0]->totalMarks + @$PaperProgress['score_now'];
                $result['totalRightAnswer'] = 90;
                $result['rightAttempt'] = @$attempts['Yes'];
                $result['wronngAttempt'] = @$attempts['No'];
                $result['pid'] = @$paperSlug ? $paperSlug : 'SEAMO 2016 Paper A';
                $scoreNow = $this->saveRecord($request, $result);
                $result['yourScore'] = $result['yourScore'] + $scoreNow;
            }

            $paprSlug = $paperSlug ? explode(' ', $paperSlug) : [];
//             $s = ($Subscriber == 'active') ? 'exist' : 'lifetime';
//            pr($QADetails[380]['possibilityAnswer']);

            return view('sites-student.onlinePractice', [
                'active' => 'onlinePractice',
                'QADetails' => @$QADetails,
                'QuestionAnswer' => $Question,
                'result' => $result,
                'paperSlug' => $paprSlug,
                'pId' => @$paperSlug ? $paperSlug : 'SEAMO 2016 Paper A',
                'queryString' => $queryString,
                'practicePaper' => $practicePaper ? $practicePaper : '',
                'progress' => $PaperProgress ? (int) $PaperProgress->progress : '',
                'PaperProgress' => (!empty($QADetails) && !empty($PaperProgress)) ? round((100 / count($QADetails)) * (int) $PaperProgress->progress) : '',
                'Subscriber' => ($Subscriber == 'active') ? 'exist' : 'lifetime'
            ]);
        }
        return redirect('/');
    }

    public function directPayment($SubscribeDetails, $postData, $userDetails) {
        if (!empty($postData)) {
            $postData['sId'];

            $firstName = $postData['firstname'];
            $lastName = $postData['lastname'];
            $city = $postData['city'];
            $address1 = $postData['address'];
            $state = $postData['state'];
            $zip = $postData['zip'];
            $postData['cardholder'];
            $creditCardType = $postData['cardtype'];
            $creditCardNumber = $postData['card_number'];
            $padDateMonth = $postData['expiry_month'];
            $expDateYear = $postData['expiry_year'];
            $cvv2Number = $postData['cvv_code'];

            $country = 'US';
            $currencyID = 'USD';
            $paymentType = 'Sale';
            $amount = $SubscribeDetails['amount'];

            $nvpStrr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber" .
                    "&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName" .
                    "&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";
            // prd($nvpStrr);
            $httpParsedResponseAr = PPHttpPost('DoDirectPayment', $nvpStrr);
            //prd($httpParsedResponseAr);

            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                return $SubscribeDetails['directpayment_id'];
            } else {
                return '';
            }
        }
    }

    public function saveRecord(Request $request, $result) {
        $postData = $result;
        $userDetails = getUserDetails();
        $studentRecord = new StudentRecord();

        $exist = ExamprogressbarDetails::where(['user_id' => $userDetails['id'], 'paper_id' => $postData['pid']])->first();

        $studentRecord->user_id = $userDetails['id'];
        $studentRecord->student_name = $userDetails['name'];
        $studentRecord->student_email = $userDetails['email'];
        $studentRecord->pid = isset($postData['pid']) ? $postData['pid'] : 'Paper A';
        $studentRecord->total_question = $postData['totalQuestions'];
        $studentRecord->total_score = $postData['totalScore'];
        $studentRecord->student_score = isset($exist['score_now']) ? $postData['yourScore'] + $exist['score_now'] : $postData['yourScore'];

        $studentRecord->wrong_attempt = $postData['wronngAttempt'];
        $studentRecord->right_attempt = $postData['rightAttempt'];
        $studentRecord->ip_address = $_SERVER['REMOTE_ADDR'];

        $studentRecord->student_type = 'seamo';
        $studentRecord->save();

        if (!empty($exist)) {
            $scoreNow = $exist['score_now'];
            ExamprogressbarDetails::where(['user_id' => $userDetails['id'], 'paper_id' => $postData['pid']])->delete();
            return $scoreNow;
        }
        return 0;
    }

//GET TUTOR STUDENTS LIST POST REQUEST
    public function checkMail(Request $request, $type = null) {
        if (Auth::check()) {
            //Send Welcome Mail To students
            $LcId = getUser_Detail_ByParam('id');
            $bodyData = ['name' => 'Pratibha', 'email' => 'ashishkumar2@virtualemployee.com', 'password' => '12345678', 'lc_name' => 'Dixit-Lc', 'studentId' => 86, 'LcId' => 46];
            sendMail($request, $bodyData, 'Hii-Message', 'ashishkumar2@virtualemployee.com', 'Welcome to Learning center class', "tutifysg@gmail.com", 'addManualStudentToLc');
            echo "Mail send successfully";
            die;
        }
        return redirect('/');
    }

//GET TUTOR STUDENTS LIST POST REQUEST
    public function Inbox(Request $request, $type = null) {
        if (Auth::check()) {
            $input = $request->all();
            $LcId = getUser_Detail_ByParam('id');
            $students = TutorStudents::where(['tutor_id' => $LcId])->first();
            $classes = DB::table("tutorclasses")
//                    ->where('status', '=', '1')
                    ->where('tutor_id', '=', $LcId)
                    ->pluck("class_name", 'id');

            $class = !empty($input['class']) ? $input['class'] : "";
            $date = !empty($input['date']) ? $input['date'] : "";
            return view('sites-student.inbox', ['active' => 'inbox', 'students' => $students, 'classes' => $classes, 'classfilter' => $class, 'dateFilter' => $date]);
        }
        return redirect('/');
    }

//GET TUTOR STUDENTS LIST POST REQUEST
    public function studentList(Request $request, $type = null) {
        if (Auth::check()) {
            $input = $request->all();
            $LcId = getUser_Detail_ByParam('id');
            $students = TutorStudents::where(['tutor_id' => $LcId])->first();
            $classes = DB::table("tutorclasses")
//                    ->where('status', '=', '1')
                    ->where('tutor_id', '=', $LcId)
                    ->pluck("class_name", 'id');

            $class = !empty($input['class']) ? $input['class'] : "";
            $date = !empty($input['date']) ? $input['date'] : "";
            return view('sites.listLcStudent', ['active' => 'TutorStudent', 'students' => $students, 'classes' => $classes, 'classfilter' => $class, 'dateFilter' => $date]);
        }
        return redirect('/');
    }

    public function fetchStudents(Request $request) {
        $LcId = getUser_Detail_ByParam('id');

        $input = $request->all();
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "";
        $where = '';

        $class = !empty($input['class']) ? $input['class'] : "";
        $date = !empty($input['date']) ? $input['date'] : "";

// Datatable column number to table column name mapping
        $arr = ['id', 'avatar', 'fname', 'lname', 'email', 'phone', 'address'];
        $sortBy = $arr[$col];
// Get the records after applying the datatable filters

        $usersQuery = DB::table('tutor_students as ts')
                ->select('u.id', 'u.fname', 'u.lname', 'u.avatar', 'u.email', 'u.address', 'u.phone', 'u.name', 'u.email_verified_at', 'ts.status as isjoined')
                ->distinct('u.id')
                ->join('users as u', 'u.id', '=', 'ts.student_id');
//                ->leftJoin('class_students as cs', function($join) {
//                    $join->on('cs.student_id', '=', 'ts.student_id');
//                    $join->on('cs.lc_id', '=', 'ts.tutor_id');
//                })
//                ->leftJoin('tutorclasses as tc', 'tc.id', '=', 'cs.class_id')
        if (!empty($sSearch)) {
//            $usersQuery = $usersQuery->Where('u.name', 'like', '%' . $sSearch . '%');
            $usersQuery = $usersQuery->Where('u.email', 'like', '%' . $sSearch . '%');
        }
        $usersQuery = $usersQuery->where('ts.tutor_id', $LcId)
                ->where('u.user_type', 4)
                ->orderBy($sortBy, $sortType)
                ->limit($length)
                ->offset($start)
                ->get();

        $iTotal = DB::table('tutor_students as ts')
//                    ->Where('u.name', 'like', '%' . $sSearch . '%')
                        ->Where('u.email', 'like', '%' . $sSearch . '%')
                        ->select('u.id', 'u.fname', 'u.lname', 'u.avatar', 'u.email', 'u.address', 'u.phone', 'u.email_verified_at', 'ts.status as isjoined')
                        ->distinct('u.id')
                        ->join('users as u', 'u.id', '=', 'ts.student_id')
                        ->where('ts.tutor_id', $LcId)->where('u.user_type', 4)->count();

        $response = ['iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iTotal, 'aaData' => array()];

        $k = 0;
        if (count($usersQuery) > 0) {
            foreach ($usersQuery as $user) {
                $img = !empty($user->avatar) ? "public/sites/images/student/$LcId/$user->avatar" : "public/sites/images/dummy.jpg";
                $email_verified_at = !empty($user->email_verified_at) ? "<span style='color:green'>Verified</span>" : "<span style='color:red'>Not Verified</span>";
                $status = ($user->isjoined == '1') ? "<span style='color:green'>Joined</span>" : "<span style='color:red'>Not Joined</span>";

                $studentClasses = getStudentClasesNames($user->id, $LcId);
                $classNames = $studentClasses ? implode(',', $studentClasses) : "N/A";
                $response['aaData'][$k] = array(
                    0 => $k + 1,
                    1 => '<img src="' . $img . '"  height="50" width="50"> ',
                    2 => $user->fname . ' ' . $user->lname,
                    3 => $user->email,
                    4 => $user->phone,
                    5 => $classNames,
                    6 => $user->address,
                    7 => $email_verified_at,
                    8 => $status,
//                    9 => '<a href="lcstudent/' . $user->id . '" '
//                    . 'class="delete btn btn-primary" title="Add Class ">'
//                    . 'Add Class</a> &nbsp;',
//                    . ' <a href="user/delete/' . $user->id . '"'
//                    . ' class="delete hidden-xs hidden-sm" title="Delete"'
//                    . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
//                    . '<i class="fa fa-trash text-danger"></i></a>',
                );
                $k++;
            }
        }
        return response()->json($response);
    }

//ADD TUTOR STUDENT BY GET REQUEST
    public function addLcStudent(Request $request, $id = null) {
        if (Auth::check()) {
            $LcId = getUser_Detail_ByParam('id');
            $addManual = $request->input('addManual');

            $classes = [];
            $studentDetails = [];
            $classes = DB::table("tutorclasses as tc")
//                    ->where('status', '=', '1')
                    ->where('tutor_id', '=', $LcId)
                    ->pluck("tc.class_name", 'tc.id');

            $Student = new TutorStudents();
            $students = $Student->getVerifiedStudents();

            $studentClasses = [];
            if (!empty($id)) {
                $studentClasses = getStudentClases($id, $LcId);
                $isVerified = student_verify($id, $LcId);
                if ($isVerified['status'] == 'exist') {
                    $studentDetails = findData('users', '*', 'id', $id);
                    $studentDetails = isset($studentDetails[0]) ? $studentDetails[0] : "";
                } else {
                    return view('error404');
                }
            }
//            pr($classes);
            return view('sites.addGlobalStudent', ['studentDetails' => $studentDetails,
                'active' => 'TutorStudent',
                'tutorId' => $LcId,
                'studentId' => $id,
                'classes' => $classes,
                'students' => @$students['byEmail'],
                'studentsByName' => @$students['byName'],
                'studentClasses' => $studentClasses,
                'addManual' => $addManual,
            ]);
        }
        return redirect('/');
    }

//ADD TUTOR STUDENT DATA BY POST REQUEST
    public function addLcStudents(Request $request) {
        $method = $request->method('post');
        if (Auth::check()) {
            $this->validate($request, [
                'fname' => 'required|string|max:55',
                'lname' => 'required|string|max:55',
//                'password' => 'required|string|min:6',
                'email' => 'required|string|email|max:255|unique:users,email,'
            ]);
            $LcId = getUser_Detail_ByParam('id');
//            $isExist = findData('tutor_students', '*', 'tutor_id', $tutorId);
            $student_id = $request->input('student_id');
            if ($method == 'POST') { // New record, save it
                if (empty($student_id)) { // New record, save it
                    $user = new User();
                    //auto generated password
                    $defaultPwd = randomPassword();
                    $user->name = $name = $request->input('fname') . ' ' . $request->input('lname');
                    $user->fname = $request->input('fname');
                    $user->lname = $request->input('lname');
                    $user->email = $email = $request->input('email');
//                    $user->password = Hash::make($request->input('password'));
                    $user->password = Hash::make($defaultPwd);
                    $user->phone = $request->input('contact');
                    $user->gender = $request->input('gender');
                    $user->address = $request->input('address');
                    $user->created_at = date('Y-m-d H:i:s');
                    $user->user_type = 4;

                    //prd($request->file('student_image'));
                    if ($file = $request->hasFile('student_image')) {
                        $file = $request->file('student_image');
                        $user->avatar = upload_site_images($LcId, $file, 'student');
                    }
                    $user->save();

                    //Send Welcome Mail To students
                    $learningCenter = LearningCenter::where(['user_id' => $LcId])->first();
                    $bodyData = ['name' => $name, 'email' => $email, 'password' => $defaultPwd, 'lc_name' => @$learningCenter->lc_name, 'studentId' => $user->id, 'LcId' => $LcId];
                    sendMail($request, $bodyData, 'Hii-Message', $email, 'Welcome to Learning center class', "tutifysg@gmail.com", 'addManualStudentToLc');

                    //TUTOR STUDENTS MAP DATA SAVE HERE
                    $tutorStudent = new TutorStudents();
                    $tutorStudent->tutor_id = $LcId;
                    $tutorStudent->lc_id = $LcId;
                    $tutorStudent->student_id = $user->id; //student_id
                    $tutorStudent->save();

//        prd($bodyData);
                    set_flash_message('Student added successfully', 'alert-success');
                    return redirect('/studentlist');
                } else {
                    //prd($isExist[0]->student_id);
                    $user = User::where(['id' => $student_id])->first();
                    $user->updated_at = date('Y-m-d H:i:s');
                    if ($file = $request->hasFile('student_image')) {
                        $file = $request->file('student_image');
                        $user->avatar = upload_site_images($LcId, $file, 'student');
                    }
                    $user->update();
                    set_flash_message('Student detail updated successfully', 'alert-success');
                }
            }
            return redirect('/studentlist');
        }
        return redirect('/');
    }

    /**
     * for upload student by CSV.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadStudentByCsv(Request $request) {

        $emailExist = [];
        if ($request->file('csv_student') !== null) {
            $file = $request->file('csv_student');
            if ($_FILES["csv_student"]["size"] > 0) {
                $LcId = getUser_Detail_ByParam('id');

                $fileName = $_FILES["csv_student"]["tmp_name"];
                $file = fopen($fileName, "r");
                $i = 0;
                /* Unique email id check */
                $emailExist = is_email_exist_in_csv('csv_student', $request);
                $existingEmail = $emailExist['existingEmail'] ? $emailExist['existingEmail'] : "";
                $notExistingEmail = $emailExist['notExistingEmail'] ? $emailExist['notExistingEmail'] : "";

                /* If file is invalid then return here */
                if ($emailExist['status'] == 'failed') {
                    set_flash_message('Uploaded file is not valid', 'alert-danger');
                    $emailExist['msg'] = 'Uploade file is not a valid csv file';
                    return $emailExist;
                }

                /* GET ALL LC STUDENTS IN ARRAY */
                $TutorStudents = new TutorStudents();
                $LcStudents = $TutorStudents->getCurrentLcStudents()->toArray();

                $newStudentsList = "";
                if ($emailExist['status'] == 'exist') {
                    if (!empty($existingEmail)) {
                        /* (EXISTING-GLOBAL-LC-STUDENTS) - (LC-STUDENTS) = NEW-STUDENT */
                        $newStudents = array_diff($emailExist['existingEmail'], $LcStudents);
                        if (!empty($newStudents)) {
                            foreach ($newStudents as $key => $email) {
                                if (!empty($LcStudents)) {
                                    /* Get list of e-mails which are already exist in Global LC and not in Current LC8 */
                                    $newStudentsList .= "<option value='" . $key . "'>" . $email . "</option>";
                                } else {
                                    $newStudentsList .= "<option value='" . $key . "'>" . $email . "</option>";
                                }
                            }
                        }
                        /* NEW STUDENTS */
                        $emailExist['newStudents'] = $newStudentsList;
                    }
                } else {
                    $emailExist['msg'] = 'All Students are added successfully in your LC.';
                }

                /* IF STUDENT NOT EXISTS IN LC AND ALREADY EXIST IN GLOBAL LC */
                if (empty($newStudentsList) && !empty($existingEmail) && empty($notExistingEmail)) {
                    $emailExist['msg'] = 'All Studnets are already exists in your learning center.Thank You!';
                    return $emailExist;
                }

                /* IF STUDENT NOT EXISTS IN LC AND ALREADY EXIST IN GLOBAL LC */
                if (!empty($newStudentsList) && empty($notExistingEmail)) {
                    $emailExist['msg'] = 'Following Listbox students are already exist in Global students list';
                    return $emailExist;
                }

                /* IF STUDENTS NOT EXIST IN GLOBAL LIST AND ALREADY EXIST IN CURRENT LC  */
                if (empty($newStudentsList) && !empty($existingEmail) && !empty($notExistingEmail)) {
                    $emailExist['msg'] = 'Studnets uploaded successfully in your Learning Center, Some students already exist in your Learning Center';
                    return $emailExist;
                }

                if (!empty($notExistingEmail)) {
                    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                        if ($i != 0) {
                            if (in_array($column[3], $notExistingEmail)) {
                                //auto generated password
                                $defaultPwd = randomPassword();
                                $user = new User();
                                $user->name = $name = $column[1] . ' ' . $column[2];
                                $user->fname = $column[1];
                                $user->lname = $column[2];
                                $user->email = $email = $column[3];
                                $user->phone = $column[4];
                                $user->gender = $column[5];
                                $user->address = $column[6];
                                $user->dob = $column[7];
                                $user->user_type = 4;
                                $user->password = Hash::make($defaultPwd);
                                $user->save();

                                //Send Welcome Mail To students
                                $learningCenter = LearningCenter::where(['user_id' => $LcId])->first();
                                $bodyData = ['name' => $name, 'email' => $email, 'password' => $defaultPwd, 'lc_name' => @$learningCenter->lc_name, 'studentId' => $user->id, 'LcId' => $LcId];
                                sendMail($request, $bodyData, 'Registration Mail', $email, 'Welcome to Learning center class', "tutifysg@gmail.com", 'addManualStudentToLc');

                                //TUTOR STUDENTS MAP DATA SAVE
                                $tutorStudent = new TutorStudents();
                                $tutorStudent->tutor_id = $LcId;
                                $tutorStudent->lc_id = $LcId;
                                $tutorStudent->student_id = $user->id; //Last insert id
                                $tutorStudent->save();
                            }
                        }
                        $i++;
                    }
                }

                /* IF STUDENT NOT EXISTS IN LC AND ALREADY EXIST IN GLOBAL LC AND ALSO NEW STDENTS WHICH ARE NOT EXIST IN GLOBAL LIST */
                if (!empty($newStudentsList) && !empty($notExistingEmail)) {
                    $emailExist['msg'] = 'Following Listbox students are already exist in Global students list , Please check below to add from there.';
                    return $emailExist;
                }
                /* IF STUDENT NOT EXISTS IN LC AND ALREADY EXIST IN GLOBAL LC AND ALSO NEW STDENTS WHICH ARE NOT EXIST IN GLOBAL LIST */
                if (empty($newStudentsList) && !empty($notExistingEmail)) {
                    $emailExist['msg'] = 'All Studnets are uploaded successfully in your Learning Center.Thank You!';
                }
                return $emailExist;
            }
            set_flash_message('Not a valid Csv file', 'alert-danger');
            return redirect('/studentlist');
        } else {
            $emailExist['status'] = 'error';
            $emailExist['msg'] = 'No file selected';
            return $emailExist;
        }
    }

    //CHECK UNIQUE EMAIL 
    public function isEmailExist(Request $request) {
        $response = [];
        $postData = $request->post();
        $email_id = $postData['email'];
        return is_email_exist($email_id);
    }

    //GET TUTOR STUDENTS LIST AJAX REQUEST
    public function searchStudents(Request $request) {
        $response = [];
        $postData = $request->post();
        $sSearch = ($postData['text']) ? $postData['text'] : "";

        if (!empty($sSearch)) {
            $students = DB::table('users')->select('id', 'email')->Where('email', 'like', '%' . $sSearch . '%')
                    ->where('user_type', 4)
                    ->where('email_verified_at', '!=', null)
                    ->get();
            $str = "";
            foreach ($students as $key => $value) {
                //$str .= "<li class='select2-results__option select2-results__option--highlighted' id='select2-findStudent-result-".$value->id."-".$value->id."' role='option' aria-selected='false' data-select2-id='select2-findStudent-result-".$value->id."-".$value->id."' value=".$value->id.">".$value->id."</li>";
                $str .= "<option value='" . $value->id . "'>" . $value->email . "</option>";
            }
            return $str;
        }
    }

    public function addLcGlobalStudent(Request $request) {
        if (Auth::check()) {
            $response = [];
            $notStudent = [];
            $postData = $request->post();
            $LcId = getUser_Detail_ByParam('id');
            //TUTOR STUDENTS MAP DATA SAVE HERE
            if (isset($postData['students']) && !empty($postData['students'])) {
                $students = array_unique($postData['students']);
//                prd($students);

                foreach ($students as $key => $studentId) {
                    $checkStudent = TutorStudents::where(['student_id' => $studentId, 'tutor_id' => $LcId])->first();
                    //Send Welcome Mail To students
                    $learningCenter = LearningCenter::where(['user_id' => $LcId])->first();
                    $studentDetails = getUserDetailsById($studentId);
                    $bodyData = ['name' => $studentDetails->name, 'lc_name' => @$learningCenter->lc_name, 'studentId' => $studentId, 'LcId' => $LcId];

                    if (empty($checkStudent)) {
                        if ($studentDetails->user_type == 4) {
                            sendMail($request, $bodyData, 'Hii-Message', $studentDetails->email, 'Welcome To learning Center', 'tutifysg@gmail.com', 'addGlobalStudentToLc');
                            $tutorStudent = new TutorStudents();
                            $tutorStudent->tutor_id = $LcId;
                            $tutorStudent->lc_id = $LcId;
                            $tutorStudent->student_id = $studentId; //student_id
                            $tutorStudent->save();
                        } else {
                            $notStudent[] = $studentDetails->email;
                        }
                    }
                }
                if (empty($notStudent)) {
                    set_flash_message('Student Added successfully', 'alert-success');
                } else {
                    $stdnt = implode(',', $notStudent);
                    set_flash_message("You can not add $stdnt as a student because these are already exist in Global List as a Learning Center", 'alert-danger');
                }
                return redirect('/studentlist');
            }
            set_flash_message('Please select at least one student', 'alert-danger');
            return redirect('/lcstudent?addManual=true');
        }
        return redirect('/');
    }

    //join learning center verification link get request
    public function joinLc(Request $request, $studentId) {
        $LcId = getUser_Detail_ByParam('id');
        $TutorStudents = TutorStudents::where(['student_id' => $studentId, 'lc_id' => $LcId])->first();
        if (!empty($TutorStudents)) {
            $TutorStudents->status = "1";
            $TutorStudents->update();
        }
//        prd($TutorStudents);
        set_flash_message('Your have successfully joined LC', 'alert-success');
        return redirect('/student/dashboard');
    }

}

?>
