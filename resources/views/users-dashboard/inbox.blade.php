@extends('sites.layout.tutor')
@section('content')
<?php
$userDetails = getUserDetails();
$LcDetails = getLcDetails();
$imgFolder = ($userDetails->user_type == '4') ? 'student' : 'tutor';
?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 nopadding">
    <img class="img-responsive" src="http://tutify.com.sg/assets/images/inbox-image.jpg">
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 start-taining-box">
    <div class="start-taining-box-inner">
        <h3>Unleash the olympian in you</h3>
        <h2>$100*</h2>
        <button type="button" class="add-method-btn">Start your training</button>
        <p class="tm-conditions">*<a href="" class="red-txt-link" title="">Terms and conditions</a> apply</p>
    </div>
</div>

<div id="resource-container" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="row inbox-nav">
            <div class="col-sm-12 col-md-3">
                <form class="row inbox-filter-form" action="" method="get">
                    <div class="col-sm-12 space-1">
                        <div class="select select-large select-block inbox-dropdown">
                            <select name="filter">
                                <option selected="" value="all">All Messages (0)</option>
                                <option value="starred">Starred (0)</option>
                                <option value="unread">Unread (0)</option>
                                <option value="reservations">Reservations (0)</option>
                                <option value="pending_requests">Pending Requests (0)</option>
                                <option value="hidden">Archived (0)</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="hide-sm col-md-9">
                <div class="pull-right"> 
                </div>
            </div>
        </div>

        <div class="right-block your-req-block col-xs-12 col-sm-12 col-md-12 col-lg-12 no-bg nopadding">
            <div class="messages-list">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding" style="padding: 6px;">No messages in your inbox.</div>      </div>
        </div>
    </div>

</div>

@endsection