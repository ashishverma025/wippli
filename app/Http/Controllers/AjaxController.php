<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Question,
    App\Answer,
    App\Attendance,
    App\StudentRecord,
    App\StudentAnswer,
    App\QuestionAttempt,
    App\OnlinequestionPaper,
    App\ExamprogressbarDetails,
    App\Directpayment,
    App\Subscriber;
use App\User,
    App\Subscription,
    App\Payment;
use Auth,
    DB,
    Hash,
    Session;

class AjaxController extends Controller {

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

    public function saveAnswered(Request $request) {
        $postData = $request->all();
        $userDetails = getUserDetails();
        $studentAnswered = new StudentAnswer();
        if (!empty($postData)) {
            if (!empty($postData['possibilityAnswer'])) {
                $possibilityAnswer = json_decode($postData['possibilityAnswer']);
                $answer = strtolower(preg_replace('/\s+/', '', $postData['openAnswered']));
                if (in_array("$answer", $possibilityAnswer)) {
                    return "correct";
                } else {
                    return "wrong";
                }
            }
            $studentAnswered->user_id = $userDetails['id'];
            $studentAnswered->student_name = $userDetails['name'];
            $studentAnswered->student_email = $userDetails['email'];
            $studentAnswered->paper_id = isset($postData['pid']) ? $postData['pid'] : 'Paper A';
            $studentAnswered->question_id = $postData['question_id'];
            $studentAnswered->answered = $postData['open_answered'];
            $studentAnswered->student_type = 'seamo';
            //$studentAnswered->save();
            return 'success';
        }
    }

    public function questionAttempt(Request $request) {
        $postData = $request->all();
        $userDetails = getUserDetails();
        if (!empty($postData)) {

            $SubscribeDetails = Subscriber::where(['user_id' => $userDetails['id'], 'status' => 'active'])->where('subscription_id', '!=', 1)->first();
            if (!empty($SubscribeDetails)) {
                $diff = DateDiff(date('Y-m-d'), $SubscribeDetails['end_date'], 'days');
                if ($diff == '-1 days') {
                    DB::table('subscribers')
                            ->where(['user_id' => $userDetails['id']])
                            ->update(['status' => 'expired']);
                }
            }
            $exist = QuestionAttempt::where(['user_id' => $userDetails['id']])->first();
            $QuestionAttempt = (empty($exist)) ? new QuestionAttempt() : QuestionAttempt::where(['user_id' => $userDetails['id']])->first();

            if (empty($exist)) {
                $QuestionAttempt->user_id = $userDetails['id'];
                $QuestionAttempt->user_name = $userDetails['name'];
                $QuestionAttempt->user_email = $userDetails['email'];
                $QuestionAttempt->question_id = $postData['question_id'];
                $QuestionAttempt->question_attempt = 1;
                $QuestionAttempt->ip_address = $_SERVER['REMOTE_ADDR'];
                $QuestionAttempt->save();
            } else {
                if ($exist['question_id'] != $postData['question_id']) {
// prd($postData['question_id']);
                    $QuestionAttempt->ip_address = $_SERVER['REMOTE_ADDR'];
                    $QuestionAttempt->question_id = $postData['question_id'];
                    $QuestionAttempt->question_attempt = $QuestionAttempt->question_attempt + 1;
                    $QuestionAttempt->update();
                }
            }
//             prd($exist['question_attempt']);

            return @$exist['question_attempt'] + 1;
        }
    }

