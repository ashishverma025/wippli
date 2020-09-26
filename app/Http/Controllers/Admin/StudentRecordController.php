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
use App\StudentRecord;
use App\OnlinequestionPaper;
use Illuminate\Support\Facades\Validator;

class StudentRecordController extends Controller {

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }


    public function index(Request $request,$type = null) {
        $input = $request->all();
        $paperType = !empty($input['paperType']) ? $input['paperType'] : "";
        return view('admin.studentData_list', ['type' => $type,'paperType'=>$paperType]);
    }

    //Fetch Question List Datables Ajax Request
    public function fetchStudentData(Request $request) {
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
        $arr = ['id','user_id','student_email','student_name','pid','total_score','status'];
        $sortBy = $arr[$col];
        //Get the records after applying the datatable filters
        $question = StudentRecord::where('status', '1');
        if (!empty($paperType)) {
            $question = $question->Where('pid',$paperType);
        }
        if (!empty($sSearch)) {
            $question = $question->Where('student_email', 'like', '%' . $sSearch . '%');
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
                $status = $inst->status == 1 ? 'Active' : 'Inactive';
                $clickablePid = '<a href="/admin/question?paperType='.$inst->pid.'">'.$inst->pid.'</a>';
                
                $action = '<a href="deletestudentData/' . $inst->id . '"'
                . ' class="delete hidden-xs hidden-sm" title="Delete"'
                . 'onclick=\'return confirm("Are you sure you want to delete this Student record?")\'>'
                . '<i class="fa fa-trash text-danger"></i></a>';
                $response['aaData'][$k] = [$k+1,$inst->student_name,$inst->student_email,$clickablePid,$inst->total_question,$inst->total_score,$inst->student_score,$inst->right_attempt,$inst->wrong_attempt, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update Question BY POST REQUEST
    public function savestudentData(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $PaperDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $PaperDetails = StudentRecord::where(['id' => $id])->first();
                }
                return view('admin.addPaper', ['PaperDetails' => $PaperDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {
                
                // prd($request->all());

                $postData = $request->all();
                $paperId = ($request->input('savebtn') == 'Update') ? ($request->input('paperId')) : '';
                $OnlinequestionPaper = ($request->input('savebtn') == 'Add') ? new OnlinequestionPaper() : OnlinequestionPaper::where(['id' => $paperId])->first();

                $OnlinequestionPaper->paper_name = !empty($postData['paper_name']) ? $postData['paper_name'] : $OnlinequestionPaper->paper_name;
                $OnlinequestionPaper->paper_slug = !empty($postData['paper_slug']) ? $postData['paper_slug'] : $OnlinequestionPaper->paper_slug;
                $OnlinequestionPaper->paper_description = !empty($postData['paper_description']) ? $postData['paper_description'] : $OnlinequestionPaper->paper_description;
                $OnlinequestionPaper->status = !empty($postData['status']) ? $postData['status'] : $OnlinequestionPaper->status;
                /* Upload Paper Cover Image */
                if (isset($postData['paper_cover_image'])) {
                    if ($file = $postData['paper_cover_image']) {
                        $file = $postData['paper_cover_image'];
                        $OnlinequestionPaper->paper_cover_image = upload_admin_images($file, 'papercover');
                    }
                }
                if (($request->input('savebtn') == 'Add')) {
                    $OnlinequestionPaper->created_at = date('Y-m-d H:i:s');
                    $OnlinequestionPaper->save();
                    set_flash_message('Paper Added Successfully.', 'alert-success');
                } else {
                    $OnlinequestionPaper->updated_at = date('Y-m-d H:i:s');
                    $OnlinequestionPaper->update();
                    set_flash_message('Paper Added Successfully.', 'alert-success');
                }
                return redirect('/admin/studentData');
            }
        }
        return redirect('/');
    }

    public function deletestudentData($id) {
        try {
            $OnlinequestionPaper = StudentRecord::findOrFail($id);
            $OnlinequestionPaper->delete();

            set_flash_message('Student Data deleted successfully.', 'alert-success');
            return redirect('/admin/studentData');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
