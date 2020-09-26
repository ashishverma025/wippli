<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Question,
    App\Answer,
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

class OnlineExamController extends Controller {

//GET TUTOR STUDENTS LIST POST REQUEST
    public function index(Request $request) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                return redirect('/onlineExam/step-1');
            }
            if ($request->isMethod('post')) {
                $input = $request->all();
                $paperSlug = $input['paperName'];
                $userDetails = getUserDetails();
                $exist = QuestionAttempt::where(['user_id' => $userDetails['id']])->first();
                $SubscribeDetails = Subscriber::where(['user_id' => $userDetails['id'], 'status' => 'active'])->where('subscription_id', '!=', 1)->first();
                $Subscriber = 'active';
                $Subscriber = 'inactive';

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

                return view('sites-student.onlineExam', [
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
        }
        return redirect('/');
    }

    function Step1() {
        if (Auth::check()) {
            $paperName = "Paper D";
            return view('sites-student.examStep1', ['active' => 'onlineExam', 'paperName' => $paperName]);
        }
    }

}

?>
