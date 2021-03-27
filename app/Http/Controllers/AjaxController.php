<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,
    DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Response;
use App\User;
use App\NewWippli;
use App\Type;
use App\Category;
use App\Http\Requests;
use App\Role;
use App\UserAllocate;
use App\ContactDetail;
use App\BusinessDetail;
use App\WippliComment;
use App\WippliComplete;
use File;
use ZipArchive;

class AjaxController extends Controller {

//CHECK UNIQUE EMAIL 

    public function recordUpdateForm(Request $request) {
        $response = [];
        $postData = $request->post();
        $id = $postData['id'];
        $type = $postData['type'];
        $roleId = $postData['role'];
        $Roles = Role::where(['status' => 'Active'])->where('id', '!=', 1)->get()->toArray();

        return view('sites/recordUpdatepopupForm', [
            'Roles' => $Roles ? $Roles : "",
            'roleId' => $roleId ? $roleId : "",
        ]);
    }

    public function roleChange(Request $request) {
        $response = [];
        $postData = $request->post();
        $id = $postData['id'];
        $type = $postData['type'];
        $roleId = $postData['role'];
        $userId = $postData['userId'];
        if ($type == 'Agency') {
            $ContactDetail = ContactDetail::where('user_id', $userId)->first();
            if (!empty($ContactDetail)) {
                $ContactDetail->role = $roleId;
                $ContactDetail->save();
            }
            $User = User::where('id', $userId)->first();
            $User->user_type = $roleId;
            $User->save();
        } else {
            $ContactDetail = ContactDetail::where('user_id', $userId)->first();
            if (!empty($ContactDetail)) {
                $ContactDetail->role = $roleId;
                $ContactDetail->save();
            }

            $User = User::where('id', $userId)->first();
            $User->user_type = $roleId;
            $User->save();
        }
        return 'success';
    }

    public function popUpBusinessform(Request $request) {
        $response = [];
        $postData = $request->post();
        $bId = $postData['business_id'];
        $ClientDetails = DB::table('business_details as bd')->select('bd.*')
                ->where('business_name', 'not like', '%Brannium%')
                ->where('bd.id', $bId)
                ->first();
        $businessUsersLists = DB::table('contact_details as cd')->select('u.name', 'cd.positions', 'cd.email_notification', 'r.name as Role', 'bd.business_name', 'bd.business_type', 'u.email')
                ->leftJoin('roles as r', 'r.id', 'cd.role')
                ->leftJoin('users as u', 'u.id', 'cd.user_id')
                ->leftJoin('business_details as bd', 'bd.id', 'cd.organisation')
                ->where('bd.id', $bId)
                ->get();
//        prd($businessUsersLists);

        return view('sites/branniumPopUp', [
            'cDetails' => $ClientDetails,
            'businessUsersLists' => $businessUsersLists
        ]);
    }

    public function popupForm(Request $request) {
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

        return view('nwsites/newWiplli', [
            'categories' => $categories ? $categories : "",
            'businessList' => $businessList ? $businessList : "",
        ]);
    }

