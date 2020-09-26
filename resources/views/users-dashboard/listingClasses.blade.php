@extends('sites.layout.tutor')
@section('content')
<?php
$userDetails = getUserDetails();
$LcDetails = getLcDetails();
$imgFolder = ($userDetails->user_type == '4') ? 'student' : 'tutor';
//pr($SubjectSyllabusDetails);
?>
<!-- Ion Slider -->
<link rel="stylesheet" href=".{{ asset('public/student/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
<!-- bootstrap slider -->
<link rel="stylesheet" href="{{ asset('public/student/plugins/bootstrap-slider/css/bootstrap-slider.min.css')}}">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 nopadding sidebar">
    <div class="sidebar-menu">
        <ul>
            <li class=""><a href="{{url('listing/listing_request')}}">Your Tutor Request</a></li>
            <li class="active"><a href="{{url('listing/listing_class')}}">Your Classes</a></li>
            <li class=""><a href="{{url('listing')}}">Your Resources</a></li>
        </ul>
    </div> 

    <a href="{{url('editprofile')}}/{{@$userId}}" class="sidebar-link">View Profile</a> 	      
</div>

<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 nopadding">
    @if(empty($classtId))
    <div class="desc-container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <strong>Broaadcast your requests.</strong> Add requests and start engaging tutors. Specify subjects, fees and much more. Creating multiple requests for a variety of subjects will not improve your chances of getting a match. <a href="#" class="linkText">Learn more</a>		
    </div>

    <div class="right-block your-req-block col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-listing nopadding">
        <h3 class="res-heading">All Classes</h3>
        @if(!empty($ListingClasses))
        @foreach($ListingClasses as $request)
        <?php
        $P_range = isset($request['p_range']) ? explode(',', $request['p_range']) : 0;
        $pmin = @$P_range[0] ? $P_range[0] : 0;
        $pmax = @$P_range[1] ? $P_range[1] : 0;
        $syllabusDetails = json_decode($request['syllabus_details']);
        $syllb = array_keys((array) $syllabusDetails);
        ?>
        <div class="references-content col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
            <div class="your-list clearfix">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 nopadding"> 
                    <button type="button" class="{{ (@$request['status']=='Active'?'active':'pending') }}-btn">{{@$request['status']}}</button>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 nopadding"> 
                    <p class="your-list-title">{{$request['title']}}</p>
                </div>        

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 group-list-option pull-right nopadding">
                    <div class="option-content">
                        <input type="button" value="Options" class="options-btn listing-option-btn">
                        <ul class="group-options">
                            <li><a href="{{url('#')}}" class="manage-group" data-target="#viewDetails{{@$request['id']}}" data-toggle="modal"> View</a></li>
                            <li><a href="{{url('listing/listing_class')}}/{{encode(@$request['id'])}}" class="edit-group">Edit</a></li>
                            <li><a href="{{url('listing/duplicate_class')}}/{{encode(@$request['id'])}}" class="duplicate-group">Duplicate</a></li>
                            <li class="noborder"><a href="{{url('listing/delete_class')}}/{{@$request['id']}}" onclick="return confirm('Are you sure delete?')" class="delete-group">Delete</a></li>                  
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
                                    <tbody>
                                        <tr>
                                            <td><strong>Class Title</strong></td>
                                            <td>{{@$request['title']}}</td>

                                            <td><strong>Description</strong></td>
                                            <td>{{@$request['description']}}</td>
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
    <form action="{{url('listing/listing_class')}}" class="tuti-form request_form" id="t_profile" data-id="close" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate" style="display: {{@$classtId?'block':'none'}}">
        @csrf
        <input type="hidden" value="{{@$classtId}}" name="classtId">
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 normal-lable-h nopadding">
            <h3 class="res-heading">Class Summary</h3>
            <div class="sec-content clearfix">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        Class Title
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <input type="text" name="title" value="{{@$editClass->title}}" placeholder="e.g. Math &amp; Science Graduate Tutor">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        Description
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <textarea name="description">{{@$editClass->description}}</textarea>
                        <div class="form-block-info">Tell them what it’s like to have you as their tutor. What is your teaching approach or
                            professional traits? Do you have a motto?</div>
                    </div>
                </div>
            </div>
        </div>
        <?php
//        $categories = @$editClass->category ? json_decode($editClass->category) : "";
//        $tutor_status = @$editClass->tutor_status ? json_decode($editClass->tutor_status) : "";
        ?>

        <?php
        $syllabus_details = @$editClass->syllabus_details ? (array) json_decode($editClass->syllabus_details) : "";
        $lessions = @$editClass->lession_ids ? json_decode($editClass->lession_ids) : "";
        $teachingLocations = @$editClass->loc_ids ? json_decode($editClass->loc_ids) : "";
        $feeCollection = @$editClass->fee_collect_id ? json_decode($editClass->fee_collect_id) : "";
        $languages = @$editClass->language_id ? json_decode($editClass->language_id) : "";
//        pr($syllabus_details);
        ?>
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 compress-spacing normal-lable-h nopadding">
            <h3 class="res-heading">Subjects and Fees</h3>
            <div class="sec-content clearfix">
                <!-- Start of Subject Section -->
                <div id="subject_sections"></div>   
                <!--<input type="hidden" id="selectedSyllabus" value="">-->
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
                <!-- End of Subject Section -->

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">

                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="col-xs-12">
                            <div style="position: relative;">
                                <div>
                                    <!-- Old Slider Section -->

                                    <!--<div class="slider-blue">
                                        <input type="text" name="p_range" value="{{@$editClass->p_range}}" class="slider form-control" data-slider-min="0" data-slider-max="10000"
                                               data-slider-step="5" data-slider-value="[{{@$min}},{{@$max}}]" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="show">
                                    </div>-->



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




                                </div>
                            </div>
                        </div>
                        <div class="form-block-info"> 
                            Specify a range of fees for various syllabi and/or age groups. <br>You may settle on a specific rate after engagement.

                        </div>
                        <div class="addbtn red clearfix add-sub-btn" data-id="close" onclick="formOpenClose('add-sub-btn', 'sub-add-1');">Add Subject</div>
                        <div id="s_err_msg" style="font-size: 15px;"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 new-sub form-block sub-add-1" id="" style="display: none;">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        New Subject
                    </div>

                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 nopadding">
                            <?php // pr($SubjectSyllabus);    ?>
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
            <button class="add-btn big" type="submit" name="submit" value="{{!empty(@$classtId)?'update':'add'}}"> Save</button>

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
        var ch = null;
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