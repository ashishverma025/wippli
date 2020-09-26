@extends('sites.layout.tutor')
@section('content')
<?php
$userDetails = getUserDetails();
$LcDetails = getLcDetails();
$imgFolder = ($userDetails->user_type == '4') ? 'student' : 'tutor';

$syllabus_details = @$editRequest->syllabus_details ? (array) json_decode($editRequest->syllabus_details) : "";
$lessions = @$editRequest->lession_ids ? json_decode($editRequest->lession_ids) : "";
$teachingLocations = @$editRequest->loc_ids ? json_decode($editRequest->loc_ids) : "";
$feeCollection = @$editRequest->fee_collect_id ? json_decode($editRequest->fee_collect_id) : "";
$languages = @$editRequest->language_id ? json_decode($editRequest->language_id) : "";
$tutor_status = @$editRequest->tutor_status ? json_decode($editRequest->tutor_status) : "";

$categories = @$editRequest->category ? json_decode($editRequest->category) : "";
?>
<!-- Ion Slider -->
<link rel="stylesheet" href=".{{ asset('public/student/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
<!-- bootstrap slider -->
<link rel="stylesheet" href="{{ asset('public/student/plugins/bootstrap-slider/css/bootstrap-slider.min.css')}}">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 nopadding sidebar">
    <div class="sidebar-menu">
        <ul>
            <li class="active"><a href="{{url('listing/listing_request')}}">Your Tutor Request</a></li>
            <li class=""><a href="{{url('listing/listing_class')}}">Your Classes</a></li>
            <li class=""><a href="{{url('listing')}}">Your Resources</a></li>
        </ul>
    </div> 

    <a href="{{url('editprofile')}}/{{@$userId}}" class="sidebar-link">View Profile</a> 	      
</div>

<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 nopadding">
    @if(empty($requestId))
    <div class="desc-container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <strong>Broaadcast your requests.</strong> Add requests and start engaging tutors. Specify subjects, fees and much more. Creating multiple requests for a variety of subjects will not improve your chances of getting a match. <a href="#" class="linkText">Learn more</a>		
    </div>

    <div class="right-block your-req-block col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-listing nopadding">
        <h3 class="res-heading">All Requests</h3>
        @if(!empty($ListingRequest))
        @foreach($ListingRequest as $request)
        <?php
        $syllabusDetails = json_decode($request['syllabus_details']);
        $syllb = array_keys((array) $syllabusDetails);