    public function generateFolderStructure(Request $request) {
        $postData = $request->post();
        $wippli_id = $postData['wippli_id'];
        $NewWippli = DB::table('new_wipplis as nw')->select('bd.business_name', 'cd.first_name', 'cd.surname', 'cd.initials', 'nw.project_name', 'nw.category as jobtype', 'nw.type as joboutcome', 'nw.id as AJN', 'u.name as CN')
                        ->leftJoin('users as u', 'u.id', 'nw.user_id')
                        ->leftJoin('contact_details as cd', 'u.id', 'cd.user_id')
                        ->leftJoin('business_details as bd', 'cd.organisation', 'bd.id')
                        ->where('nw.id', $wippli_id)->orderBy('nw.id', 'DESC')
                        ->get()->toArray();

        $NewWippli = $NewWippli[0];
        $CN = initials($NewWippli->CN);
        $FnLn = $NewWippli->first_name . '-' . $NewWippli->surname;
        $jobName = $NewWippli->project_name;

        $jobOutcome = $NewWippli->joboutcome;
        $businessInitials = $NewWippli->initials;
        $dateFormat = date('Ymd');
        $autoJobNumber = 'AJN' . $NewWippli->AJN;
        $BSN = 'BSN_';

        $folderStruct = [
            'Admin' => 'Admin',
            'Misc' => 'Misc',
            'BRAND AND ASSETS' => 'ND AND ASSETS',
            "$FnLn" => ["$CN" => 'Type'],
            "$CN-$jobName" => ["$CN-$jobOutcome" => [
                    "BSN_" . $jobName . "_" . $jobOutcome . "_" . $dateFormat . "_" . $businessInitials . "_" . $CN . "_" . $autoJobNumber . "_Pv1" =>
                    [
                        "1_MASTER_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                        "2_PROOFS_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                        "3_FINAL_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                        "4_ASSETS_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                        "5_PACKAGE_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                        "6_OTHERS_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                        "7_BRIEF&Specs_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                        "8_REFERENCE_" . $jobName . "_" . $jobOutcome . "_$dateFormat",
                        "9_OLD_" . $jobName . "_" . $jobOutcome . "_$dateFormat" . "_9",
                        "10_ATTACHMENTS_" . $jobName . "_" . $jobOutcome . "_$dateFormat"
                    ]
                ]
        ]];
        // prd($folderStruct);

        $folderSrruct[$NewWippli->business_name] = $folderStruct;
        $gfolderStatus = generatePlanFolder($NewWippli, $folderSrruct);
        if ($gfolderStatus == 'success') {
            $folderToZip = $NewWippli->business_name;
            $zipFileName = $NewWippli->business_name . '_' . $FnLn;

            // prd($gfolderStatus);

            $this->createZipFiles($folderToZip, $zipFileName);
            // return view('sites.generateFolderView',['NewWippli'=>$folderSrruct]);
        }
        echo $gfolderStatus;
    }

    public function createZipFiles($folderToZip, $zipFileName) {
        $public_dir = public_path();
        $pathInfo = ['dirname' => $public_dir . '/ZipFiles/', 'basename' => $zipFileName];
        $parentPath = $pathInfo['dirname'];
        $dirName = $pathInfo['basename'];
        $outZipPath = $public_dir . '/ZipFiles/' . $zipFileName . '.zip';
        $sourcePath = $public_dir . '/BContacts/' . $folderToZip;

        $z = new ZipArchive;
        $z->open($outZipPath, ZIPARCHIVE::CREATE);
        $z->addEmptyDir($dirName);
        self::folderToZip($sourcePath, $z, strlen("$parentPath/"));
        $z->close();
    }

    private static function folderToZip($folder, &$zipFile, $exclusiveLength) {
        $handle = opendir($folder);
        while (false !== $f = readdir($handle)) {
            if ($f != '.' && $f != '..') {
                $filePath = "$folder/$f";
                // Remove prefix from file path before add to zip.
                $localPath = substr($filePath, $exclusiveLength);
                if (is_file($filePath)) {
                    $zipFile->addFile($filePath, $localPath);
                } elseif (is_dir($filePath)) {
                    // Add sub-directory.
                    $zipFile->addEmptyDir($localPath);
                    self::folderToZip($filePath, $zipFile, $exclusiveLength);
                }
            }
        }
        closedir($handle);
    }

    public function getTypesByCategory(Request $request) {
        $response = [];
        $postData = $request->post();
        $category_id = $postData['category'];
        $types = Type::where('status', 'active')->where('cat_id', $category_id)->get();
        $str = "";
        $str .= "<select class='form-control' name='type' id='type'>";
        if (!empty($types)) {
            foreach ($types as $key => $val) {
                $str .= "<option class='' value='" . $val->name . "'>$val->name</option>";
            }
        }
        $str .= "</select>";

        return $str;
    }

