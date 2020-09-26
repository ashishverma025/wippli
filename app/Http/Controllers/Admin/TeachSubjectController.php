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
use App\TeachSubject;
use Illuminate\Support\Facades\Validator;

class TeachSubjectController extends Controller {

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
        return view('admin.listTeachSubject', ['type' => $type]);

//        return view('admin.Teach Subject_list', ['type' => $type]);
    }

    //Fetch subscription List Datables Ajax Request
    public function fetchteachSubject(Request $request) {
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
        $arr = ['id', 'subjects_name', 'subject_image', 'status'];
        $sortBy = $arr[$col];
        //Get the records after applying the datatable filters
        $TeachSubject = TeachSubject::select('id', 'subjects_name', 'subject_image','description', 'status');
        if (!empty($paperType)) {
            $TeachSubject = $TeachSubject->Where('subjects_name', $paperType);
        }
        if (!empty($sSearch)) {
            $TeachSubject = $TeachSubject->Where('recommended', 'like', '%' . $sSearch . '%');
        }

        $iTotal = $TeachSubject->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $sql = $TeachSubject->orderBy($sortBy, $sortType)->limit($length)->offset($start);
        $TeachSubject = $sql->get();

        // echo count($TeachSubject);
        // prd($response);

        $k = 0;
        if (count($TeachSubject) > 0) {
            foreach ($TeachSubject as $inst) {
                $status = $inst->status == 'active' ? 'Active' : 'Inactive';
                $image = $inst->subject_image ? "<img src='".url('public/sites/images/teach-subjects/1')."/".$inst->subject_image."' height='100' width='120'>"  : 'N/A';

                $action = '<a href="addteachSubject/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteteachSubject/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this subscription?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';

                $response['aaData'][$k] = [$k + 1, $inst->subjects_name,$image,$inst->description,  $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update subscription BY POST REQUEST
    public function saveteachSubject(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $TeachSubjectDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $TeachSubjectDetails = TeachSubject::where(['id' => $id])->first();
                }
                return view('admin.addTeachSubject', ['TeachSubjectDetails' => $TeachSubjectDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {
                $tutorId = 1;
                $postData = $request->all();
                $TeachSubjectId = ($request->input('savebtn') == 'Update') ? ($request->input('TeachSubjectId')) : '';
                $TeachSubject = ($request->input('savebtn') == 'Add') ? new TeachSubject() : TeachSubject::where(['id' => $TeachSubjectId])->first();

                $TeachSubject->subjects_name = !empty($postData['subjects_name']) ? $postData['subjects_name'] : $TeachSubject->subjects_name;
                $TeachSubject->description = !empty($postData['description']) ? $postData['description'] : $TeachSubject->description;
                if ($file = $request->hasFile('subject_image')) {
                    $file = $request->file('subject_image');
                    $TeachSubject->subject_image = upload_site_images($tutorId, $file, 'teach-subjects');
                }
                $TeachSubject->status = !empty($postData['status']) ? $postData['status'] : $TeachSubject->status;
                // prd($TeachSubject);

                if (($request->input('savebtn') == 'Add')) {
                    $TeachSubject->created_at = date('Y-m-d H:i:s');
                    $TeachSubject->save();
                    set_flash_message('Teach Subject Added Successfully.', 'alert-success');
                } else {
                    $TeachSubject->updated_at = date('Y-m-d H:i:s');
                    $TeachSubject->update();
                    set_flash_message('Teach Subject Added Successfully.', 'alert-success');
                }
                return redirect('/admin/teachSubject');
            }
        }
        return redirect('/');
    }

    public function deleteteachSubject($id) {
        try {
            $TeachSubject = TeachSubject::findOrFail($id);
            $TeachSubject->delete();

            set_flash_message('Teach Subject Data deleted successfully.', 'alert-success');
            return redirect('/admin/teachSubject');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
