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
use App\Subscription;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller {

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
        return view('admin.Subscription_list', ['type' => $type]);
    }

    //Fetch subscription List Datables Ajax Request
    public function fetchSubscription(Request $request) {
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
        $arr = ['id', 'plan_name', 'subscription_fee', 'duration', 'discount', 'description', 'recommended', 'status'];
        $sortBy = $arr[$col];
        //Get the records after applying the datatable filters
        $subscription = Subscription::select('id', 'plan_name', 'subscription_fee', 'duration', 'discount', 'description', 'recommended', 'status');
        if (!empty($paperType)) {
            $subscription = $subscription->Where('plan_name', $paperType);
        }
        if (!empty($sSearch)) {
            $subscription = $subscription->Where('recommended', 'like', '%' . $sSearch . '%');
        }

        $iTotal = $subscription->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $sql = $subscription->orderBy($sortBy, $sortType)->limit($length)->offset($start);
        $subscription = $sql->get();

        // echo count($subscription);
        // prd($response);

        $k = 0;
        if (count($subscription) > 0) {
            foreach ($subscription as $inst) {
                $status = $inst->status == 'active' ? 'Active' : 'Inactive';

                $action = '<a href="addSubscription/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteSubscription/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this subscription?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';

                $response['aaData'][$k] = [$k + 1, $inst->plan_name, $inst->subscription_fee, $inst->duration, $inst->discount, $inst->description,$inst->recommended, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update subscription BY POST REQUEST
    public function saveSubscription(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $SubscriptionDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $SubscriptionDetails = Subscription::where(['id' => $id])->first();
                }
                return view('admin.addSubscription', ['SubscriptionDetails' => $SubscriptionDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {

                $postData = $request->all();
                $SubscriptionId = ($request->input('savebtn') == 'Update') ? ($request->input('SubscriptionId')) : '';
                $Subscription = ($request->input('savebtn') == 'Add') ? new Subscription() : Subscription::where(['id' => $SubscriptionId])->first();

                $Subscription->plan_name = !empty($postData['plan_name']) ? $postData['plan_name'] : $Subscription->plan_name;
                $Subscription->recommended = !empty($postData['recommended']) ? $postData['recommended'] : $Subscription->recommended;
                $Subscription->description = !empty($postData['description']) ? $postData['description'] : $Subscription->description;
                $Subscription->subscription_fee = (!empty($postData['subscription_fee']) || $postData['subscription_fee'] == 0)  ? $postData['subscription_fee'] : $Subscription->subscription_fee;
                $Subscription->duration = (!empty($postData['duration'] || $postData['discount'] == 0)) ? $postData['duration'] : $Subscription->duration;
//                $Subscription->discount = (!empty($postData['discount'] || $postData['discount'] == 0)) ? $postData['discount'] : $Subscription->discount;
                $Subscription->discount = 0;
                $Subscription->status = !empty($postData['status']) ? $postData['status'] : $Subscription->status;

                // prd($Subscription);

                if (($request->input('savebtn') == 'Add')) {
                    $Subscription->created_at = date('Y-m-d H:i:s');
                    $Subscription->save();
                    set_flash_message('Subscription Added Successfully.', 'alert-success');
                } else {
                    $Subscription->updated_at = date('Y-m-d H:i:s');
                    $Subscription->update();
                    set_flash_message('Subscription Added Successfully.', 'alert-success');
                }
                return redirect('/admin/subscription');
            }
        }
        return redirect('/');
    }

    public function deleteSubscription($id) {
        try {
            $Subscription = Subscription::findOrFail($id);
            $Subscription->delete();

            set_flash_message('Student Data deleted successfully.', 'alert-success');
            return redirect('/admin/subscription');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