    public function newWippliSave(Request $request) {
        $response = [];
        if (!empty($request->post())) {
            $userDetails = getUserDetails();
            $wippliDetails = $request->post();
            $this->validate($request, [
                    //'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id . ',id',
            ]);
            $imgFolder = 'wippli';
            $wippliDetails['wippli_id'] = "";
            $wippli_id = !empty($wippliDetails['wippli_id']) ? $wippliDetails['wippli_id'] : '';
            $NewWippli = empty($wippliDetails['wippli_id']) ? new NewWippli() : NewWippli::where(['id' => $wippli_id])->first();
            $NewWippli->project_name = !empty($wippliDetails['project_name']) ? $wippliDetails['project_name'] : $NewWippli->project_name;
            $NewWippli->deadline = @$wippliDetails['deadline'] ? $wippliDetails['deadline'] : $NewWippli->deadline;
            $NewWippli->type = @$wippliDetails['type'] ? $wippliDetails['type'] : $NewWippli->type;
            $NewWippli->category = @$wippliDetails['category'] ? $wippliDetails['category'] : $NewWippli->category;
            $NewWippli->instruction = @$wippliDetails['instruction'] ? ($wippliDetails['instruction']) : $NewWippli->instruction;
            $NewWippli->digital = @$wippliDetails['digital'] ? $wippliDetails['digital'] : $NewWippli->digital;
            $NewWippli->print = @$wippliDetails['print'] ? $wippliDetails['print'] : $NewWippli->print;
            $NewWippli->video = @$wippliDetails['video'] ? $wippliDetails['video'] : $NewWippli->video;
            $NewWippli->other = @$wippliDetails['other'] ? $wippliDetails['other'] : $NewWippli->other;
            $NewWippli->objective = @$wippliDetails['objective'] ? $wippliDetails['objective'] : $NewWippli->objective;
            $NewWippli->dimensions = @$wippliDetails['dimensions'] ? $wippliDetails['dimensions'] : $NewWippli->dimensions;
            $NewWippli->width = @$wippliDetails['width'] ? $wippliDetails['width'] : $NewWippli->width;
            $NewWippli->height = @$wippliDetails['height'] ? $wippliDetails['height'] : $NewWippli->height;
            $NewWippli->units = @$wippliDetails['units'] ? $wippliDetails['units'] : $NewWippli->units;
            $NewWippli->portrait = @$wippliDetails['portrait'] ? $wippliDetails['portrait'] : $NewWippli->portrait;
            $NewWippli->landscape = @$wippliDetails['landscape'] ? $wippliDetails['landscape'] : $NewWippli->landscape;
            $NewWippli->comment = @$wippliDetails['comment'] ? $wippliDetails['comment'] : $NewWippli->comment;
            $NewWippli->target_audience = @$wippliDetails['target_audience'] ? $wippliDetails['target_audience'] : $NewWippli->target_audience;
            $NewWippli->tone_of_voice = @$wippliDetails['tone_of_voice'] ? $wippliDetails['tone_of_voice	'] : $NewWippli->tone_of_voice;

            $NewWippli->user_id = $userDetails['id'];
            $NewWippli->company = '';



            if ($file = $request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $NewWippli->attachment = upload_site_images($userDetails['id'], $file, 'wippli-image');
            }
            if ($file = $request->hasFile('type_file')) {
                $file = $request->file('type_file');
                $NewWippli->file = upload_site_images($userDetails['id'], $file, 'wippli-image');
            }
            if (empty($wippliDetails['wippli_id'])) {
                $NewWippli->created_at = date('Y-m-d H:i:s');
                $NewWippli->save();
                $response['status'] = "success";
                $response['msg'] = "Wippli added successfully alert-success";
            } else {
                $NewWippli->updated_at = date('Y-m-d H:i:s');
                $NewWippli->update();
                $response['status'] = "success";
                $response['msg'] = "Wippli updated successfully alert-success";
            }

            return redirect( '/user-dashboard' );
        }
        // return response()->json($response);
    }

    public function wippliPreview(Request $request) {
        $response = [];
        $postData = $request->post();
        $wippli_id = $postData['wippli_id'];
        $bId = $postData['bId'];
        $NewWippli = DB::table('new_wipplis as nw')->select('u.name', 'u.email', 'u.id as userId', 'nw.*', 'bd.id as bId', 'bd.business_name', 'bd.business_branch', 'cd.first_name', 'cd.surname', 'cd.department')
                ->leftJoin('users as u', 'u.id', 'nw.user_id')
                ->leftJoin('contact_details as cd', 'u.id', 'cd.user_id')
                ->leftJoin('business_details as bd', 'nw.business_id', 'bd.id')
                ->where('nw.id', $wippli_id)->orderBy('nw.id', 'DESC')
                ->first();

        $bId = $postData['bId'];
        $wippliComment = WippliComment::where('wippli_id', $wippli_id)->get();
        $allBusinessUsers = DB::table('new_wipplis as nw')->select('u.name', 'u.email', 'u.id as userId', 'nw.business_id as bId')
                ->leftJoin('contact_details as cd', 'cd.organisation', 'nw.business_id')
                ->leftJoin('users as u', 'u.id', 'cd.user_id')
                ->where('cd.organisation', $bId)->orderBy('u.id', 'DESC')->groupBy('u.id')
                ->get();
        if (!empty($NewWippli->name)) {
            $name = explode(' ', $NewWippli->name);
            $n1 = isset($name[0]) ? $name[0] : '';
            $n2 = isset($name[1]) ? $name[1] : '';
        }
        $NewWippli->name = $n1[0] . ' ' . $n2[0];

        $userDetails = getUserDetails();
        return view('sites.wippliFormPreview', [
            'userDetails' => $userDetails,
            'NewWippli' => $NewWippli,
            'wippliComment' => $wippliComment,
            'allBusinessUsers' => $allBusinessUsers
        ]);
    }

