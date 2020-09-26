@extends('sites.layout.tutor')
@section('content')
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 nopadding sidebar">
    <div class="sidebar-menu">
        <ul>
            <li class=""><a href="{{url('#')}}">Overview</a></li>
            <li class="{{ (@$sideActive == 'subscriptionDetails') ? 'active' : '' }}">
                <a href="{{url('subscriptionDetails')}}">Subscription Details</a>
            </li>
            <li class="active"><a href="{{url('#')}}">Notifications</a></li>
            <li class=""><a href="{{url('#')}}">Payment Methods</a></li>
            <li class=""><a href="{{url('#')}}">Payout Preferences</a></li>
            <li class=""><a href="{{url('#')}}">Transaction History</a></li>
            <li class=""><a href="{{url('#')}}">Privacy</a></li>
            <li class=""><a href="{{url('#')}}">Security</a></li>
            <li class=""><a href="{{url('#')}}">Settings</a></li>
            <li class=""><a href="{{url('#')}}">Badges</a></li>
        </ul>
    </div> 
    <a href="#" class="sidebar-link">Invite Friends</a>

</div>

<form action="{{url('#')}}" class="" id="" method="post" accept-charset="utf-8">
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 check-align-top nopadding">

        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
            <h3 class="res-heading">Push Notification Settings</h3>
            <div class="resources-content row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 notification-title">
                    Receive Push Notifications to your iPhone, iPad or Android device.
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <div class="notification-form">
                        <label class="notification checkbox facet-checkbox" title="">
                            <div>
                                <input type="checkbox" name="push_notif_ids[]" value="25">
                            </div>
                            <div>
                                <span>
                                    <h4>Messages</h4>
                                    <p>From educators, students, publishers and viewers</p>
                                </span>
                            </div>
                        </label>
                    </div>
                    <div class="notification-form">
                        <label class="notification checkbox facet-checkbox" title="">
                            <div>
                                <input type="checkbox" name="push_notif_ids[]" value="26">
                            </div>
                            <div>
                                <span>
                                    <h4>Engagement Requests</h4>
                                    <p>From educators and stude</p>
                                </span>
                            </div>
                        </label>
                    </div>
                    <div class="notification-form">
                        <label class="notification checkbox facet-checkbox" title="">
                            <div>
                                <input type="checkbox" name="push_notif_ids[]" value="27">
                            </div>
                            <div>
                                <span>
                                    <h4>Others</h4>
                                    <p>Attendance, progress and changes</p>
                                </span>
                            </div>
                        </label>
                    </div>

                </div>
            </div>
        </div>
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
            <h3 class="res-heading">Email Settings</h3>
            <div class="resources-content row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 notification-title">
                    <h4>I want to receive:</h4>
                    You can disable these at any time.
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <div class="notification-form">
                        <label class="notification checkbox facet-checkbox" title="">
                            <div>
                                <input type="checkbox" name="email_notif_ids[]" value="28">
                            </div>
                            <div>
                                <span>
                                    <h4>Test</h4>
                                    <p>General promotions, updates, news about Tutify or general promotions for partner campaigns and services, user surveys, inspiration, and love from Tutify.</p>
                                </span>
                            </div>
                        </label>
                    </div>
                    <div class="notification-form">
                        <label class="notification checkbox facet-checkbox" title="">
                            <div>
                                <input type="checkbox" name="email_notif_ids[]" value="29">
                            </div>
                            <div>
                                <span>
                                    <h4>Hello</h4>
                                    <p>Lesson and review reminders.</p>
                                </span>
                            </div>
                        </label>
                    </div>

                </div>
            </div>
        </div>
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
            <h3 class="res-heading">Phone Preferences</h3>
            <div class="resources-content row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 notification-title">
                    <h4>I want to receive:</h4>
                    You can disable these at any time.
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <div class="notification-form">
                        <label class="notification checkbox facet-checkbox" title="">
                            <div>
                                <input type="checkbox" name="phone_notif_ids[]" value="30">
                            </div>
                            <div>
                                <span>
                                    <h4>Calls about my account, listings, engagements, purchases, or the Tutify community</h4>
                                    <p>If you can opt out, we may still call you about your account if it's urgent or if previous emails didn't reach you.</p>
                                </span>
                            </div>
                        </label>
                    </div>

                </div>
            </div>
        </div>
        <button type="submit" class="add-btn small pull-right">Save</button>
    </div>
</form>

@endsection