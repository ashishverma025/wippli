<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Auth;
use DB;
use App\User;
use App\Question;
use App\Answer;
use App\Syllabuslist;
use App\OnlinequestionPaper;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller {

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index(Request $request, $type = null) {
        $input = $request->all();
        $paperType = !empty($input['paperType']) ? $input['paperType'] : "";
        $OnlinequestionPaper = OnlinequestionPaper::where(['status' => 'active'])->pluck("paper_name", 'paper_slug');
        return view('admin.question_list', ['type' => $type, 'paperType' => $paperType, 'OnlinequestionPaper' => $OnlinequestionPaper]);
    }

    //Fetch Question List Datables Ajax Request
    public function fetchQuestion(Request $request) {
        $input = $request->all();
        // pr($input);
        $paperType = !empty($input['paperType']) ? $input['paperType'] : "";
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        //Datatable column number to table column name mapping
        $arr = ['id', 'question_image', 'paper_slug', 'question', 'explanation', 'help'];
        $sortBy = $arr[$col];
        //Get the records after applying the datatable filters
        $question = Question::where('status', '1');
        if (!empty($paperType)) {
            // prd($paperType);
            $question = $question->Where('paper_slug', $paperType);
        }
        if (!empty($sSearch)) {
            $question = $question->Where('question', 'like', '%' . $sSearch . '%');
        }

        $iTotal = $question->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $sql = $question->orderBy($sortBy, $sortType)->limit($length)->offset($start);
        $question = $sql->get();

        // echo count($question);
        // prd($response);

        $k = 0;
        if (count($question) > 0) {
            foreach ($question as $inst) {
                $status = $inst->live == 'yes' ? 'Active' : 'Inactive';
                $priview = '<a href="/admin/viewQuestion/' . $inst->id . '" title="Preview" class="delete hidden-xs hidden-sm" style="margin-left:7px;"><i class="fa fa-eye text-warning priview"></i></a>';
                $img = $inst->question_image ? '/public/admin/upload/questions/' . $inst->question_image : '/public/admin/upload/not-available.jpg';
                $image = "<img src='" . $img . "' height='50' width='100'>";
                $action = '<a href="addQuestion/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteQuestion/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this Question?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>' . $priview;
                $response['aaData'][$k] = [$k + 1, $image, $inst->paper_slug, $inst->question, $inst->explanation, $inst->question_type, $inst->question_mark, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update Question BY POST REQUEST
    public function saveQuestion(Request $request, $id = null) {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            if ($request->isMethod('get')) {
                $QuestionDetails = "";
                $AnswerDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $QuestionDetails = Question::where(['id' => $id])->first();
                    $AnswerDetails = Answer::where(['question_id' => $id])->get()->toArray();
                }
                $OnlinequestionPaper = OnlinequestionPaper::select("id", 'paper_slug', 'paper_name')->where(['status' => 'active'])->get()->toArray();
//                 pr($AnswerDetails);
                return view('admin.addQuestion', ['QuestionDetails' => $QuestionDetails, 'button' => $button, 'AnswerDetails' => $AnswerDetails, 'OnlinequestionPaper' => $OnlinequestionPaper]);
            }
            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {

                $postData = $request->all();
                $postData = $postData['Question'];
                $questionId = ($request->input('savebtn') == 'Update') ? ($request->input('questionId')) : '';
                $question = ($request->input('savebtn') == 'Add') ? new Question() : Question::where(['id' => $questionId])->first();
                $exam_paper_id = explode('-', $postData['exam_paper_id']);
                // prd($exam_paper_id);
                $question->question = !empty($postData['question']) ? $postData['question'] : $question->question;
                $question->live = !empty($postData['live']) ? $postData['live'] : $question->live;
                $question->paper_id = !empty($postData['exam_paper_id']) ? $exam_paper_id[1] : $question->paper_id;
                $question->paper_slug = !empty($postData['exam_paper_id']) ? $exam_paper_id[0] : $question->paper_slug;
                $question->explanation = !empty($postData['explanation']) ? $postData['explanation'] : $question->explanation;
                // $question->help = !empty($postData['help']) ? $postData['help'] : $question->help;
                $question->question_type = !empty($postData['question_type']) ? $postData['question_type'] : $question->question_type;
                $question->question_mark = !empty($postData['question_mark']) ? $postData['question_mark'] : $question->question_mark;
                // $question->video_solution = !empty($postData['video_solution']) ? $postData['video_solution'] : $question->video_solution;
                // $question->video_type = !empty($postData['video_type']) ? $postData['video_type'] : $question->video_type;

                $question->status = '1';
                if (isset($postData['question_image'])) {
                    if ($file = $postData['question_image']) {
                        $file = $postData['question_image'];
                        $question->question_image = upload_admin_images($file, 'questions');
                    }
                }
                $question->ip_address = $_SERVER['REMOTE_ADDR'];
                $question->added_by = $userDetails['id'];
                if (($request->input('savebtn') == 'Add')) {
                    $question->created_at = date('Y-m-d H:i:s');
                    /* Upload Question Image */

                    $question->save();
                    if ($postData['question_type']) {
                        if (!empty($postData['option'])) {
                            foreach ($postData['option'] as $key => $value) {
                                if (!empty($value)) {
                                    $answer = new Answer();
                                    $answer->question_id = $question->id;
                                    $answer->answer = $value;
                                    /* Upload AnswersOption Image */
                                    if (isset($postData['answer_image'][$key])) {
                                        if ($file = $postData['answer_image'][$key]) {
                                            $file = $postData['answer_image'][$key];
                                            $answer->answer_image = upload_admin_images($file, '/answers' . $question->id);
                                        }
                                    }
                                    if (!empty($postData['answer'])) {
                                        $answer->is_correct = ($key == @$postData['answer'] - 1) ? 'Yes' : 'No';
                                    }
                                    $answer->status = '1';
                                    $answer->created_at = date('Y-m-d H:i:s');
                                    $answer->save();
                                }
                            }
                        }
                    }
                    set_flash_message('Question Added Successfully.', 'alert-success');
                } else {
                    $question->updated_at = date('Y-m-d H:i:s');
                    $question->update();
                    if ($postData['question_type']) {

                        if (!empty($postData['option'])) {
                            foreach ($postData['option'] as $ansId => $value) {
                                if (!empty($value)) {
                                    $answer = Answer::where(['id' => $ansId])->first();
                                    if (!empty($answer)) {
                                        $answer->answer = $value;

                                        /* Upload AnswersOption Image */
                                        if (isset($postData['answer_image'][$ansId])) {
                                            if ($file = $postData['answer_image'][$ansId]) {
                                                $file = $postData['answer_image'][$ansId];
                                                $answer->answer_image = upload_admin_images($file, '/answers' . $question->id);
                                            }
                                        }
                                        if (!empty($postData['answer'])) {
                                            $answer->is_correct = ((@$postData['answer'] == $ansId)) ? 'Yes' : 'No';
                                        }
                                        $answer->status = '1';
                                        $answer->updated_at = date('Y-m-d H:i:s');
//                            prd($postData);
                                        $answer->update();
                                    } else {
                                        if (!empty($postData['option'])) {
                                            $questionId = $request->all('questionId') ? $request->all('questionId') : '';
                                            foreach ($postData['option'] as $key => $value) {
                                                $answer = new Answer();
                                                $answer->question_id = $questionId['questionId'];
                                                $answer->answer = $value;

                                                /* Upload AnswersOption Image */
                                                if (isset($postData['answer_image'][$key])) {
                                                    if ($file = $postData['answer_image'][$key]) {
                                                        $file = $postData['answer_image'][$key];
                                                        $answer->answer_image = upload_admin_images($file, '/answers' . $question->id);
                                                    }
                                                }
                                                if (!empty($postData['answer'])) {
                                                    $answer->is_correct = ($key == $postData['answer'] - 1) ? 'Yes' : 'No';
                                                }
                                                $answer->status = '1';
                                                $answer->created_at = date('Y-m-d H:i:s');

                                                //prd($postData);
                                                $answer->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    set_flash_message('Question Updated successfully', 'alert-success');
                }
                return redirect("/admin/question?paperType=$exam_paper_id[0]");
            }
        }
        return redirect('/');
    }

    public function viewQuestion($id) {
        try {
            $QADetails = [];
            $Question = Question::findOrFail($id);
            ////////// Total Questions With Answer //////////
            $QuestionAnswer = DB::table('questions as q')
                    ->select('q.id', 'q.help', 'q.question_image', 'q.question_type', 'q.question_mark', 'q.paper_slug', 'q.explanation', 'q.question', 'a.answer', 'a.answer_image', 'a.is_correct')
                    ->leftJoin('answers as a', 'a.question_id', '=', 'q.id');
            if (!empty($id)) {
                $QuestionAnswer = $QuestionAnswer->where(['q.id' => $id]);
            }
            $QuestionAnswer = $QuestionAnswer->where(['live' => 'yes']);
            $QuestionAnswer = $QuestionAnswer->get()->toArray();
            if (!empty($QuestionAnswer)) {
                foreach ($QuestionAnswer as $key => $value) {
                    $QIds['QIds'][$value->id] = $value->id;
                    $QADetails[$value->id]['Question'] = $value->question;
                    $QADetails[$value->id]['qId'] = $value->id;
                    $QADetails[$value->id]['Image'] = $value->question_image;
                    if ($value->question_type != 'MCQ') {
                        $answer = strtolower(preg_replace('/\s+/', '', $value->answer));
                        $QADetails[$value->id]['possibilityAnswer'][] = $answer;
                    } else {
                        $QADetails[$value->id]['Options'][] = $value->answer;
                    }
                    $QADetails[$value->id]['ViewAnswer'] = $value->help;
                    $QADetails[$value->id]['Explanation'] = $value->explanation;
                    $QADetails[$value->id]['isCorrect'][] = $value->is_correct;
                    $QADetails[$value->id]['questionMark'] = $value->question_mark;
                    $QADetails[$value->id]['questionType'] = $value->question_type;
                    $QADetails[$value->id]['paperSlug'] = $value->paper_slug;
                }
            }

//                                    prd($QADetails);
            $practicePaper = OnlinequestionPaper::where(['status' => '1'])->pluck("paper_name", 'paper_slug');

            return view('admin.viewQuestion', ['QADetails' => $QADetails, 'pId' => $id, 'active' => '']);
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

    public function deleteQuestion($id) {
        try {
            $Question = Question::findOrFail($id);
            $Question->delete();
            $Answer = Answer::where(['question_id' => $id])->delete();

            set_flash_message('Question deleted successfully.', 'alert-success');
            return redirect('/admin/question');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

    public function getPaperwiseQuestionCount(Request $request) {
        $postData = $request->all();
        $expld = explode('-', $postData['paperId']);
        $paperSlug = $expld[0];
        $QuestionDetails = Question::where(['paper_slug' => $paperSlug])->get()->count();
        return $QuestionDetails ? $QuestionDetails : 0;
    }

}
