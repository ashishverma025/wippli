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
use App\Subscriber;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller {

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
        return view('admin.subscriber_list', ['type' => $type]);
    }

    //Fetch subscription List Datables Ajax Request
    public function fetchSubscriber(Request $request) {
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
        $arr = ['id', 'user_id', 'subscription_id', 'start_date', 'end_date', 'payment_status', 'transaction_id', 'status'];
        $sortBy = $arr[$col];
        //Get the records after applying the datatable filters
        $subscription = Subscriber::select('id', 'user_id', 'subscription_id', 'start_date', 'end_date', 'payment_status', 'transaction_id', 'status');
        if (!empty($paperType)) {
            $subscription = $subscription->Where('subscription_id', $paperType);
        }
        if (!empty($sSearch)) {
            $subscription = $subscription->Where('start_date', 'like', '%' . $sSearch . '%');
        }
        if (!empty($sSearch)) {
            $subscription = $subscription->Where('end_date', 'like', '%' . $sSearch . '%');
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
                $userDetails = getUserDetailsById($inst->user_id);
                $SubscriberDetails = Subscription::where(['id' => $inst->subscription_id])->first();
//                echo $inst->subscription_id;
//                prd($SubscriberDetails);
                $action = '<a href="addSubscriber/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteSubscriber/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this subscription?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';

                $response['aaData'][$k] = [$k + 1, $userDetails->email, $SubscriberDetails->plan_name, $inst->start_date, $inst->end_date, $inst->payment_status,$inst->transaction_id, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update subscription BY POST REQUEST
    public function saveSubscriber(Request $request, $id = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                $SubscriberDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $SubscriberDetails = Subscriber::where(['id' => $id])->first();
                }
                return view('admin.addSubscriber', ['SubscriberDetails' => $SubscriberDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {

                $postData = $request->all();
                $SubscriberId = ($request->input('savebtn') == 'Update') ? ($request->input('SubscriberId')) : '';
                $Subscriber = ($request->input('savebtn') == 'Add') ? new Subscriber() : Subscriber::where(['id' => $SubscriberId])->first();

                $Subscriber->plan_name = !empty($postData['plan_name']) ? $postData['plan_name'] : $Subscriber->plan_name;
                $Subscriber->question_number = !empty($postData['question_number']) ? $postData['question_number'] : $Subscriber->question_number;
                $Subscriber->description = !empty($postData['description']) ? $postData['description'] : $Subscriber->description;
                $Subscriber->subscription_fee = !empty($postData['subscription_fee']) ? $postData['subscription_fee'] : $Subscriber->subscription_fee;
                $Subscriber->duration = !empty($postData['duration']) ? $postData['duration'] : $Subscriber->duration;
                $Subscriber->discount = !empty($postData['discount']) ? $postData['discount'] : $Subscriber->discount;
                $Subscriber->status = !empty($postData['status']) ? $postData['status'] : $Subscriber->status;

                // prd($Subscriber);

                if (($request->input('savebtn') == 'Add')) {
                    $Subscriber->created_at = date('Y-m-d H:i:s');
                    $Subscriber->save();
                    set_flash_message('Subscriber Added Successfully.', 'alert-success');
                } else {
                    $Subscriber->updated_at = date('Y-m-d H:i:s');
                    $Subscriber->update();
                    set_flash_message('Subscriber Added Successfully.', 'alert-success');
                }
                return redirect('/admin/subscriber');
            }
        }
        return redirect('/');
    }

    public function deleteSubscriber($id) {
        try {
            $Subscriber = Subscriber::findOrFail($id);
            $Subscriber->delete();

            set_flash_message('Student Data deleted successfully.', 'alert-success');
            return redirect('/admin/subscriber');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
