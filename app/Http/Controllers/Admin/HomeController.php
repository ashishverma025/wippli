<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Auth;
use DB;
use App\Subject;
use App\LearningCenter;
use App\Attendance;
use App\TutorStudents;
use App\Tutorclass;
use App\User;
use App\ClassStudent;

class HomeController extends Controller {

    /**
     * Only Authenticated users for "admin" guard 
     * are allowed.
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (Auth::check()) {
            $studentId = getUser_Detail_ByParam('id');
            $DashboardDetails = [];
            $LearningCenters = LearningCenter::get()->count();
            $ClassStudent = Tutorclass::where(['status' => '1'])->get()->count();
            $Students = User::where(['user_type' => 4])->get()->count();
            $totalUsers = User::get()->count();

            $DashboardDetails['totalUsers'] = $totalUsers;
            $DashboardDetails['LearningCenters'] = $LearningCenters;
            $DashboardDetails['classes'] = $ClassStudent;
            $DashboardDetails['students'] = $Students;
            $DashboardDetails['subjects'] = Subject::get()->count();
//            pr($DashboardDetails);
            return view('admin.AdminDashboard', ['active' => 'Dashboard', 'DashboardDetails' => $DashboardDetails]);
        }
        return view('/admin/login');
    }

}