    public function progressStatus(Request $request) {
        $postData = $request->all();
        $userDetails = getUserDetails();
        $ExamprogressbarDetails = new ExamprogressbarDetails();
        if (!empty($postData)) {
            $exist = ExamprogressbarDetails::where(['user_id' => $userDetails['id'], 'paper_id' => $postData['pid']])->first();
            $ExamprogressbarDetails = (empty($exist)) ? new ExamprogressbarDetails() : ExamprogressbarDetails::where(['user_id' => $userDetails['id'], 'paper_id' => $postData['pid']])->first();
            if (empty($exist)) {
                $ExamprogressbarDetails->user_id = $userDetails['id'];
                $ExamprogressbarDetails->user_name = $userDetails['name'];
                $ExamprogressbarDetails->user_email = $userDetails['email'];
                $ExamprogressbarDetails->paper_id = $postData['pid'];
                $ExamprogressbarDetails->progress = $postData['progress'];
                $ExamprogressbarDetails->score_now = ($postData['checkedVal'] == 'Yes') ? $postData['qMark'] : 0;
                $ExamprogressbarDetails->created_at = date('Y-m-d H:i:s');
                $ExamprogressbarDetails->ip_address = $_SERVER['REMOTE_ADDR'];

                $ExamprogressbarDetails->save();
            } else {
                if ($postData['progress']) {
// echo 'update';
                    $scoreNow = $ExamprogressbarDetails->score_now;
                    $ExamprogressbarDetails->ip_address = $_SERVER['REMOTE_ADDR'];
                    $ExamprogressbarDetails->updated_at = date('Y-m-d H:i:s');
                    $ExamprogressbarDetails->progress = $postData['progress'];
                    $ExamprogressbarDetails->score_now = (@$postData['checkedVal'] == 'Yes') ? $scoreNow + $postData['qMark'] : $scoreNow;

                    $ExamprogressbarDetails->update();
                }
            }
// prd($exist);

            return round((100 / $postData['totalQuestion']) * $postData['progress']);
        }
    }

    public function saveTransaction(Request $request) {
        $postData = $request->all();
        $userDetails = getUserDetails();
        if ($request->isMethod('post')) {
            $sId = $postData['sId'];
            $transDetails = $postData['details'];
            $amount = $postData['amt'];

            if (!empty($transDetails)) {
                $currency = $postData['cur'];

                $Payment = new Payment();
                $Payment->user_id = $userDetails['id'];
                $Payment->subscription_id = $sId;
                $Payment->transaction_id = $transDetails['id'];
                $Payment->amount = $amount;
                $Payment->currency = $currency;
                $Payment->payment_status = $transDetails['status'];
                $Payment->transaction_time = $transDetails['create_time'];
                $Payment->created_at = date('Y-m-d H:i:s');
                $Payment->save();
            }

            if (!empty($sId)) {
                $subscribers = Subscriber::where(['user_id' => $userDetails['id']])->first();

                $plans = Subscription::where(['id' => $sId])->first();
                if (!empty($plans)) {
                    //BEFORE ADD NEW SUBSCRIBER INACTIVE ALL EXISTING SUBSCRIPTION
                    $duration = '7 days';
                    if (!empty($subscribers)) {
                        DB::table('subscribers')
                                ->where(['user_id' => $userDetails['id']])
                                ->update(['status' => 'inactive']);
                        $duration = $plans['duration'];
                    }
                    $directPaymentId = "";
                    if (empty($transDetails)) {
                        $directPaymentId = $this->directPayment($request, $postData, $userDetails);
                    }
                    $subscribers = new Subscriber();
                    $subscribers->subscription_id = $sId;
                    $subscribers->directpayment_id = !empty($directPaymentId) ? $directPaymentId : "";
                    $subscribers->transaction_id = @$transDetails['id'];
                    $subscribers->payment_id = @$Payment->id;
                    $subscribers->user_id = $userDetails['id'];
                    $subscribers->amount = $amount;
                    $subscribers->payment_status = @$transDetails['status'] ? @$transDetails['status'] : (!empty($directPaymentId) ? 'success' : "failed");
                    $subscribers->start_date = date('Y-m-d');
                    $subscribers->end_date = createDate(date('Y-m-d'), "+" . $duration, 'Y-m-d');
                    $subscribers->created_at = date('Y-m-d H:i:s');
//                        set_flash_message('Congratulation! you have subscribe successfully', 'alert-success');
                    $subscribers->save();
                }
                return 'success';
            }
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
        // Set up your API credentials, PayPal end point, and API version.
        // $API_UserName = urlencode('sb-475hwt1638794_api1.business.example.com');
        // $API_Password = urlencode('LVVNYYLN48VUR8E7');
        // $API_Signature = urlencode('AsLDJ9.m4EOvt0m4bLCC4ceU1Ir9Ads1azXeKNygMQF6hElx5QZL9aWj');

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