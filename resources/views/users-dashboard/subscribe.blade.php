@extends('sites.layout.tutor')
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center subscribe-main-title">
    <h2>Find the <span>prefect plan</span> <br>for your business</h2>
    <p>All plans include access to matching, attendance and automatic invoicing services as well as resource uploading, downloading and streaming.</p>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 offer-plan-sec">
    <div class="offer-plan-sec-inner clearfix">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
            <div class="plan-details-section">
                <div class="plan-detail-heading-sec">
                    recommended
                </div>			
                <div class="plan-detail-content-sec pdcs">
                    <h3>Tutify Basic FREE</h3>
                    <ul>
                        <li>3 engagements per month</li>
                        <li>Manage up to 3 private students</li>
                        <li>Manage up to 0 group classes</li>
                        <li>Upload up to 500.00 MB of e-Resources</li>
                    </ul>
                    <h4>No credit card required</h4>
                    <a href="{{url('subscribePlan')}}/1" class="add-btn big">Get Offer</a>
                </div>

            </div>
        </div>
        <!--getPlanDetail(id, engage, student, groups, e_res)-->
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
            <div class="subscribe-plan-offers-sec clerfix">
                <ul class="clearfix">
                    @foreach($allPlans as $plans)
                    <?php
                    $planId = $plans['planId'];
                    $planName = $plans['planName'];
                    $subscriptionFee = $plans['subscriptionFee'];
                    $duration = $plans['duration'];
                    $description = $plans['description'];
                    $discount = $plans['discount'];
                    ?>
                    <li class="plan cursor" onclick="getPlanDetail('{{$planId}}', '{{$description}}', '{{$planName}}');">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding"><h3>Tutify {{$planName}}</h3></div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 subscribe-offers nopadding">
                            <h5>${{$subscriptionFee}} per Year billed every {{$duration}}</h5>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 nopadding subscribe-offers-price">
                            Save {{$discount}}%							
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    function getPlanDetail(id,description , plan_name) {
        $('.pdcs').html('');
        $('.pdcs').append('<h3> Tutify ' + plan_name + '</h3>' + description + ' <a href="{{url('subscribePlan')}}/' + id + '" class="add-btn big">Get Offer</a>');

    // var plans = {
    // "1": {"plan_id": "1", "plan_name": "Tutify Basic FREE", "plan_recom": "Yes", "plan_price": "0.00", "plan_per": "Month", "plan_discount": "0", "plan_discount_in": "%", "plan_description": "Try Primium free for 30 days", "payment_per": "1 Month", "engagements": "3", "private_students": "3", "group_classes": "0", "e_resources": "524288000", "status": "1"},
    //         "2": {"plan_id": "2", "plan_name": "Tutify Advanced", "plan_recom": "No", "plan_price": "12.99", "plan_per": "Month", "plan_discount": "40", "plan_discount_in": "%", "plan_description": "$12.99 per month billed every 12-months", "payment_per": "2 Month", "engagements": "10", "private_students": "10", "group_classes": "1", "e_resources": "1073741824", "status": "1"},
    //         "3": {"plan_id": "3", "plan_name": "Tutify Premium", "plan_recom": "No", "plan_price": "19.99", "plan_per": "Year", "plan_discount": "20", "plan_discount_in": "%", "plan_description": "$19.99 per month billed every 12-months", "payment_per": "1 Year", "engagements": "15", "private_students": "15", "group_classes": "3", "e_resources": "2147483648", "status": "1"},
    //         "4": {"plan_id": "4", "plan_name": "Tutify Platinum", "plan_recom": "No", "plan_price": "69.99", "plan_per": "Month", "plan_discount": "20", "plan_discount_in": "%", "plan_description": "$69.99 per month billed every 12-months", "payment_per": "2 Year", "engagements": "-1", "private_students": "-1", "group_classes": "-1", "e_resources": "16106127360", "status": "1"}
    // };

//    $.each(plans, function (k, v) {
//    if (v.plan_id == id) {
//      $('.pdcs').append('<h3> Tutify ' + plan_name + '</h3>' + description + ' <a href="http://tutify.com.sg/subscribe/subscribe_plan/' + id + '" class="add-btn big">Get Plan</a>');
//    }
//    });
    }
</script>
@endsection