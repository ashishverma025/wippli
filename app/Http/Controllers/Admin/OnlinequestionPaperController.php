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

class OnlinequestionPaperController extends Controller {

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
        return view('admin.papers_list', ['type' => $type,'paperType'=>$paperType]);
    }

    //Fetch Question List Datables Ajax Request
     public function fetchPapers(Request $request) {
        $input = $request->all();
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        //Datatable column number to table column name mapping
        $arr = ['id','paper_name','paper_slug','status'];
        $sortBy = $arr[$col];
        //Get the records after applying the datatable filters
        $OnlinequestionPaper = OnlinequestionPaper::select('id','paper_name','status', 'paper_slug','paper_cover_image');

        if (!empty($sSearch)) {
            $OnlinequestionPaper = $OnlinequestionPaper->Where('paper_name', 'like', '%' . $sSearch . '%');
        }

        $iTotal = $OnlinequestionPaper->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );
        
        $sql = $OnlinequestionPaper->orderBy($sortBy, $sortType)->limit($length)->offset($start);
        $OnlinequestionPaper = $sql->get();
        
        $k = 0;
        if (count($OnlinequestionPaper) > 0) {
            foreach ($OnlinequestionPaper as $inst) {
                
//                echo $inst->paper_cover_image;die;
                
                $status = $inst->status == 'active' ? 'Active' : 'Inactive';
                $clickableName = '<a href="/admin/question?paperType='.$inst->paper_slug.'">'.$inst->paper_name.'</a>';
                $img = $inst->paper_cover_image ? url('/public/admin/upload/papercover').'/' . $inst->paper_cover_image : '/public/admin/upload/not-available.jpg';
                $image = "<img src='" . $img . "' height='50' width='100'>";
                
                $action = '<a href="addPapers/' . $inst->id . '" '
                . 'class="delete hidden-xs hidden-sm" title="Edit">'
                . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                . ' <a href="deletePapers/' . $inst->id . '"'
                . ' class="delete hidden-xs hidden-sm" title="Delete"'
                . 'onclick=\'return confirm("Are you sure you want to delete this Paper?")\'>'
                . '<i class="fa fa-trash text-danger"></i></a>';
                $response['aaData'][$k] = [$inst->id,$clickableName,$image,$inst->paper_slug,$inst->paper_description, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }


    //Add/Update Question BY POST REQUEST
    public function savePapers(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $PaperDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $PaperDetails = OnlinequestionPaper::where(['id' => $id])->first();
                }
//                echo $id;
//                prd($PaperDetails);
                return view('admin.addPaper', ['PaperDetails' => $PaperDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {
                
//                 prd($request->all());

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
                //                prd($OnlinequestionPaper);
                if (($request->input('savebtn') == 'Add')) {
                    $OnlinequestionPaper->created_at = date('Y-m-d H:i:s');
                    $OnlinequestionPaper->save();
                    set_flash_message('Paper Added Successfully.', 'alert-success');
                } else {
                    if(Question::where(['paper_id' => $paperId])->first()){
                        $live = $postData['status'] == 'active' ? 'yes':'no';
                       $questions = DB::table('questions')
                            ->where('paper_id',$paperId)
                            ->update(['live' => $live]);
//                                                echo $paperId.' -- '.$live;
//                                                prd($questions);

                    }
                    $OnlinequestionPaper->updated_at = date('Y-m-d H:i:s');
                    $OnlinequestionPaper->update();
                    set_flash_message('Paper Added Successfully.', 'alert-success');
                }
                return redirect('/admin/practicePaper');
            }
        }
        return redirect('/');
    }

    public function deletePapers($id) {
        try {
            $OnlinequestionPaper = OnlinequestionPaper::findOrFail($id);
            $OnlinequestionPaper->delete();

            set_flash_message('Paper deleted successfully.', 'alert-success');
            return redirect('/admin/practicePaper');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
