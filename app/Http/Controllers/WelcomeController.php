<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\NewWippli;
use App\Role;
use App\UserAllocate;
use App\Category;
use App\ContactDetail;
use App\BusinessDetail;
use App\WippliComment;
use App\WippliComplete;
use App\WippliIncident;

class WelcomeController extends Controller {

    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing_index() {
        if (Auth::check()) {
            return redirect('user-dashboard');
        }
        return view('nwsites.index');
    }

    public function Register() {
        if (Auth::check()) {
            return redirect('user-dashboard');
        }
        return view('nwsites.register');
    }

    public function userDashboard() {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $userId = $userDetails['id'];

            $data = DB::table('users')->select(DB::raw("group_concat(users.id) as childsId"))
            ->groupBy('parent_id')->where('parent_id',$userId)->get()->first();
            // prd($data->childsId);

            $childList = explode(',',@$data->childsId);
            $NewWippli = DB::table('new_wipplis as nw')->select('u.name', 'u.id as userId', 'nw.*')
                    ->leftJoin('users as u', 'u.id', 'nw.user_id')
                    ->where('nw.user_id', $userId)
                    ->orwhereIn('nw.user_id', $childList)
                    ->orderBy('nw.id', 'DESC')
                    ->get();
            foreach ($NewWippli as $key => $value) {
                $NewWippli[$key]->updated_at = \Carbon\Carbon::parse($value->created_at)->format('h:i A');
            }

            $userAllocate = DB::table('user_allocates as ua')
                    ->select('u.name', 'u.id as userId', 'nw.id as id', 'nw.user_id as parent_id', 'nw.project_name', 'nw.attachment', 'nw.created_at')
                    ->leftJoin('new_wipplis as nw', 'nw.id', 'ua.wippli_id')
                    ->leftJoin('users as u', 'u.id', 'nw.user_id')
                    ->where('ua.status','Active')
                    ->orwhereIn('ua.user_id', $childList)
                    ->where('ua.user_id', $userId)
                    ->orderBy('ua.id', 'DESC')
                    ->get();


            $wippliCompleted = DB::table('wippli_completes as wc')
                    ->select('u.name', 'u.id as userId', 'nw.id as id', 'nw.user_id as parent_id', 'nw.project_name', 'nw.attachment', 'wc.created_at')
                    ->leftJoin('new_wipplis as nw', 'nw.id', 'wc.wippli_id')
                    ->leftJoin('users as u', 'u.id', 'nw.user_id')
                    ->orderBy('wc.id', 'DESC')
                    ->where('wc.status','Active')
                    ->where('wc.user_id', $userId)
                    ->orwhereIn('wc.user_id', $childList)
                    ->get();
            // prd($wippliCompleted);
            $count = getWippliStatus();
            return view('nwsites.dashboard', ['wippliCompleted'=>$wippliCompleted,'userDetails' => $userDetails, 'NewWippli' => $NewWippli, 'userAllocate' => $userAllocate,'recordCount'=>$count]);
        }
        return redirect("/login");
    }

    public function folderView(Request $request, $wippli_id) {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $userId = $userDetails['id'];
            $postData = $request->post();
            $NewWippli = DB::table('new_wipplis as nw')->select('bd.business_name', 'cd.first_name', 'cd.surname', 'cd.initials', 'nw.category as jobtype', 'nw.type as joboutcome', 'nw.id as AJN', 'u.name as CN')
                            ->leftJoin('users as u', 'u.id', 'nw.user_id')
                            ->leftJoin('contact_details as cd', 'u.id', 'cd.user_id')
                            ->leftJoin('business_details as bd', 'cd.organisation', 'bd.id')
                            ->where('nw.id', $wippli_id)->orderBy('nw.id', 'DESC')
                            ->get()->toArray();

            if (isset($NewWippli[0]->business_name)) {
                $NewWippli = @$NewWippli[0];
                $CN = initials(@$NewWippli->CN);
                $FnLn = @$NewWippli->first_name . ' ' . @$NewWippli->surname;
                $jobName = getCategory(@$NewWippli->jobtype);
                $jobOutcome = @$NewWippli->joboutcome;
                $businessInitials = @$NewWippli->initials;
                $dateFormat = date('Ymd');
                $autoJobNumber = 'AJN' . @$NewWippli->AJN;
                $BSN = 'BSN_';

                $folderStruct = [
                    'Admin' => 'Admin',
                    'Misc' => 'Misc',
                    'BRAND AND ASSETS' => 'ND AND ASSETS',
                    "$FnLn" => ["$CN" => 'Type'],
                    "$CN-$jobName" => ["$CN-$jobOutcome" => [
                            "BSN_" . $jobName . "_" . $jobOutcome . "_" . $dateFormat . "_" . $businessInitials . "_" . $CN . "_" . $autoJobNumber . "_Pv1" =>
                            [
                                "MASTER_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "PROOFS_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "FINAL_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "ASSETS_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "PACKAGE_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "OTHERS_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "BRIEF&Specs_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "REFERENCE_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "OLD_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                                "ATTACHMENTS_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                            ]
                        ]
                ]];

                $folderSrruct[$NewWippli->business_name] = $folderStruct;

                return view('sites.generateFolderView', ['userDetails' => $userDetails, 'folderSrruct' => $folderSrruct]);
            }
            return 'Not Found!';
        }
        return redirect("/login");
    }

    public function branniumClientsContacts() {
        if (Auth::check()) {
            $userDetails = getUserDetails();


            $businessDetails = DB::table('business_details as bd')->select('u.name as user_name', 'u.id as userId', 'bd.*')
                    ->leftJoin('users as u', 'u.id', 'bd.user_id')
                    ->where('business_name', 'like', '%Brannium%')->orderBy('bd.id', 'DESC')
                    ->get();

            $boomiDetails = DB::table('business_details as bd')->select('u.name as user_name', 'u.id as userId', 'u.user_type', 'bd.*')
                    ->leftJoin('users as u', 'u.id', 'bd.user_id')
                    ->where('business_name', 'not like', '%Brannium%')->orderBy('bd.id', 'DESC')
                    ->get();

            $ContactDetails = DB::table('contact_details as cd')->select('u.name as user_name', 'u.company','u.id as userId', 'u.user_type', 'cd.*')
                    ->leftJoin('users as u', 'u.id', 'cd.parent_id')
                    ->where('cd.parent_id', $userDetails->id)
                    ->orderBy('cd.id', 'DESC')
                    ->get();


            $ClientDetails = DB::table('business_details as bd')->select('bd.*')
                    ->where('business_name', 'not like', '%Brannium%')
                    ->groupBy('bd.business_name')
                    ->orderBy('bd.id', 'DESC')
                    ->get();

            $Roles = Role::where('status', 'Active')->where('id', '!=', 1)->get()->toArray();

            return view('nwsites.brannium-clients-contacts', [
                'userDetails' => $userDetails,
                'businessDetails' => $businessDetails,
                'ContactDetails' => $ContactDetails,
                'ClientDetails' => $ClientDetails,
                'Roles' => $Roles,
                'boomiDetails' => $boomiDetails
            ]);
        }
        return redirect("/login");
    }

    public function businessDetails() {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $NewWippli = DB::table('new_wipplis as nw')->select('u.name', 'u.id as userId', 'nw.*')
                    ->leftJoin('users as u', 'u.id', 'nw.user_id')->orderBy('nw.id', 'DESC')
                    ->get();
            $businessList = DB::table('business_details')->select(['id', 'business_name'])
                            ->where('user_id', $userDetails->id)->orderBy('id', 'DESC')
                            ->get()->toArray();
            $Roles = Role::where(['status' => 'Active'])->where('id', '!=', 1)->get()->toArray();
            return view('nwsites.business-details', [
                'userDetails' => $userDetails,
                'NewWippli' => $NewWippli,
                'businessList' => $businessList,
                'Roles' => $Roles
            ]);
        }
        return redirect("/login");
    }
    public function contactDetails() {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $NewWippli = DB::table('new_wipplis as nw')->select('u.name', 'u.id as userId', 'nw.*')
                    ->leftJoin('users as u', 'u.id', 'nw.user_id')->orderBy('nw.id', 'DESC')
                    ->get();
            $businessList = DB::table('business_details')->select(['id', 'business_name'])
                            ->where('user_id', $userDetails->id)->orderBy('id', 'DESC')
                            ->get()->toArray();
            $Roles = Role::where(['status' => 'Active'])->where('id', '!=', 1)->get()->toArray();
            return view('nwsites.contact-details', [
                'userDetails' => $userDetails,
                'NewWippli' => $NewWippli,
                'businessList' => $businessList,
                'Roles' => $Roles
            ]);
        }
        return redirect("/login");
    }

    public function newWippli(Request $request) {
        $response = [];
        $postData = $request->post();
        $userDetails = getUserDetails();
        $userId = $userDetails['id'];

        $categories = Category::where('status', 'active')->get();
        $ContactDetail = ContactDetail::where('user_id', $userId)->first();
        $parent_id = @$ContactDetail->parent_id ? @$ContactDetail->parent_id : "";

        $businessList = BusinessDetail::where(['user_id' => $userId, 'status' => 'active']);
        if (!empty($parent_id)) {
            $businessList = $businessList->orWhere('user_id', $parent_id);
        }
        $businessList = $businessList->groupBy('id')->get();

        return view('nwsites.newWiplli', [
            'categories' => $categories ? $categories : "",
            'userDetails' => $userDetails ? $userDetails : "",
        ]);
    }

    public function wippliDetails(Request $request, $wippli_id = null) {
        $response = [];
        $postData = $request->post();
        if (!Auth::check()) {
            return redirect('/');
        }
        $userDetails = getUserDetails();

        if (empty($wippli_id) && (Auth::check())) {
            return redirect('user-dashboard');
        }
        $NewWippli = DB::table('new_wipplis as nw')->select('u.name', 'u.email', 'u.id as userId', 'nw.*', 'cd.first_name', 'cd.surname', 'cd.department')
                ->leftJoin('users as u', 'u.id', 'nw.user_id')
                ->leftJoin('contact_details as cd', 'u.id', 'cd.user_id')
                ->where('nw.id', $wippli_id)->orderBy('nw.id', 'DESC')
                ->first();

        $wippliComment = WippliComment::select('wippli_comments.*', 'u.*')->where('wippli_id', $wippli_id)
                ->leftJoin('users as u', 'u.id', 'wippli_comments.user_id')
                ->get();

        $allBusinessUsers = [];


        $userAllocate = UserAllocate::where('wippli_id',$wippli_id)->first();
        $wippliComplete = WippliComplete::where('wippli_id',$wippli_id)->first();
        // if($userDetails->user_type == 2){
        $allBusinessUsers = DB::table('new_wipplis as nw')->select('u.name', 'u.email', 'u.id as userId')
                ->leftJoin('contact_details as cd', 'cd.parent_id', 'nw.user_id')
                ->leftJoin('users as u', 'u.id', 'cd.user_id')
                ->where('nw.user_id', $userDetails->id)->orderBy('u.id', 'DESC')->groupBy('u.id')
                ->get();
        // }
        if (!empty($NewWippli->name)) {
            $name = explode(' ', $NewWippli->name);
            $n1 = isset($name[0]) ? $name[0] : '';
            $n2 = isset($name[1]) ? $name[1] : '';
        }

        
        $NewWippli->name = $n1[0] . ' ' . $n2[0];
        return view('nwsites.wipplidetail', [
            'userDetails' => $userDetails,
            'NewWippli' => $NewWippli,
            'wippliComment' => $wippliComment,
            'allBusinessUsers' => $allBusinessUsers,
            'wippliAllocate'=>$userAllocate,
            'wippliComplete'=>$wippliComplete
        ]);
    }

}
