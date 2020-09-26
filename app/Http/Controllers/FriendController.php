<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\InviteFriend;
use App\CreditScore;
use App\User;
use Auth,
    DB,
    Hash,
    Session;
use DataTables;

class FriendController extends Controller {

    public function inviteaFriend(Request $request, $type = null) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {
                return view('sites-student.inviteaFriend', ['active' => 'invitefriend']);
            }
            if ($request->isMethod('post')) {
                $status = false;
                $input = $request->all();
                $inputEmail = $input['receiver_email'];
                $email_addresses = explode(',', $inputEmail);
                $senderDetails = getUserDetails();

                /* MULTIPLE FRIEND INVITED AND SAVE CREDIT SCORE DATA */
                foreach ($email_addresses as $email) {
                    $CreditScore = [
                            ['user_id' => $senderDetails->id, 'sender_id' => '', 'email' => $senderDetails->email, 'amount' => '1,000', 'type' => 'Sender', 'created_at' => date('Y-m-d H:i:s')],
                            ['user_id' => '', 'sender_id' => $senderDetails->id, 'email' => $email, 'amount' => '1,000', 'type' => 'Receiver', 'created_at' => date('Y-m-d H:i:s')],
                    ];
//                    prd($CreditScore);
                    CreditScore::insert($CreditScore); // Eloquent approach
                    /* SAVE CREDIT SCORE DATA */
                    /* SAVE INVITE FRIEND DATA */
                    $InviteFriend = new InviteFriend();
                    $InviteFriend->sender_id = $senderDetails->id;
                    $InviteFriend->sender_email = $senderDetails->email;
                    $InviteFriend->receiver_email = $email;
                    $InviteFriend->created_at = date('Y-m-d H:i:s');
                    $InviteFriend->save();

                    //Send Welcome Mail To students
                    $bodyData = ['email' => $email, 'sender_name' => @$senderDetails->name, 'userId' => @$senderDetails->id];
                    sendMail($request, $bodyData, 'Hii-Message', $email, "$senderDetails->name sent you up to $43 towards your first trip", "tutifysg@gmail.com", 'inviteFriend');

                    $status = true;
                }
                if ($status) {
                    $response['resCode'] = 200;
                    $response['resMsg'] = 'Request send successfully';
                } else {
                    $response['resCode'] = 500;
                    $response['resMsg'] = 'Internal server error';
                }
                return response()->json($response);
            }
        }
        return redirect('/');
    }

}
?>