    public function getBusinessById(Request $request) {
        $postData = $request->post();
        $businessId = $postData['organisationId'];
        $businessData = DB::table('business_details as bd')->select('bd.*')
                ->where('bd.id', $businessId)
                ->first();
        return response()->json($businessData);
    }

//CHECK UNIQUE EMAIL

    public function isEmailExist(Request $request) {
        $response = [];
        $postData = $request->post();
        $email_id = $postData['email'];
        return is_email_exist($email_id);
    }

    public function allocateUser(Request $request) {
        $postData = $request->post();
        $userDetails = getUserDetails();

        $parentId = $userDetails->id;
        $wippli_id = $postData['wippli_id'];
        $toUser = $postData['toUser'];
       
        $UserAllocate = new UserAllocate();
        $UserAllocate->wippli_id = $wippli_id;
        $UserAllocate->user_id = $toUser;
        $UserAllocate->parent_id = $parentId;
        $UserAllocate->email_address = $postData['email_address'];
        $UserAllocate->created_at = date('Y-m-d H:i:s');

        if ($UserAllocate->save()) {
            $NewWippli = NewWippli::where('id', $wippli_id)->first();
            if (!empty($NewWippli)) {
                $NewWippli->status = 'Inactive';
                $NewWippli->save();

                $mailDetails = mailTaskDetails($wippli_id,$toUser);
                $data = [];
                $data['username'] = $mailDetails['employee_name'];
                $data['wippli_name'] = $mailDetails['wippli_name'];
                $data['url'] = url('/wippliDetails/').'/'.$wippli_id ;
                $data['msg'] = $mailDetails['manager_name']." have assigned a new task " .$mailDetails['wippli_name'] .' to '.$mailDetails['employee_name'].'.';
                $data['message'] =' You have allocated a new task';
                $emails = [$mailDetails['employee_email'],$mailDetails['manager_email']];
                sendMail($data, 'TASC ', $emails, 'Tasc Allocated ', "event@tasc.com", 'registrationMail');         

            }
            return 'success';
        }
    }

    public function wippliComplete(Request $request) {
        $postData = $request->all();
        $userDetails = getUserDetails();

        $user_id = $userDetails->id;
        $wippli_id = $postData['wippli_id'];

        $wippliComplete = new WippliComplete();
        $wippliComplete->wippli_id = $wippli_id;
        $wippliComplete->status = 'Active';
        $wippliComplete->user_id = $user_id;

        $wippliComplete->created_at = date('Y-m-d H:i:s');
        if ($wippliComplete->save()) {
            $userAllocate = UserAllocate::where('wippli_id', $wippli_id)->first();
            if (!empty($userAllocate)) {
                $userAllocate->status = 'Inactive';
                $userAllocate->save();

                $mailDetails = mailTaskDetails($wippli_id,$user_id);
                $data = [];
                $data['username'] = $mailDetails['employee_name'];
                $data['wippli_name'] = $mailDetails['wippli_name'];
                $data['url'] = url('/wippliDetails/').'/'.$wippli_id ;
                $data['assigned_by'] = $userDetails->name;
                $data['manager_email'] = $mailDetails['manager_email'];
                $data['msg'] = $mailDetails['employee_name']." Completed Task  " .$mailDetails['wippli_name'];
                $data['message'] ='Congratulation! you have completed your task';
                $emails = [$mailDetails['employee_email'],$mailDetails['manager_email']];
                // prd($data);
                sendMail($data, 'TASC ', $emails, 'Tasc Completed ', "event@tasc.com", 'registrationMail'); 
        
            }
            return 'success';
        }
    }


