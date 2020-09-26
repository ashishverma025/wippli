<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Auth;
use DB;
use App\User;
use App\Subject;
use App\Syllabuslist;

class SubjectSyllabusController extends Controller {

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index($type = null) {
        return view('admin.subject_list', ['type' => $type]);
    }

    //Fetch Subject List Datables Ajax Request
    public function fetchSubject(Request $request) {
        $input = $request->all();
//        pr($input);
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'subjects_name', 'status'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $syllabus = Subject::where('user_id', 1);

        if (!empty($sSearch)) {
            $syllabus = $syllabus->Where('subjects_name', 'like', '%' . $sSearch . '%');
        }
        $iTotal = $syllabus;
        $syllabus = $syllabus->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();

        $iTotal = $iTotal->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $k = 0;
        if (count($syllabus) > 0) {
            foreach ($syllabus as $inst) {
                $status = $inst->status == 1 ? 'Active' : 'Inactive';
                $action = '<a href="addSubject/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteSubject/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';
                $response['aaData'][$k] = [$k + 1, $inst->subjects_name, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update Subject BY POST REQUEST
    public function saveSubject(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $SubjectDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $SubjectDetails = Subject::where(['id' => $id])->first();
                }
//                pr($SubjectDetails);
                return view('admin.addSubjects', ['SubjectDetails' => $SubjectDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {
                $postData = $request->all();
                $subId = ($request->input('savebtn') == 'Update') ? ($request->input('subId')) : '';
                $syllabus = ($request->input('savebtn') == 'Add') ? new Subject() : Subject::where(['id' => $subId])->first();
//                prd($postData);
                $syllabus->subjects_name = !empty($request->input('subject_name')) ? $request->input('subject_name') : $syllabus->subjects_name;
                $syllabus->status = !empty($request->input('status')) ? $request->input('status') : $syllabus->status;
                if (($request->input('savebtn') == 'Add')) {
                    $syllabus->user_id = 1;
                    $syllabus->created_at = date('Y-m-d H:i:s');
                    $syllabus->save();
                    set_flash_message('Subject Added Successfully.', 'alert-success');
                } else {
                    $syllabus->updated_at = date('Y-m-d H:i:s');
                    $syllabus->update();
                    set_flash_message('Subject Updated successfully', 'alert-success');
                }
                return redirect('/admin/subject');
            }
        }
        return redirect('/');
    }

    public function deleteSubject($id) {
        try {
            $Subject = Subject::findOrFail($id);
            $destinationPath = public_path('/admin/upload/sunject');

            if (file_exists($destinationPath . '/' . $Subject->institute_logo)) {
                @unlink($destinationPath . '/' . $Subject->institute_logo);
            }
            $Subject->delete();
            set_flash_message('Subject deleted successfully.', 'alert-success');
            return redirect('/admin/subject');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

    public function Syllabus($type = null) {
        if (Auth::check()) {
            return view('admin.syllabus_list', ['type' => $type]);
        }
        return redirect('/');
    }

    //Fetch Syllabus List Datables Ajax Request
    public function fetchSyllabus(Request $request) {
        $input = $request->all();
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'subject_id', 'syllabus_name', 'status'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters

        $syllabus = Syllabuslist::select('*');
        if (!empty($sSearch)) {
            $syllabus = $syllabus->Where('syllabus_name', 'like', '%' . $sSearch . '%');
        }
        $iTotal = $syllabus;
        $syllabus = $syllabus->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();

        $iTotal = $iTotal->count();
//        prd($iTotal);
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $k = 0;
        if (count($syllabus) > 0) {
            foreach ($syllabus as $inst) {

                $subjectName = $inst->subject_id ? getSubjectNameById($inst->subject_id) : 'N/A';
                $status = $inst->status == 1 ? 'Active' : 'Inactive';
                $action = '<a href="addSyllabus/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteSyllabus/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';
                $response['aaData'][$k] = [$k + 1, $subjectName, $inst->syllabus_name, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update Subject BY POST REQUEST
    public function saveSyllabus(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $SyllabusDetails = "";
                $Subjects = "";
                $button = 'Add';
                $Subjects = DB::table("subjects")
                        ->where('status', '=', '1')
                        ->pluck('subjects_name','id');
                if (!empty($id)) {
                    $button = 'Update';
                    //ALL SUBJECTS

                    $SyllabusDetails = Syllabuslist::where(['id' => $id])->first();
                }
//                pr($Subjects);
                return view('admin.addSubjectsWiseSyllabus', ['Subjects' => $Subjects, 'button' => $button, 'SyllabusDetails' => $SyllabusDetails]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {
                $postData = $request->all();
                $syllId = ($request->input('savebtn') == 'Update') ? ($request->input('syllId')) : '';
                $syllabus = ($request->input('savebtn') == 'Add') ? new Syllabuslist() : Syllabuslist::where(['id' => $syllId])->first();
//                pr($syllabus);
//                prd($postData);
                $syllabus->subject_id = !empty($request->input('subject')) ? $request->input('subject') : @$syllabus->subject_id;
                $syllabus->syllabus_name = !empty($request->input('syllabus_name')) ? $request->input('syllabus_name') : $syllabus->syllabus_name;
                $syllabus->status = !empty($request->input('status')) ? $request->input('status') : $syllabus->status;
                if (($request->input('savebtn') == 'Add')) {
                    $syllabus->created_at = date('Y-m-d H:i:s');
                    $syllabus->save();
                    set_flash_message('Syllabus Added Successfully.', 'alert-success');
                } else {
                    $syllabus->updated_at = date('Y-m-d H:i:s');
                    $syllabus->update();
                    set_flash_message('Syllabus Updated successfully', 'alert-success');
                }
                return redirect('/admin/Syllabus');
            }
        }
        return redirect('/');
    }

}