//        pr($properties);
        $P_range = isset($request['p_range']) ? explode(',', $request['p_range']) : 0;
        $pmin = @$P_range[0] ? $P_range[0] : 0;
        $pmax = @$P_range[1] ? $P_range[1] : 0;

        $tutorStatus = $request['tutor_status'] ? json_decode($request['tutor_status']) : "";
        $tutorStatus = $tutorStatus ? implode(',', $tutorStatus) : 'N/A';
        ?>
        <div class="references-content col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
            <div class="your-list clearfix">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 nopadding"> 
                    <button type="button" class="{{ (@$request['status']=='Active'?'active':'pending') }}-btn">{{@$request['status']}}</button>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 nopadding"> 
                    <p class="your-list-title">{{@$request['title']}}</p>
                </div>        

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 group-list-option pull-right nopadding">
                    <div class="option-content">
                        <input type="button" value="Options" class="options-btn listing-option-btn">
                        <ul class="group-options">
                            <li><a href="{{url('#')}}" class="manage-group" data-target="#viewDetails{{@$request['id']}}" data-toggle="modal"> View</a></li>
                            <li><a href="{{url('listing/listing_request')}}/{{encode(@$request['id'])}}" class="edit-group">Edit</a></li>
                            <li><a href="{{url('listing/duplicate_request')}}/{{@$request['id']}}" class="duplicate-group">Duplicate</a></li>
                            <li class="noborder"><a href="{{url('listing/delete_request')}}/{{@$request['id']}}" onclick="return confirm('Are you sure delete?')" class="delete-group">Delete</a></li>                  
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Model (view) -->
        <div id="viewDetails{{@$request['id']}}" class="modal fade" tabindex="-1" data-width="400">
            <div class="modal-vertical">
                <div class="modal-vertical-inner">
                    <div class="modal-dialog">
                        <div class="modal-content">				
                            <div class="modal-body">
                                <!--<span>&nbsp;&nbsp;Loading... </span>-->


                                <table class="table table-striped table-hover table-bordered">
                                    <tbody><tr>
                                            <td><strong>Request Title</strong></td>
                                            <td>{{@$request['title']}}</td>

                                            <td><strong>Description</strong></td>
                                            <td>{{@$request['description']}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>No. of Tutor</strong></td>
                                            <td>{{@$request['no_of_tutor']}}</td>

                                            <td><strong>Tutor Type</strong></td>
                                            <td>{{$tutorStatus}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender</strong></td>
                                            <td>{{ucwords(@$request['gender'])}}</td>

                                            <td><strong>Status</strong></td>
                                            <td>{{@$request['status']}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Minimum Range</strong></td>
                                            <td>{{$pmin}}</td>

                                            <td><strong>Maximum Range</strong></td>
                                            <td>{{$pmax}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Subject &amp; Syllabus</strong></td>
                                            <td colspan="3">
                                                <table width="100%" class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>Syllabus</th>
                                                        </tr>
                                                        @foreach($SubjectSyllabusDetails as $subject=>$syllabus)
                                                        @if(!empty($SubjectSyllabusDetails[$subject][0]['syllabus_name']))
                                                        <tr style="border-bottom: 1px solid #ddd;">
                                                            <td>
                                                                {{$subject}}
                                                            </td>
                                                            <td>
                                                                @foreach($syllabus as $id=>$value)
                                                                {{$value['syllabus_name']}} | 
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>   
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Model (view) -->

        @endforeach
        @endif
    </div> 


    <button type="button" class="flatbtn creat-new-reference request_form_btn" onclick="formOpenClose('request_form');">Create New</button> 
    @endif
    <form action="{{url('listing/listing_request')}}" class="tuti-form request_form" id="t_profile" data-id="close" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate" style="display: {{@$requestId?'block':'none'}}">
        @csrf
        <input type="hidden" value="{{@$requestId}}" name="requestId">
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 normal-lable-h nopadding">
            <h3 class="res-heading">Request Summary</h3>
            <div class="sec-content clearfix">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        Request Title
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <input type="text" name="title" value="{{@$editRequest->title}}" placeholder="e.g. Math &amp; Science Graduate Tutor">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        Description
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <textarea name="description">{{@$editRequest->description}}</textarea>
                        <div class="form-block-info">
                            Tell them what you like a tutor. What are the subjects, levels and syllabi you expect them to teach? Do you have a target?
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        No. of Tutors Required
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <!--<div class="form-select ">-->
                        <select name="no_of_tutor">
                            <option value="1" {{@$editRequest->no_of_tutor == 1 ?'selected':''}}>1</option>
                            <option value="2" {{@$editRequest->no_of_tutor == 2 ?'selected':''}}>2</option>
                            <option value="3" {{@$editRequest->no_of_tutor == 3 ?'selected':''}}>3</option>
                            <option value="4" {{@$editRequest->no_of_tutor == 4 ?'selected':''}}>4</option>
                            <option value="5" {{@$editRequest->no_of_tutor == 5 ?'selected':''}}>5</option>
                            <option value="6" {{@$editRequest->no_of_tutor == 6 ?'selected':''}}>6</option>
                            <option value="7" {{@$editRequest->no_of_tutor == 7 ?'selected':''}}>7</option>
                            <option value="8" {{@$editRequest->no_of_tutor == 8 ?'selected':''}}>8</option>
                            <option value="9" {{@$editRequest->no_of_tutor == 9 ?'selected':''}}>9</option>
                            <option value="10" {{@$editRequest->no_of_tutor == 10 ?'selected':''}}>10</option>
                        </select>
                        <!--<input type="number" name="no_of_tutor" min="1" max="10" value="{{@$editRequest->no_of_tutor}}">-->
                    </div>
                </div>
            </div>
        </div>

        <div class="right-block your-req-block col-xs-12 col-sm-12 col-md-12 col-lg-12 normal-lable-h tutor-pref nopadding">
            <h3 class="res-heading">Tutor Preferences</h3>
            <div class="references-content col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">  
                <!-- Start of Qualification Section -->
                <div class="checkbox-group qualifications filters-section clearfix">
                    <div class="col-lg-3 col-md-12 text-right form-label">
                        Category
                    </div>

                    <div class="col-lg-9 col-md-12 checkbox-rt-sec">
                        <div id="lesson-options">
                            <div class="col-md-4 check-block">
                                <label class="media request-check checkbox facet-checkbox" title="Undergraduate">
                                    <div>
                                        <input type="checkbox" name="category[]" value="7" {{@in_array(7,$categories) ?'checked':''}}>
                                    </div>
                                    <div>
                                        <span>Undergraduate</span>
                                    </div>
                                </label>
                            </div>              
                            <div class="col-md-4 check-block">
                                <label class="media request-check checkbox facet-checkbox" title="Graduate ">
                                    <div>
                                        <input type="checkbox" name="category[]" value="8" {{@in_array(8,$categories) ?'checked':''}}>
                                    </div>
                                    <div>
                                        <span>Graduate </span>
                                    </div>
                                </label>
                            </div>              
                            <div class="col-md-4 check-block">
                                <label class="media request-check checkbox facet-checkbox" title="Lecturer">
                                    <div>
                                        <input type="checkbox" name="category[]" value="9" {{@in_array(9,$categories) ?'checked':''}}>
                                    </div>
                                    <div>
                                        <span>Lecturer</span>
                                    </div>
                                </label>
                            </div>    
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                                <div class="form-block-info">
                                    Select the credentials of tutors you want to engaged. <a class="linkText" href="#">Learn More</a>.
                                </div>
                            </div>

                            <button type="button" class="checkbox-show"><img class="img-responsive" src="http://tutify.com.sg/assets/images/more-filter-down-arrow.png"></button>
                        </div>
                        <!--Start of hidden check-box Group section-->
                        <div class="hide-check-box-sec">                        

                            <div class="col-md-4 check-block">
                                <label class="media request-check checkbox facet-checkbox" title="NIE Trainee (MOE)">
                                    <div>
                                        <input type="checkbox" name="category[]" value="37">
                                    </div>
                                    <div>
                                        <span>NIE Trainee (MOE)</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <!--End of hidden check-box Group section-->  
                    </div>
                </div>
                <!-- End of Qualification Section -->
                <div class="row filters-section clearfix">
                    <div class="col-lg-3 col-md-12 text-right form-label">
                        Demographic
                    </div>

                    <div class="col-lg-9 col-md-12 tutor-form">
                        <div class="row multiselect">
                            <div class="col-md-4 col-sm-12 check-block">
                                <div class="select select-block">
                                    <select name="gender" class="guest-select" id="" data-prefill="">
                                        <option value="" >Gender</option>
                                        <option value="male" {{@$editRequest->gender == 'male'?'selected':''}}>Male</option>
                                        <option value="female" {{@$editRequest->gender == 'female'?'selected':''}}>Female</option>   
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 check-block">
                                <div class="select select-block">
                                    <select name="age" class="guest-select" id="" data-prefill="">
                                        <option value="" disabled="disabled" selected="selected">Age</option>
                                        <option value="1" {{@$editRequest->age == '1'?'selected':''}}>25-30</option>
                                        <option value="2" {{@$editRequest->age == '2'?'selected':''}}>30-35</option>
                                        <option value="3" {{@$editRequest->age == '3'?'selected':''}}>35-40</option>
                                        <option value="4" {{@$editRequest->age == '4'?'selected':''}}>40-45</option>
                                        <option value="5" {{@$editRequest->age == '5'?'selected':''}}>45-50</option>
                                        <option value="6" {{@$editRequest->age == '6'?'selected':''}}>50-55</option>   
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 check-block">
                                <div class="select select-block">
                                    <select name="guest" class="guest-select" id="" data-prefill="">
                                        <option value="1" {{@$editRequest->guest == '1'?'selected':''}}>Guest-1</option>
                                        <option value="2" {{@$editRequest->guest == '2'?'selected':''}}>Guest-2</option>
                                    </select>
                                </div>
                            </div>
                        </div>                  
                    </div>
                </div>  
                <div class="row filters-section options" data-name="options_filters">
                    <div class="col-lg-3 col-md-12 text-right form-label">
                        Status
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="row row-condensed">
                            <div class="col-lg-4 col-md-6 instant-book-filter ">
                                <label id="instant-book-tooltip" class="row">
                                    <div class="col-lg-2 col-sm-1 instant-book request-check nomargin">
                                        <input type="checkbox" name="tutor_status[]" class="" value="Verified" {{@in_array('Verified',$tutor_status) ?'checked':''}}>
                                    </div>
                                    <div class="col-lg-10 col-sm-11 needsclick padding-right-0">
                                        <img class="img-responsive" src="http://tutify.com.sg/assets/images/verified-small.png">
                                        <strong>Verified</strong>
                                        <br>
                                        <small class="text-muted needsclick">
                                            Learn with legitimate tutors.
                                            <a class="instant-book-filter-link" href="#" target="_blank">
                                                Learn More
                                            </a>
                                        </small>
                                    </div>
                                </label>
                            </div>

                            <div class="col-lg-4 col-md-6 instant-book-filter">
                                <label id="superhost-tooltip" class="row">
                                    <div class="col-lg-2 col-sm-1 superhost request-check nomargin">
                                        <input type="checkbox" name="tutor_status[]" class="" value="Supertutor" {{@in_array('Supertutor',$tutor_status) ?'checked':''}}>
                                    </div>
                                    <div class="col-lg-10 col-sm-11 needsclick padding-right-0">
                                        <div class="superhost-badge"></div>
                                        <img class="img-responsive" src="http://tutify.com.sg/assets/images/medal-icon.png">
                                        <strong>Supertutor</strong><br>
                                        <small class="text-muted needsclick">
                                            Engage well-recognised tutors.
                                            <a class="superhost-filter-link" href="#" target="_blank">Learn More</a>
                                        </small>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div> 

        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 compress-spacing normal-lable-h nopadding">
            <h3 class="res-heading">Subjects and Fees</h3>
            <div class="sec-content clearfix">

                <!-- Start of Subject Section -->
                <div id="subject_sections">
                    @if(!empty($SubjectSyllabusDetails))
                    @foreach ($SubjectSyllabusDetails as $subject => $syllabus) 
                    @if(!empty($SubjectSyllabusDetails[$subject][0]['syllabus_name']))
                    <div class="checkbox-group qualifications filters-section noborder clearfix">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                            <span>{{$subject}}</span><br>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 checkbox-rt-sec">
                            <div id="lesson-options">
                                @foreach ($syllabus as $value) 
                                @if(!empty($value['sylId']))
                                <?php
                                $syllabus = (array) @$syllabus_details[$subject];
                                $chkd = @$syllabus[@$value['sylId']] == @$value['syllabus_name'] ? 'checked' : "";
                                ?>

                                <div class="col-md-4 check-block">
                                    <label class="media request-check checkbox facet-checkbox" title="{{@$value['syllabus_name']}}">
                                        <div>
                                            <input type="checkbox" name="syllabus_details[{{@$subject}}][{{@$value['sylId']}}]" value="{{@$value['syllabus_name']}}" {{$chkd}}>
                                        </div>
                                        <div>
                                            <span>{{@$value['syllabus_name']}}</span>
                                        </div>
                                    </label>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>   
                <!-- End of Subject Section -->

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">

                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="col-xs-12">

                            <!--Old range slider -->
                            <!--<div class="double-slider">
                            <input type="range" name="range_from" class="from" value="{{@$min}}" min="0" max="10000" data-prev-value="0">
                            <div class="progressbar_from"></div>
                            <input type="range" name="range_to" class="to" value="{{@$max}}" min="0" max="10000" data-prev-value="150">
                            <div class="progressbar_to"></div>

                            <span class="value-output from">{{@$min}}</span>
                            <span class="value-output to">{{@$max}}</span>
                        </div>-->


                            <!---- Price Slider -->

                            <div class="price-range">


                                <div class="range_slider_scroll_bar">
                                    <div id="slider-range_v5"></div>
                                </div>

                                <div class="slider-labels">
                                    <div class="caption">
                                        <p>$<span id="slider-range-value5">{{@$min}}</span>SGD</p>
                                    </div>
                                    <div class="caption text-right">
                                        <p>$<span id="slider-range-value6">{{@$max}}</span>SGD</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="getValue">
                                        <input type="hidden" name="min-value" value="">
                                        <input type="hidden" name="max-value" value="">
                                    </div>
                                </div>
                            </div>



                            <!--<div style="position: relative;">
                                <div>
                                    <div class="slider-blue">
                                        <input type="text" name="p_range" value="{{@$editRequest->p_range}}" class="slider form-control" data-slider-min="0" data-slider-max="10000"
                                               data-slider-step="5" data-slider-value="[{{@$min}},{{@$max}}]" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="show">
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <div class="form-block-info"> 
                            Specify a range of fees for various syllabi and/or age groups. <br>You may settle on a specific rate after engagement.

                        </div>
                        <div class="addbtn red clearfix add-sub-btn" data-id="close" onclick="formOpenClose('add-sub-btn', 'sub-add-1');">Add Subject</div>
                        <div id="s_err_msg" style="font-size: 15px;"></div>




                    </div>
                </div>






                <style>

                    .double-slider{
                        display:flex;
                        justify-content: space-between;
                        height:50px;
                        width:100%;
                        position:relative;
                        margin:10vh auto;
                    }

                    .value-output {
                        margin-top: 15px;
                        font-family: "Arial", sans-serif;
                    }

                    .value-output.from:before {
                        content:'From: ';
                    }

                    .value-output.to:before {
                        content:'To: ';
                    }


                    .progressbar_from {
                        position: absolute;
                        top: -3px;
                        left:0;
                        height: 5px;
                        width: 0;
                        background-color: #e6e6e6;
                        z-index: 1;
                    }

                    .progressbar_to {
                        position: absolute;
                        top: -3px;
                        right:0;
                        height: 5px;
                        width: 0;
                        background-color: #e6e6e6;
                        z-index: 1;
                    }

                    input[type=range] {
                        -webkit-appearance: none;
                        margin: 0;
                        width: 100%;
                        height: 0;
                        position: absolute;
                    }

                    input[type=range]:focus {
                        outline: none;
                    }

                    /* Chrome Styles */
                    input[type=range]::-webkit-slider-runnable-track {
                        width: 100%;
                        height: 5px;
                        cursor: pointer;
                        animate: 2.2s;
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        background: #ff5a5f ;
                        border-radius: 25px;
                        border: 0px solid #000101;
                        position: relative;
                    }
                    input[type=range]::-webkit-slider-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 1px solid #e6e6e6;
                        height: 20px;
                        width: 20px;
                        border-radius: 15px;
                        background: #fff;
                        cursor: pointer;
                        -webkit-appearance: none;
                        margin-top: 0;
                        transform: translate(0, -50%);
                        z-index: 9999;
                        position: absolute;
                        top: 50%;
                    }


                    input[type=range]:focus::-webkit-slider-runnable-track {
                        background: '#007bcd';
                    }

                    /* Firefox styles */
                    input[type=range]::-moz-range-track {
                        width: 100%;
                        height: 12.8px;
                        cursor: pointer;
                        animate: 0.2s;
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        background: #ac51b5;
                        border-radius: 25px;
                        border: 0px solid #000101;
                    }
                    input[type=range]::-moz-range-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0px solid #000000;
                        height: 20px;
                        width: 39px;
                        border-radius: 7px;
                        background: #65001c;
                        cursor: pointer;
                    }

                    /* IE styles */
                    input[type=range]::-ms-track {
                        width: 100%;
                        height: 12.8px;
                        cursor: pointer;
                        animate: 0.2s;
                        background: transparent;
                        border-color: transparent;
                        border-width: 39px 0;
                        color: transparent;
                    }
                    input[type=range]::-ms-fill-lower {
                        background: #ac51b5;
                        border: 0px solid #000101;
                        border-radius: 50px;
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                    }
                    input[type=range]::-ms-fill-upper {
                        background: #ac51b5;
                        border: 0px solid #000101;
                        border-radius: 50px;
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                    }
                    input[type=range]::-ms-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0px solid #000000;
                        height: 20px;
                        width: 39px;
                        border-radius: 7px;
                        background: #65001c;
                        cursor: pointer;
                    }
                    input[type=range]:focus::-ms-fill-lower {
                        background: #ac51b5;
                    }
                    input[type=range]:focus::-ms-fill-upper {
                        background: #ac51b5;
                    }

                    body {
                        padding: 30px;
                    }
                </style>
                <script>
                    (function () {
                        // Get inputs by container
                        $('.double-slider input[type="range"]').on('input', function (e) {
                            // Split the elements From/To Slider and From/To values so you can handle them separtely 
                            const fromSlider = $(this).parent().children('input[type="range"].from'),
                                    toSlider = $(this).parent().children('input[type="range"].to'),
                                    fromValue = parseInt($(this).parent().children('input[type="range"].from').val()),
                                    toValue = parseInt($(this).parent().children('input[type="range"].to').val()),
                                    currentlySliding = $(this).hasClass('from') ? 'from' : 'to',
                                    outputElemFrom = $(this).parent().children('.value-output.from'),
                                    outputElemTo = $(this).parent().children('.value-output.to');

                            // Check which slider has been adjusted and prevent them from crossing each other 
                            if (currentlySliding == 'from' && fromValue >= toValue) {
                                fromSlider.val((toValue - 1));
                                fromValue = (toValue - 1);
                            } else if (currentlySliding == 'to' && toValue <= fromValue) {
                                toSlider.val((fromValue + 1));
                                toValue = (fromValue + 1);
                            }

                            // Updating the output values so they mirror the current slider's value
                            outputElemFrom.html(fromValue);
                            outputElemTo.html(toValue);

                            // Caluculating and setting the progressbar widths    
                            $('.progressbar_from').css('width', ((fromSlider.width() / parseInt(fromSlider[0].max)) * fromSlider[0].value) + "px");
                            $('.progressbar_to').css('width', (toSlider.width() - ((toSlider.width() / parseInt(toSlider[0].max)) * toSlider[0].value)) + "px");

                        });
                    })();
                </script>


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 new-sub form-block sub-add-1" id="" style="display: none;">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        New Subject
                    </div>

                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 nopadding">
                            <?php // pr($SubjectSyllabus);   ?>
                            <input type="hidden" name="subject_id" id="subject_id" value="">
                            <input type="text" name="subject_name" id="subject_name" placeholder="Level &amp; Subject" class="form-control subject" list="subj_list" style="border-top-right-radius: 0;border-bottom-right-radius: 0;">
                            <datalist id="subj_list">
                                <?php foreach ($SubjectSyllabus as $key => $value) { ?>
                                    <option value="<?= $value->subjects_name ?>" data-id="<?= $value->id ?>"></option>
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-xs-5 col-sm-4 col-md-3 col-lg-2 nopadding">
                            <input type="button" name="" value="Enter" id="show-sub">
                        </div>
                    </div>
                </div>

                <script src="{{ asset('public/student/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
                <!-- Bootstrap slider -->
                <script src="{{ asset('public/student/plugins/bootstrap-slider/bootstrap-slider.min.js')}}"></script>
                <script>
                    $(function () {
                        /* BOOTSTRAP SLIDER */
                        $('.slider').bootstrapSlider()

                        /* ION SLIDER */
                        $('#range_1').ionRangeSlider({
                            min: 0,
                            max: 5000,
                            from: 0,
                            to: 10000,
                            type: 'double',
                            step: 1,
                            prefix: '$',
                            prettify: false,
                            hasGrid: true
                        })
                        $('#range_2').ionRangeSlider()

                        $('#range_3').ionRangeSlider({
                            type: 'double',
                            postfix: ' miles',
                            step: 10000,
                            from: 25000000,
                            to: 35000000,
                            onChange: function (obj) {
                                var t = ''
                                for (var prop in obj) {
                                    t += prop + ': ' + obj[prop] + '\r\n'
                                }
                                $('#result').html(t)
                            },
                            onLoad: function (obj) {
                                //
                            }
                        })
                    })
                </script>
            </div>
        </div>

        <!--Additional Specifications-->
        @include('sites/AdditionalSpecifications')
        <!--End Additional Specifications-->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right nopadding">
            <button class="add-btn big" type="submit" name="submit" value="{{!empty(@$requestId)?'update':'add'}}"> Save</button>

        </div>
    </form>  
</div>


<script>
    var subj_done = 1;
    $(document).on('change', ".syll", function () {
        var selected_chk = 0;
        $("#selectedSyllabus").val(0);
        if ($(this).prop("checked")) {
            selected_chk = 1;
            var setValue = $(this).attr('data-value');
            $("#" + setValue).val(setValue)
        }

        $("#selectedSyllabus").val(selected_chk);
        if (selected_chk > 0) {
            $(this).parent().parent().parent().siblings('.form-inputs').children('.irs-slide').show();
            $(this).parent().parent().parent().parent().siblings('.nopadding').children('.subj-done').show();
        } else {
            $(this).parent().parent().parent().siblings('.form-inputs').children('.irs-slide').hide();
            $(this).parent().parent().parent().parent().siblings('.nopadding').children('.subj-done').hide();
//            $('.subj-done').hide();
        }
    });


    function getSubId() {
        var val = $('#subject_name').val()
        var xyz = $('#subj_list option').filter(function () {
            return this.value == val;
        }).data('id');
        return subj_id = xyz ? xyz : 0;
    }

    $(document).on('click', '.subj-done', function () {
        var ch = '';
        var subject_id = getSubId();
        var subject_name = $('#subject_name').val()

//        ch = $('#'+subject_name).val();
        ch = $("#selectedSyllabus").val();

        var slider_range = $(this).parent().siblings('.sibling').children('.form-inputs').children('.irs-slide').children().children('.range_slide').val();
        var splt_value = slider_range.split(';');
        $(this).parent().siblings('.subName').children('.fee_range').html('$' + splt_value[0] + '-' + splt_value[1] + '<sup>SGD</sup>');

        if (ch) {
            subj_done = 1;
            $(this).hide();
            $('.irs-slide').hide();
            ch = null;
        } else {
            swal({title: "Error!", text: "Please Select Syllabus", type: "error"});
//            confirmBox("Please Select Syllabus");
        }
    });



    $("#show-sub").click(function (e) {
        var str = '';
        var subject_id = getSubId();
        var subject_name = $.trim($("#subject_name").val());

        if (subj_done == 0) {
            swal("Please done the subject before add new !");
//            confirmBox("Please done the subject before add new !");
        } else if (subject_name == "") {
            $('#s_err_msg').text('Please Enter Subject Name');
            //swal({   title: "Error!",   text: "Please Enter Subject Name!",   type: "error"});
            $("#subject_name").focus();
            e.preventDefault();
        } else if (subject_id == 0) {
            swal({
                title: "Subject " + subject_name + " Not Found Our Database",
                text: "Add the new subject ",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Add"
            },
                    function () {
                        $.ajax({
                            url: "{{url('getSubjectSyllabusListById')}}",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            type: "post",
                            data: {'subject_id': subject_id, 'subject_name': subject_name},
                            datatype: 'json',
                            success: function (res) {
                                data = $.parseJSON(res);
                                if (res == 0) {
                                    swal("Subject Added Successfully ! Wait for admin approval");
                                    $('#save_subject_name').show();
                                }
                            },
                        });
                    });
        } else {
            $.ajax({
                url: "{{url('getSubjectSyllabusListById')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "post",
                data: {'subject_id': subject_id, 'subject_name': subject_name},
                datatype: 'json',
                beforeSend: function () {

                },
                success: function (res) {
//                    data = $.parseJSON(res);
                    if (res.trim() != 'not found') {
//                        $('.irs-slide').show();
                        $('#subject_sections').append(res);
                        subj_done = 0;
//                        $("#subject_name").val('');
                        range_slider();
                        formOpenClose('add-sub-btn', 'sub-add-1')
                    } else {
                        swal({title: "Error!", text: "Not Result Found!", type: "error"});
                    }
                }
            })
        }
    });


    function range_slider(range_from = null, range_to = null) {
        if (range_from == null) {
            range_from = 0;
        }
        if (range_to == null) {
            range_to = 10000;
        }

        $(".range_slide,#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 10000,
            from: range_from,
            to: range_to,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true,
        });
    }


    function formOpenClose(str = null, hide_show = null) {
        if (str == null) {
            str = "request_form";
        }
        if (hide_show == null) {
            hide_show = str;
        }

        var btn_id = $("." + str).attr('data-id');
        if (btn_id == "close") {
            $("." + str).attr('data-id', 'open')
            $("." + hide_show).show();
        } else {
            $("." + str).attr('data-id', 'close')
            $("." + hide_show).hide();
    }
    }
</script>
@endsection