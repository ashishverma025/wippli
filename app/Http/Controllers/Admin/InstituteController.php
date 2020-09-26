<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Auth;
use DB;
use App\User;
use App\Institute;

class InstituteController extends Controller {

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index($type = null) {
        return view('admin.institute_list', ['type' => $type]);
    }

    //Fetch Institute List Datables Ajax Request
    public function fetchInstitute(Request $request) {
        $userId = getUser_Detail_ByParam('id');
        $input = $request->all();
//        pr($input);
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'institute_name', 'phone', 'mobile', 'address', 'city', 'status'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $institute = Institute::where('status', 'Active');

        if (!empty($sSearch)) {
            $institute = $institute->Where('institute_name', 'like', '%' . $sSearch . '%');
        }
        $iTotal = $institute;
        $institute = $institute->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();

        $iTotal = $iTotal->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );


        $k = 0;
        if (count($institute) > 0) {
            foreach ($institute as $inst) {
//                $institute = $inst->class_day ? implode(',', $inst->class_day) : "";
//                pr($inst->class_day);

                $img = !empty($inst->institute_logo) ? "public/admin/upload/institute/$inst->institute_logo" : "public/sites/images/dummy.jpg";
                $src = '<img src="' . url($img) . '"  height="50" width="50"> ';
                $action = '<a href="addInstitute/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteInstitute/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';
                $response['aaData'][$k] = [$k + 1, $src, $inst->institute_name, $inst->phone, $inst->mobile, $inst->city, $inst->address, $inst->status, $action];



                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update Institute BY POST REQUEST
    public function saveInstitute(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $InstituteDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $InstituteDetails = Institute::where(['id' => $id])->first();
                }

                return view('admin.addInstitute', ['InstituteDetails' => $InstituteDetails, 'button' => $button]);
            }
            if ($request->isMethod('post')) {
                $postData = $request->all();
                if ($request->input('savebtn') == 'Add') { // New record, save it
                    $institute = new Institute();
                    $institute->institute_name = @$request->input('institute_name');
                    $institute->phone = @$request->input('phone');
                    $institute->mobile = @$request->input('mobile');
                    $institute->address = @$request->input('address');
                    $institute->city = @$request->input('city');
                    $institute->status = @$request->input('status');
                    $institute->created_at = date('Y-m-d H:i:s');

//                  prd($postData);
                    if ($file = $request->hasFile('institute_logo')) {
                        $file = $request->file('institute_logo');
                        $institute->institute_logo = upload_admin_images($file, 'institute');
                    }
                    set_flash_message('Institute Added Successfully.', 'alert-success');
                    $institute->save();
                } else {
                    $institute = Institute::where(['status' => 'Active'])->first();
                    $institute->institute_name = @$request->input('institute_name');
                    $institute->phone = @$request->input('phone');
                    $institute->mobile = @$request->input('mobile');
                    $institute->address = @$request->input('address');
                    $institute->city = @$request->input('city');
                    $institute->status = @$request->input('status');
//                  prd($postData);
                    if ($file = $request->hasFile('institute_logo')) {
                        $file = $request->file('institute_logo');
                        $institute->institute_logo = upload_admin_images($file, 'institute');
                    }
                    $institute->updated_at = date('Y-m-d H:i:s');

                    $institute->update();
                    set_flash_message('Institute Updated successfully', 'alert-success');
                }
                return redirect('/admin/institute');
            }
        }
        return redirect('/');
    }

    public function deleteInstitute($id) {
        try {
            $Institute = Institute::findOrFail($id);
            $destinationPath = public_path('/admin/upload/institute');

            if (file_exists($destinationPath . '/' . $Institute->institute_logo)) {
                @unlink($destinationPath . '/' . $Institute->institute_logo);
            }
            $Institute->delete();
            set_flash_message('Institute deleted successfully.', 'alert-success');
            return redirect('/admin/institute');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
