@extends('sites.layout.tutor')
@section('content')
<?php
$userDetails = getUserDetails();
$LcDetails = getLcDetails();
$imgFolder = ($userDetails->user_type == '4') ? 'student' : 'tutor';
?>
<div id="resource-container" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 nopadding sidebar">
            <div class="dashboard-profile-picture clearfix">
                <!--<img class="img-responsive center-block" src="http://tutify.com.sg/assets/images/default_profile_user_img.png">-->
                @if(!empty($userDetails->avatar))
                <img src="{{ asset('public/sites/images/')}}/{{$imgFolder}}/{{@$userDetails->id . '/' . @$userDetails->avatar }}" class="img-responsive center-block " alt="User Image">
                @else
                <img src="{{ asset('public/sites/users/images/default_profile_user_img.png')}}" class="img-responsive center-block " alt="User Image">
                @endif
                <div class="col-lg-12">
                    <h3 class="dashboard-profile-name">{{@$userDetails->name}}</h3>
                    <a href="{{url('userprofile')}}" class="linkText">View Profile</a>
                    <a href="{{url('editprofile')}}/{{$userDetails->id}}" class="linkText">Edit Profile</a>
                </div>
            </div>
            <div class="dashboard-left-block">
                <div class="dashboard-sidebar-title">
                    <h4>Verifications</h4>
                    <a href="#" data-toggle="tooltip" title="A Verifications help build trust between guests and hosts and can make booking easier..">
                        <img src="http://tutify.com.sg/assets/images/question-mark.png" class="question-icon img-responsive">
                    </a>
                </div>
                <div class="verification-content-list">
                    <ul>
                        <li><a href="">
                                <h4>Email address</h4>
                                <h5>Not Verified</h5>
                            </a></li>
                        <li><a href="">
                                <h4>Phone number</h4>

                            </a></li>
                        <li><a href="">
                                <h4>Facebook</h4>
                                <h5>0 Friends</h5>
                            </a></li>
                        <li><a href="">
                                <h4>Reviewed</h4>		    		
                                <h5>4 Reviews</h5>
                            </a></li>
                        <li><a href="">
                                <h4>Offline ID</h4>		    		
                                <h5>Driver License</h5>
                            </a></li>
                    </ul>
                    <a href="{{url('trust_verification')}}" class="add-verification">add verifications</a>
                </div>
            </div>
            <div class="dashboard-left-block">
                <div class="dashboard-sidebar-title">
                    <h4>Quick Link</h4>
                </div>
                <div class="quick-content-list">
                    <a href="{{url('editprofile')}}/{{$userDetails->id}}" class="linkText">Edit Profile</a>
                    <a href="{{url('becometutor')}}" class="linkText">Become a Tutor</a>
                    <a href="{{url('trust_verification')}}" class="linkText">Trust and Verification</a>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 nopadding">

            <div class="desc-container col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <strong>Manage your microbusiness.</strong>Access notifications, Listings, Messages and Resources quickly.
                Keep your profile updated for the optimal Tutify experience. Boost your chances of getting
                engagements and resource downloads. <a href="#" class="linkText">Learn more.</a>		
            </div>

            <div class="right-block your-req-block col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-notifi nopadding">
                <h3 class="res-heading">Notifications</h3>	
                <div class="notification-list">

                    <li>
                        Please confirm your email address by clicking on the link we just emailed you. If you cannot find the email, you can <a href="http://tutify.com.sg/users/send_link_confirm_email" class="linkText">request a new confirmation email</a> or <a href="http://tutify.com.sg/users/editProfile" class="linkText">change your email address</a>.
                    </li>
                </div>
            </div>
            <div class="right-block your-req-block col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-listing nopadding">
                <h3 class="res-heading">Your Listings</h3>
                <div class="references-content col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">

                    No listing available.        
                </div>
            </div> 
            <div class="right-block your-req-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                <div class="invite-n-earn-block clearfix">
                    <div class="col-xs-12 col-sm-9 nopadding">
                        <h3>Invite friends, enjoy premium free!</h3>
                        <h4>Earn up $137 SGD for everyone you invite.</h4>
                    </div>
                    <div class="col-xs-12 col-sm-3 nopadding text-right">
                        <button type="button" class="travel-credit-btn">Go Premium</button>
                    </div>
                </div>
            </div>

            <div class="right-block your-req-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                <h3 class="res-heading">Messages <span>(0 new)</span></h3>	
                <div class="messages-list">

                </div>
                <div class="col-xs-12 col-lg-12 all-message-block">
                    <a href="#" class="all-messages">All messages</a>
                </div>
            </div>

            <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 dash-pub-resources nopadding">
                <h3 class="res-heading">Published Resources</h3>
                <div class="resources-content">
                    <!--input type="button" value="Sort by" class="flatbtn"-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 publish_resource" style="display: none;">
                        <select name="sort_by" aria-controls="example" class="flatbtn form-control input-sm sorting-btn" id="res_order_by">
                            <option style="display: none;">Sort by</option>
                            <option value="subject_id">Subjects</option>
                            <option value="syllabus_id">Syllabus</option>
                            <option value="topic">Topics</option>
                            <option value="PriceL2H">Price (Low to High)</option>
                            <option value="PriceH2L">Price (High to Low)</option>
                        </select>
                    </div>

                    <div class="res-slide">	
                        <img src="http://tutify.com.sg/assets/images/loading-spinner-grey.gif" class="resource_loader hide">
                    </div>


                </div>
            </div>
        </div>
        @endsection

