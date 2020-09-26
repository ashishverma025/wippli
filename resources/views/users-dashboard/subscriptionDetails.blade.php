@extends('sites.layout.tutor')
@section('content')

<form action="{{url('#')}}" class="" id="" method="post" accept-charset="utf-8">
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 check-align-top nopadding">

        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
            <h3 class="res-heading">Subscription Details</h3>
            <div class="resources-content row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 notification-title">
                    {{ $Subscription ? $Subscription['plan_name'] : 'No subscription found'}}
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <div class="notification-form">
                        <label class="notification checkbox facet-checkbox" title="">
                           <!--  <div>
                                <input type="checkbox" name="push_notif_ids[]" value="25">
                            </div> -->
                            <div>
                                <span>
                                    <!-- <h4>Messages</h4> -->
                                    @if($Plans)
                                    <p>Price : {{$Subscription['subscription_fee']}}</p>
                                    <p>Duration : {{DateDiff($Plans['start_date'],$Plans['end_date'],'days')}} </p>
                                    <p>Start Date :  {{$Plans['start_date']}}</p>
                                    <p>End Date :  {{$Plans['end_date']}}</p>
                                    <p>Remaining Days : {{DateDiff(date('Y-m-d'),$Plans['end_date'],'days')}} </p>
                                    @endif
                                </span>
                            </div>
                        </label>
                    </div>

                </div>
            </div>
        </div>
        @if($Plans)
        <a href="{{url('subscriptionCancel')}}/{{@$Plans['id']}}" class="add-btn small pull-right">Cancel</a>
        @endif
    </div>
</form>

@endsection