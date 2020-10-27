<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Response;
use App\User;
use App\NewWippli;
use App\Type;
use App\Category;

class AjaxController extends Controller {

//CHECK UNIQUE EMAIL 

    public function popupForm(Request $request) {
        $response = [];
        $postData = $request->post();
        $categories = Category::where('status','active')->get();
        
        return view('sites/popupForm',[
            'categories'=> $categories ? $categories : "",
        ]);

    }
    

    public function generateFolderStructure(Request $request) {
        $postData = $request->post();
        $wippli_id = $postData['wippli_id'];
        $NewWippli =  DB::table('new_wipplis as nw')->select('u.name','u.id as userId','nw.*','bd.business_name')
        ->leftJoin('users as u', 'u.id', 'nw.user_id')
        ->leftJoin('contact_details as cd', 'u.id', 'cd.user_id')
        ->leftJoin('business_details as bd', 'cd.organisation', 'bd.id')
        ->where('nw.id',$wippli_id)->orderBy('nw.id','DESC')
        ->get()->toArray();
        $NewWippli = $NewWippli[0];
        // prd($NewWippli);

        $folderStruct = ['Admin'=>'Admin','Misc'=>'Misc','BRAND AND ASSETS'=>'ND AND ASSETS','firstname+lastname'=>
        ['CN'=>'Type'],
        'CN-JobType'=>['CN-JOBOUTCOME'=>[
            'BSN_JOBNAME_JOBOUTCOME_FORMAT_DATE_BI_CN_AJN_PVN'=>
            [
                'MASTER_JOBNAME_JOBOUTCOME_DATE',
                'PROOFS_JOBNAME_JOBOUTCOME_DATE',
                'FINAL_JOBNAME_JOBOUTCOME_DATE',
                'ASSETS_JOBNAME_JOBOUTCOME_DATE',
                'PACKAGE_JOBNAME_JOBOUTCOME_DATE',
                'OTHERS_JOBNAME_JOBOUTCOME_DATE',
                'BRIEF&Specs_JOBNAME_JOBOUTCOME_DATE',
                'REFERENCE_JOBNAME_JOBOUTCOME_DATE',
                'OLD_JOBNAME_JOBOUTCOME_DATE',
                'ATTACHMENTS_JOBNAME_JOBOUTCOME_DATE',
            ]
          ]
        ]];
        $folderSrruct[$NewWippli->name] = $folderStruct;
        $folderSrruct = generatePlanFolder($NewWippli,$folderSrruct);
    }
    
    
    public function getTypesByCategory(Request $request) {
        $response = [];
        $postData = $request->post();
        $category_id = $postData['category'];
        $types =  Type::where('status','active')->where('cat_id',$category_id)->get();
        $str = "";
        $str .= "<select class='form-control' name='type' id='type'>";
        if(!empty($types)){
            foreach ($types as $key => $val) {
                $str .= "<option class='' value='".$val->name."'>$val->name</option>";
            }
        }
        $str .= "</select>";

        return $str;
    }