    public function wippliComment(Request $request) {
        $postData = $request->post();
        $userDetails = getUserDetails();
        $user_id = $userDetails->id;
        $wippli_id = $postData['wippli_id'];
        $comment = $postData['comment'];

        $WippliComment = new WippliComment();
        $WippliComment->wippli_id = $wippli_id;
        $WippliComment->user_id = $user_id;
        $WippliComment->comment = $comment;


        if ($file = $request->hasFile('commentfile')) {
            $file = $request->file('commentfile');
            // prd($file);
            $WippliComment->commentfile = upload_site_images($wippli_id, $file, 'wippli-comment');
        }

        $WippliComment->created_at = date('Y-m-d H:i:s');
        if ($WippliComment->save()) {
            return 'success';
        }
    }



//join learning center verification link get request
    public function checkExistEmail(Request $request) {
        $postData = $request->all();
        $email = $postData['email'] ? $postData['email'] : "";
        $response = [];
        if (!empty($email)) {
            $isExist = is_email_exist($email);
            if ($isExist['status'] == 'exist') {
                $response = 'false';
            } else {
                $response = 'true';
            }
            return $response;
        }
    }

    public function directPayment($request, $postData, $userDetails) {
        if (!empty($postData)) {
            $Directpayment = new Directpayment();
            $Directpayment->subscription_id = $postData['sId'];
            $Directpayment->user_id = $userDetails['id'];
            $Directpayment->firstname = $firstName = $postData['firstname'];
            $Directpayment->lastname = $lastName = $postData['lastname'];
            $Directpayment->city = $city = $postData['city'];
            $Directpayment->address = $address1 = $postData['address'];
            $Directpayment->state = $state = $postData['state'];
            $Directpayment->zip = $zip = $postData['zip'];
            $Directpayment->cardholder = $postData['cardholder'];
            $Directpayment->cardtype = $creditCardType = $postData['cardtype'];
            $Directpayment->card_number = $creditCardNumber = $postData['cardnumber'];
            $Directpayment->expiry_month = $padDateMonth = $postData['cardmonth'];
            $Directpayment->expiry_year = $expDateYear = $postData['cardyear'];
            $Directpayment->cvv_code = $cvv2Number = $postData['cardcvv'];
            $Directpayment->status = 'active';

            $country = 'US';
            $currencyID = 'USD';
            $paymentType = 'Sale';
            $amount = 1.0;

            $nvpStrr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber" .
                    "&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName" .
                    "&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";

            //$nvpStrr = '&PAYMENTACTION = Sale&AMT = 1.00&CREDITCARDTYPE = visa&ACCT = 4111111111111111&EXPDATE = 122021&CVV2 = 962&FIRSTNAME = John&LASTNAME = Doe&STREET = 1+Main+St&CITY = San+Jose&STATE = CA&ZIP = 95131&COUNTRYCODE = US&CURRENCYCODE = USD';
            // Inactive all previous card details 
            $cardDetailexists = Directpayment::where(['user_id' => $userDetails['id']])->first();
            if (!empty($cardDetailexists)) {
                DB::table('directpayments')->where(['user_id' => $userDetails['id']])->update(['status' => 'inactive']);
            }

            $Directpayment->payment_status = 'SUCCESS';
            $Directpayment->save();
            return $Directpayment->id;
//            $httpParsedResponseAr = PPHttpPost('DoDirectPayment', $nvpStrr);
            // prd($httpParsedResponseAr);
//            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
//                $Directpayment->payment_status = $httpParsedResponseAr["ACK"];
//                $Directpayment->save();
//                return $Directpayment->id;
//            } else {
//                return '';
//            }
        }
    }

    public function PPHttpPost($methodName_, $nvpStr_) {

        $environment = 'sandbox';

        $API_UserName = urlencode('sb-cp3ue1622267_api1.business.example.com');
        $API_Password = urlencode('VLAUEKHH45JUHQ2L');
        $API_Signature = urlencode('AotxXz-JzgVsHQvKTWiUSLnYovpTA02qBKNbROmvZGML-cn9J30X3rNu');

        $API_Endpoint = "https://api-3t.paypal.com/nvp";
        if ("sandbox" === $environment || "beta-sandbox" === $environment) {
            $API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
        }
        $version = urlencode('51.0');

        // Set the API operation, version, and API signature in the request.
        $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

        // Set the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        // Turn off the server and peer verification (TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        // Set the request as a POST FIELD for curl.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
        // Get response from the server.
        $httpResponse = curl_exec($ch);

        if (!$httpResponse) {
            exit("$methodName_ failed: " . curl_error($ch) . '(' . curl_errno($ch) . ')');
        }
        // Extract the response details.
        $httpResponseAr = explode("&", $httpResponse);

        $httpParsedResponseAr = array();
        foreach ($httpResponseAr as $i => $value) {
            $tmpAr = explode("=", $value);
            if (sizeof($tmpAr) > 1) {
                $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
            }
        }
        if ((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
            exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
        }

        return $httpParsedResponseAr;
    }

}

?>