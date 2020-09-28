<!-- Main Sidebar Container -->
<?php
$userDetails = getUserDetails();
$imgFolder = ($userDetails->user_type == '4') ? 'student' : 'tutor';
$segment1 = Request::segment(1);
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #001f3f;">
    <!-- Brand Logo -->
    <a href="{{url('/lc/dashboard')}}" class="brand-link">
<!--        <img src="{{url('public/sites/users/images/small-logo.png')}}" alt="Tutify" class="brand-image img-circle elevation-3"
             style="opacity: .8">-->
        <!--<h4 class="tutor-title">{{!empty($LcDetails)?'Tutify-Lc':'Tutify-Student'}}</h4>-->
        <img src="{{url('public/sites/users/images/small-logo.png')}}" alt="Tutify" class="brand-image elevation-3">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(!empty($userDetails->avatar))
                <img src="{{ asset('public/sites/images/')}}/{{$imgFolder}}/{{@$userDetails->id . '/' . @$userDetails->avatar }}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{ asset('public/sites/users/images/default_profile_user_img.png')}}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{asset('editprofile')}}/<?= @$userDetails->id; ?>" class="d-block"><?= @$userDetails->name; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                @if($userDetails->user_type == '4')
                <li class="nav-item">
                    <a href="{{url('student/dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('student/calendar')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Attendance
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('#')}}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{url('lc/dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                @if(!empty($LcDetails))
                <li class="nav-item">
                    <a href="{{url('studentlist')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            My Students
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('subjects')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            My Subjects
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Class Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('classes')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Classes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('assignclass')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assign Class To Student</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Attendance Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('attendence')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Save Attendances</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('attendance')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('attendancesummary')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance Summary</p>
                            </a>
                        </li>
                    </ul>
                </li>           

                @endif
                @endif
                <li class="nav-item">
                    <a href="{{url('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li> 
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>