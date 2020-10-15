<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth,DB;
use App\NewWippli;

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
        return view('sites.index');
    }

    public function userDashboard() {
        if (Auth::check()) {
            $NewWippli = DB::table('new_wipplis as nw')->select('u.name','u.id as userId','nw.*')
            ->leftJoin('users as u', 'u.id', 'nw.user_id')->orderBy('nw.id','DESC')
            ->get();
            $userDetails = getUserDetails();
            // prd($NewWippli);
            return view('sites.user-dashboard',['userDetails'=>$userDetails,'NewWippli'=>$NewWippli]);
        }
        return redirect("/login");
    }


    public function popupForm(Request $request) {
        $response = [];
        $postData = $request->post();
        $email_id = $postData;
        return 'tsedhgv';
        // return view('popupform');

    }
}
