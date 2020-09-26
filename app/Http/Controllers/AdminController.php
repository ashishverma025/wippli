<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use Hash;
use Auth;
use Redirect;
use App\User;
use Config;

class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        $this->middleware('auth:admin');
    }

    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin');
    }



}
