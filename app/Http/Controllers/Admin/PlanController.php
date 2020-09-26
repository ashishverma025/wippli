<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Auth;
use DB;
use App\User;
use App\Plan;
use App\Syllabuslist;

class PlanController extends Controller {

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index($type = null) {
        return view('admin.plan_list', ['type' => $type]);
    }

    //Fetch Plan List Datables Ajax Request
    public function fetchPlan(Request $request) {
        $input = $request->all();
//        pr($input);
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'name', 'price', 'status'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $plan = Plan::where('status', 'Enable');

        if (!empty($sSearch)) {
            $plan = $plan->Where('name', 'like', '%' . $sSearch . '%');
        }
        $iTotal = $plan;
        $plan = $plan->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();

        $iTotal = $iTotal->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $k = 0;
        if (count($plan) > 0) {
            foreach ($plan as $inst) {
                $status = $inst->status;
                $description = "<table style='background-coler:white'>"
                        . "<tr><th>Engagements</th><td>$inst->engagements</td></tr>"
                        . "<tr><th>Private Students</th><td>$inst->private_students</td></tr>"
                        . "<tr><th>Group Classes</th><td>$inst->group_classes</td></tr>"
                        . "<tr><th>e-Resources</th><td>$inst->e_resources</td></tr>"
                        . "</table>";

                $action = '<a href="addPlan/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deletePlan/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';
                $response['aaData'][$k] = [$k + 1, $inst->name, '$' . $inst->price . '/' . $inst->price_per, $inst->discount, $inst->description . $description, $inst->recommended, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update Plan BY POST REQUEST
    public function savePlan(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $PlanDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $PlanDetails = Plan::where(['id' => $id])->first();
                }
//                pr($PlanDetails);
                return view('admin.addPlan', ['PlanDetails' => $PlanDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {
                $postData = $request->all();
                $planId = ($request->input('savebtn') == 'Update') ? ($request->input('planId')) : '';
                $plan = ($request->input('savebtn') == 'Add') ? new Plan() : Plan::where(['id' => $planId])->first();

                $plan->name = !empty($request->input('name')) ? $request->input('name') : $plan->name;
                $plan->price = !empty($request->input('price')) ? $request->input('price') : $plan->price;
                $plan->price_per = !empty($request->input('price_per')) ? $request->input('price_per') : $plan->price_per;
                $plan->discount = !empty($request->input('discount')) ? $request->input('discount') : $plan->discount;
                $plan->description = !empty($request->input('description')) ? $request->input('description') : $plan->description;
                $plan->engagements = !empty($request->input('engagements')) ? $request->input('engagements') : $plan->engagements;
                $plan->group_classes = !empty($request->input('group_class')) ? $request->input('group_class') : $plan->group_class;
                $plan->private_students = !empty($request->input('private_students')) ? $request->input('private_students') : $plan->private_students;
                $plan->e_resources = !empty($request->input('e_resources')) ? $request->input('e_resources') : $plan->e_resources;
                $plan->resources_in = !empty($request->input('resources_in')) ? $request->input('resources_in') : $plan->resources_in;
                $plan->payment = !empty($request->input('payment')) ? $request->input('payment') : $plan->payment;
                $plan->payment_per = !empty($request->input('payment_per')) ? $request->input('payment_per') : $plan->payment_per;
                $plan->recommended = !empty($request->input('recommended')) ? $request->input('recommended') : $plan->recommended;
                $plan->status = !empty($request->input('status')) ? $request->input('status') : $plan->status;
//                prd($postData);
                if (($request->input('savebtn') == 'Add')) {
                    $plan->created_at = date('Y-m-d H:i:s');
                    $plan->save();
                    set_flash_message('Plan Added Successfully.', 'alert-success');
                } else {
                    $plan->updated_at = date('Y-m-d H:i:s');
                    $plan->update();
                    set_flash_message('Plan Updated successfully', 'alert-success');
                }
                return redirect('/admin/plan');
            }
        }
        return redirect('/');
    }

    public function deletePlan($id) {
        try {
            $Plan = Plan::findOrFail($id);
            $Plan->delete();
            set_flash_message('Plan deleted successfully.', 'alert-success');
            return redirect('/admin/plan');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