    public function newWippliSave(Request $request) {
        // Get the formData
        $response = [];
        if ( !empty( $_POST ) ) {
            $userDetails = getUserDetails();
            $wippliDetails = $request->post();
            $this->validate( $request, [
                //'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id . ',id',
            ] );
            $imgFolder = 'wippli';
            $wippliDetails['wippli_id'] = "";
            $wippli_id = !empty( $wippliDetails['wippli_id'] ) ? $wippliDetails['wippli_id'] : '';
            $NewWippli = empty( $wippliDetails['wippli_id'] ) ? new NewWippli() : NewWippli::where( ['id' => $wippli_id] )->first();

            $NewWippli->project_name = !empty($wippliDetails['project_name']) ? $wippliDetails['project_name'] : $NewWippli->project_name;
            $NewWippli->deadline = $wippliDetails['deadline'] ? $wippliDetails['deadline'] : $NewWippli->deadline;
            $NewWippli->type = $wippliDetails['type'] ? $wippliDetails['type'] : $NewWippli->type;
            $NewWippli->category = $wippliDetails['category'] ? $wippliDetails['category'] : $NewWippli->category;
            $NewWippli->instruction = $wippliDetails['instruction'] ? ($wippliDetails['instruction']) : $NewWippli->instruction;
            $NewWippli->digital = @$wippliDetails['digital'] ? $wippliDetails['digital'] : $NewWippli->digital;
            $NewWippli->print = @$wippliDetails['print'] ? $wippliDetails['print'] : $NewWippli->print;
            $NewWippli->video = @$wippliDetails['video'] ? $wippliDetails['video'] : $NewWippli->video;
            $NewWippli->other = @$wippliDetails['other'] ? $wippliDetails['other'] : $NewWippli->other;
            $NewWippli->objective =  @$wippliDetails['objective'] ? $wippliDetails['objective'] : $NewWippli->objective;
            $NewWippli->dimensions = @$wippliDetails['dimensions'] ? $wippliDetails['dimensions']: $NewWippli->dimensions;
            $NewWippli->width = @$wippliDetails['width'] ? $wippliDetails['width']: $NewWippli->width;
            $NewWippli->height = @$wippliDetails['height'] ? $wippliDetails['height']: $NewWippli->height;
            $NewWippli->units = @$wippliDetails['units'] ? $wippliDetails['units']: $NewWippli->units;
            $NewWippli->portrait = @$wippliDetails['portrait'] ? $wippliDetails['portrait']: $NewWippli->portrait;
            $NewWippli->landscape = @$wippliDetails['landscape'] ? $wippliDetails['landscape']: $NewWippli->landscape;
            $NewWippli->comment = @$wippliDetails['comment'] ? $wippliDetails['comment']: $NewWippli->comment;
            $NewWippli->target_audience = @$wippliDetails['target_audience'] ? $wippliDetails['target_audience']: $NewWippli->target_audience;
            $NewWippli->tone_of_voice	 = @$wippliDetails['tone_of_voice	'] ? $wippliDetails['tone_of_voice	']: $NewWippli->tone_of_voice	;
            $NewWippli->attachment = @$wippliDetails['attachment'] ? $wippliDetails['attachment']: $NewWippli->attachment;
            $NewWippli->user_id = $userDetails['id'];

            // prd($NewWippli);

            if ( $file = $request->hasFile('attachment' ) ) {
                $file = $request->file( 'attachment' );
                // prd($userDetails['id']);

                $NewWippli->attachment = upload_site_images( $userDetails['id'], $file, 'wippli-image' );
            }
            if ( empty( $wippliDetails['wippli_id'] ) ) {
                $NewWippli->created_at = date( 'Y-m-d H:i:s' );
                // echo "create";
                // prd( $wippliDetails );
                $NewWippli->save();
                $response['status'] = "success";
                $response['msg'] = "Wippli added successfully alert-success";
            } else {
                $NewWippli->updated_at = date('Y-m-d H:i:s');
                $NewWippli->update();
                $response['status'] = "success";
                $response['msg'] = "Wippli updated successfully alert-success";
            }

            // return redirect( '/admin/user' );
        }
        return response()->json($response);
    }


    public function wippliPreview(Request $request) {
        $response = [];
        $postData = $_REQUEST;
        $wippli_id = $postData['wippli_id'];
        $NewWippli = DB::table('new_wipplis as nw')->select('u.name','u.id as userId','nw.*','bd.business_name')
        ->leftJoin('users as u', 'u.id', 'nw.user_id')
        ->leftJoin('contact_details as cd', 'u.id', 'cd.user_id')
        ->leftJoin('business_details as bd', 'cd.organisation', 'bd.id')
        ->where('nw.id',$wippli_id)->orderBy('nw.id','DESC')
        ->first();
        // prd($NewWippli);

        $userDetails = getUserDetails();
        return view('sites.wippliFormPreview',['userDetails'=>$userDetails,'NewWippli'=>$NewWippli]);
    }



//CHECK UNIQUE EMAIL

    public function isEmailExist(Request $request) {
        $response = [];
        $postData = $request->post();
        $email_id = $postData['email'];
        return is_email_exist($email_id);
    }

//GET TUTOR STUDENTS LIST AJAX REQUEST
    public function searchStudents(Request $request) {
        $response = [];
        $postData = $request->post();
        $sSearch = ($postData['text']) ? $postData['text'] : "";

        if (!empty($sSearch)) {
            $students = DB::table('users')->select('id', 'email')->Where('email', 'like', '%' . $sSearch . '%')
                    ->where('user_type', 4)
                    ->where('email_verified_at', '!=', null)
                    ->get();
            $str = "";
            foreach ($students as $key => $value) {
//$str .= "<li class='select2-results__option select2-results__option--highlighted' id='select2-findStudent-result-".$value->id."-".$value->id."' role='option' aria-selected='false' data-select2-id='select2-findStudent-result-".$value->id."-".$value->id."' value=".$value->id.">".$value->id."</li>";
                $str .= "<option value='" . $value->id . "'>" . $value->email . "</option>";
            }
            return $str;
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

            //$nvpStrr = '&PAYMENTACTION=Sale&AMT=1.00&CREDITCARDTYPE=visa&ACCT=4111111111111111&EXPDATE=122021&CVV2=962&FIRSTNAME=John&LASTNAME=Doe&STREET=1+Main+St&CITY=San+Jose&STATE=CA&ZIP=95131&COUNTRYCODE=US&CURRENCYCODE=USD';
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