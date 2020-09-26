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
use App\Answer,App\Classvideo;
use App\Syllabuslist;
use Illuminate\Support\Facades\Validator;

class ClassVideoController extends Controller {

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
        return view('admin.classVideo_list', ['type' => $type,'paperType'=>$paperType]);
    }

    //Fetch Question List Datables Ajax Request
     public function fetchClassVideo(Request $request) {
        $input = $request->all();
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        //Datatable column number to table column name mapping
        $arr = ['id','name','description','image','status'];
        $sortBy = $arr[$col];
        //Get the records after applying the datatable filters
        $ClassVideo = Classvideo::select('id','name','description','url', 'image','status');

        if (!empty($sSearch)) {
            $ClassVideo = $ClassVideo->Where('name', 'like', '%' . $sSearch . '%');
        }

        $iTotal = $ClassVideo->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );
        
        $sql = $ClassVideo->orderBy($sortBy, $sortType)->limit($length)->offset($start);
        $ClassVideo = $sql->get();
        
        $k = 0;
        if (count($ClassVideo) > 0) {
            foreach ($ClassVideo as $inst) {
                $status = $inst->status == 'active' ? 'Active' : 'Inactive';
                $img = $inst->image ? url('public/admin/upload/classvideo').'/' . $inst->image : '/public/admin/upload/not-available.jpg';
                $image = "<img src='" . $img . "' height='50' width='100'>";
                
                $action = '<a href="addClassVideo/' . $inst->id . '" '
                . 'class="delete hidden-xs hidden-sm" title="Edit">'
                . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                . ' <a href="deleteClassVideo/' . $inst->id . '"'
                . ' class="delete hidden-xs hidden-sm" title="Delete"'
                . 'onclick=\'return confirm("Are you sure you want to delete this Paper?")\'>'
                . '<i class="fa fa-trash text-danger"></i></a>';
                $response['aaData'][$k] = [$inst->id,$inst->name,$image,$inst->description,$inst->url, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }


    //Add/Update Question BY POST REQUEST
    public function saveClassVideo(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $PaperDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $PaperDetails = Classvideo::where(['id' => $id])->first();
                }
//                echo $id;
//                prd($PaperDetails);
                return view('admin.addClassVideo', ['PaperDetails' => $PaperDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {
                
//                 prd($request->all());

                $postData = $request->all();
                $paperId = ($request->input('savebtn') == 'Update') ? ($request->input('paperId')) : '';
                $ClassVideo = ($request->input('savebtn') == 'Add') ? new Classvideo() : Classvideo::where(['id' => $paperId])->first();

                $ClassVideo->name = !empty($postData['name']) ? $postData['name'] : $ClassVideo->name;
                $ClassVideo->description = !empty($postData['description']) ? $postData['description'] : $ClassVideo->description;
                $ClassVideo->url = !empty($postData['url']) ? $postData['url'] : $ClassVideo->url;
                $ClassVideo->status = !empty($postData['status']) ? $postData['status'] : $ClassVideo->status;
                /* Upload Paper Cover Image */
                if (isset($postData['image'])) {
                    if ($file = $postData['image']) {
                        $file = $postData['image'];
                        $ClassVideo->image = upload_admin_images($file, 'classvideo');
                    }
                }
//                prd($ClassVideo);
                
                if (($request->input('savebtn') == 'Add')) {
                    $ClassVideo->created_at = date('Y-m-d H:i:s');
                    $ClassVideo->save();
                    set_flash_message('Paper Added Successfully.', 'alert-success');
                } else {
                    if(Question::where(['paper_id' => $paperId])->first()){
                        $live = $postData['status'] == 0 ? 'no':'yes';
                        DB::table('questions')
                            ->where(['paper_id' => $paperId])
                            ->update(['live' => 'no']);
                    }
                    $ClassVideo->updated_at = date('Y-m-d H:i:s');
                    $ClassVideo->update();
                    set_flash_message('Paper Added Successfully.', 'alert-success');
                }
                return redirect('/admin/classVideo');
            }
        }
        return redirect('/');
    }

    public function deleteClassVideo($id) {
        try {
            $ClassVideo = Classvideo::findOrFail($id);
            $ClassVideo->delete();

            set_flash_message('Paper deleted successfully.', 'alert-success');
            return redirect('/admin/practicePaper');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
