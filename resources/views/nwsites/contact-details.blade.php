@extends('nwsites.layout.sites')
@section('content')
<section class="dashboard mt-5">
    <div class="container">
        <div class="row">
            <!-- Col-3 --> 
            <div class="col-lg-3">
                <div class="left-board">
                    <div class="left-id mb-3">
                        <div class="img">
                            <a href="{{url('/user-dashboard')}}"><img src="{{ asset('assets/sites/img/demo.png') }}" alt=""></a>
                        </div>
                        <div class="img-txt">
                            <h2>Hi {{@$userDetails->name}}!</h2>
                            <b>{{@$userDetails->company}}</b>
                            <!-- <span>29 Dec 11:39 am</span> -->
                        </div>
                    </div>
                    {{--<a href="{{url('new-wippli')}}">New Wippli</a>
                    <a href="{{url('business-details')}}" style="background: #106d98 !important;margin-top: 2px;">Add Business</a>
                    --}}
                </div>



            </div>
            <!-- Col-3 End --> 
            <!-- Col-9 --> 

            <div class="col-lg-9">
                <div class="form1 form">

                    <div class="form_inner">
                        <div class="header new-wippli-head">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>Contact</h3>
                                </div>
                                <div class="col-lg-6">
                                    <div class="logo">
                                        <img src="{{ asset('assets/sites/img/tasc-logo.png') }}" alt="logo">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <form action="save-contact-details" id="contactForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- 1 -->
                            <div class="business-name space-form-group">
                                <!-- box -->
                                <div class="twotab-content-box">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-folder"></i> Contact Details</h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul>
                                                <li><i class="fa fa-bars"></i></li>
                                                <li><i class="fa fa-times"></i></li>
                                                <li><i class="fa fa-chevron-down"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="bdr"></div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" class="form-control" name="first_name"  placeholder="{firatname}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text" class="form-control" name="surname" placeholder="{surname}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Position <span></span></label>
                                                <input type="text" class="form-control" name="positions"  placeholder="{contactposition}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Department <span></span></label>
                                                <input type="text" class="form-control" name="department"  placeholder="{contactdepartment}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>E-mail <span></span></label>
                                                <input type="email" id="contactEmail" class="form-control" name="email"  placeholder="{contactemail}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Phone <span></span></label>
                                                <input type="number" id="phone" class="form-control" name="phone"  placeholder="{Phone}">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <!-- box -->
                                {{--
                                <div class="twotab-content-box">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-folder"></i> Contact Financials <i class="fa fa-question-circle"></i></h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul>
                                                <li><i class="fa fa-bars"></i></li>
                                                <li><i class="fa fa-times"></i></li>
                                                <li><i class="fa fa-chevron-down"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="bdr"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Rate</label>
                                                <input type="text" class="form-control"  placeholder="{contactrate}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Currency</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>{contactratecurrency}</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Frequency</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>{contactratefrequency}</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Other</label>
                                                <input type="text" class="form-control"  placeholder="{contactrateother}">
                                            </div>
                                        </div>

                                    </div>

                                </div>--}}
                                <!-- box -->
                                <div class="twotab-content-box">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-folder"></i> Contact Roles and Pernissions <i class="fa fa-question-circle"></i></h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul>
                                                <li><i class="fa fa-bars"></i></li>
                                                <li><i class="fa fa-times"></i></li>
                                                <li><i class="fa fa-chevron-down"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="bdr"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Type <span>*</span></label>
                                                <input type="text" class="form-control" name="type" placeholder="{contactype}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Role <span>*</span></label>
                                                <select class="form-control" name="role">
                                                    <option > Select Role </option>
                                                    @if(!empty($Roles))
                                                    @foreach($Roles as $role)
                                                    <option value="{{$role['id']}}">{{$role['name']}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email Notification <span>*</span></label>
                                                <input type="text" class="form-control" id="emailNotification" name="email_notification"  placeholder="{contactnotification}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        </div>
                                    </div>
                                </div>

                                <!-- box -->


                                {{-- 
                                <div class="twotab-content-box">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-folder"></i> Social <i class="fa fa-question-circle"></i></h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul>
                                                <li><i class="fa fa-bars"></i></li>
                                                <li><i class="fa fa-times"></i></li>
                                                <li><i class="fa fa-chevron-down"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="bdr"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="text" class="form-control"  name="linkedin" placeholder="{businesslinkedin}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control"  name="twitter" placeholder="{businesstwitter}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-border-dash">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" class="form-control"  name="instagram" placeholder="{businessinstagram}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control"  name="facebook" placeholder="{businessfacebook}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <input type="text" class="form-control" name="youtube"  placeholder="{businessyoutube}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Anything else</label>
                                                <input type="text" class="form-control"  name="anything_else" placeholder="{businessanythingelse}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- box -->
                                <div class="twotab-content-box branding">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-folder"></i> Contact Branding <i class="fa fa-question-circle"></i></h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul>
                                                <li><i class="fa fa-bars"></i></li>
                                                <li><i class="fa fa-times"></i></li>
                                                <li><i class="fa fa-chevron-down"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="bdr"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Colour Logo file(png,svg-600x400px)</label>
                                                <input type="file" draggable = "true" class="form-control" name="colorlogo_file" onchange= "readURL(this, 'colorLogo')"  placeholder="{businesslogocolours}">
                                                <img id="colorLogo" height="40" width="40">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Color icon file(png,svg-600x400px)</label>
                                                <input type="file" draggable = "true" class="form-control" name="coloricon_file" onchange= "readURL(this, 'colorIcon')" placeholder="{businessiconcolours}">
                                                <img id="colorIcon" height="40" width="40">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Negative Logo file(png,svg-600x400px)</label>
                                                <input type="file" draggable = "true" class="form-control" name="negativelogo_file" onchange= "readURL(this, 'negetiveLogo')" placeholder="{businesslogonegative}">
                                                <img id="negetiveLogo" height="40" width="40">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Negative icon file(png,svg-600x400px)</label>
                                                <input type="file" draggable = "true" class="form-control" name="negativeicon_file" onchange= "readURL(this, 'negetiveIcon')"  placeholder="{businessiconnegative}">
                                                <img id="negetiveIcon" height="40" width="40">

                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>

                                <!-- box -->

                                <div class="twotab-content-box">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-folder"></i> Contact File Management <i class="fa fa-question-circle"></i></h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul>
                                                <li><i class="fa fa-bars"></i></li>
                                                <li><i class="fa fa-times"></i></li>
                                                <li><i class="fa fa-chevron-down"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="bdr"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>G-drive directory <span></span></label>
                                                <input type="text" class="form-control" name="gdrive_dir"  placeholder="{businessdrive}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Dropx directory <span>*</span></label>
                                                <input type="text" class="form-control" name="dropbox_dir"  placeholder="{businessdropbox}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                --}}
                                <!-- box -->

                                <div class="content-box-btn pt-5">

                                    <div class="row">
                                        
                                        <div class="col-lg-2 btn green">

                                            @if(checkContactPermission(@$userDetails->user_type))
                                            <button type="submit" class="btn form-btn">Save</button>
                                            @else
                                            <button type="button" onclick="return confirm('You don\'t have permission to add contacts please contact to Super Admin')" class="btn form-btn {{@$userDetails->user_type}}">Save</button>
                                            @endif
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- 2end -->   
                        </form>
                        <div class="wippli-ftr light-blu">
                            <div class="wippli-ftr-inner">
                                <p>Powered by</p>
                                <img src="{{ asset('assets/sites/img/tasc-logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Col-9 End --> 
        </div>
    </div>
</section>

<script>
    $('#gridCheck').click(function () {
        if ($(this).is(':checked')) {
            var organisationId = $('select[name="organisation"] option:selected').val();
            getBusinessAddress()
        } else {
            $("#cCountry").val('');
            $("#cState").val('');
            $("#cCity").val('');
            $("#cAddress1").val('');
            $("#cAddress2").val('');
            $("#cPostcode").val('');
        }
    });


    function getBusinessAddress() {
        var organisationId = $('select[name="organisation"] option:selected').val();
        $.ajax({
            url: 'getBusinessById',
            method: 'POST',
            data: {organisationId: organisationId},
            datatype: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.country != '') {
                    $("#cCountry").val(data.country);
                    $("#cState").val(data.state);
                    $("#cCity").val(data.city);
                    $("#cAddress1").val(data.address1);
                    $("#cAddress2").val(data.address2);
                    $("#cPostcode").val(data.post_code);
                    console.log(data)
                }
            }
        })
    }


    $("#contactEmail").blur(function () {
        var email = $("#contactEmail").val()
        $("#emailNotification").val(email)
    })

    $("input[name=surname]").blur(function () {
        var fname = $("input[name=first_name]").val()
        var surname = $("input[name=surname]").val()
        $("input[name=initials]").val(fname.slice(0, 1) + surname.slice(0, 1))

    })

    $(document).ready(function () {
        $("#contactForm").validate({
            errorClass: "has-error",
            ignore: ".ignore",
            // Specify validation rules
            rules: {
                "email": {
                    required: true,
                    remote: {
                        url: 'checkExistEmail',
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            email: function () {
                                return $('#contactForm :input[name="email"]').val();
                            }
                        }
                    }
                },
                "phone": {
                    required: true,
                    rangelength: [6, 10]
                },
                "first_name": {
                    required: true,
                },
                "surname": {
                    required: true,
                },
                "known_as": {
                    required: true,
                },
                "initials": {
                    required: true,
                },
                "tbc1": {
                    required: true,
                },
                "country": {
                    required: true
                },
                "state": {
                    required: true
                },
                "address1": {
                    required: true
                },
                "address2": {
                    required: true
                },
                "city": {
                    required: true
                },
                "post_code": {
                    required: true
                },

                "type": {
                    required: true
                },
                "role": {
                    required: true
                },
                "email_notification": {
                    required: true
                },
                "tbc1": {
                    required: true
                }



            },
            messages: {
                email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                    remote: jQuery.validator.format("{0} is already taken.")
                },
                phone: {
                    required: 'Please enter phone number',
                    rangelength: 'Please enter valid phone number',
                },
            },
        });


        $("#businessForm").validate({
            errorClass: "has-error",
            ignore: ".ignore",
            // Specify validation rules
            rules: {
                "business_name": {
                    required: true,
                },
                "business_branch": {
                    required: true
                },
                "industry": {
                    required: true
                },
                "business_sort_name": {
                    required: true
                },
                "business_initials": {
                    required: true
                },
                "business_number": {
                    required: true
                },
                "business_number_type": {
                    required: true
                },
                "tax_number": {
                    required: true
                },
                "tax_number_type": {
                    required: true
                },
                "country": {
                    required: true
                },
                "state": {
                    required: true
                },
                "address1": {
                    required: true
                },
                "address2": {
                    required: true
                },
                "city": {
                    required: true
                },
                "post_code": {
                    required: true
                },
                "afiliation": {
                    required: true
                }

            },
            messages: {
                business_name: {
                    required: 'Please enter Business Name',
                },
            },
        });
    });

</script>

<script>
    $("#notAllowed").click(function () {
        alert('Add Business to save contacts !');
    });
</script>

@endsection