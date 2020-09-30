<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth,DB;

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
            $userDetails = getUserDetails();
            // prd($userDetails);
            return view('sites.user-dashboard',['userDetails'=>$userDetails]);
        }
        return redirect("/login");

    }
}
