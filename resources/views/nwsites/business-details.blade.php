@extends('nwsites.layout.sites')
@section('content')
<!-- Modal -->
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
                            <h2>Hi Valerie!</h2>
                            <b>Dell Boomi</b>
                            <span>Sydney: The 29 Dec 11:39 am</span>
                        </div>
                    </div>
                    <a href="{{url('new-wippli')}}">New Wippli</a>
                    <a href="{{url('contact-details')}}" style="background: #36beba !important;margin-top: 2px;">Add Contact</a>

                </div>

                <div class="left-board left-board-second mt-5">

                    <div class="left-inner-box inner-box-action">
                        <h3>Actions</h3>
                        <div>
                            <div class="list"><div class="list-left"><i class="fa fa-clipboard-list"></i></div> <div class="list-right"><a href="#BN">Business Name</a></div></div>
                            <div class="list"><div class="list-left"><i class="fa fa-map-marker-alt"></i></div> <div class="list-right"><a href="#BD"> Business Details</a></div></div>
                            <div class="list"><div class="list-left"><i class="fa fa-dollar-sign"></i></div> <div class="list-right"><a href="#BF">Bussiness Financials</a></div></div> 
                            <div class="list"><div class="list-left"><i class="fa fa-user-friends"></i></div> <div class="list-right"><a href="#R&P">Roles and Pernissions</a></div></div> 
                            <div class="list"><div class="list-left"><i class="far fa-smile"></i></div> <div class="list-right"><a href="#Social">Social</a></div></div>   
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#BRND">Branding</a></div></div>  
                            <div class="list"><div class="list-left"><i class="fa fa-cloud"></i></div> <div class="list-right"><a href="#FM">File Management</a></div></div>                            

                        </div>
                    </div>

                </div>


                <div class="left-board left-board-second mt-5">

                    <div class="left-inner-box inner-box-action">
                        <div>
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Cancel</a></div></div> 
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Save</a></div></div>   
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">New Branch</a></div></div>                            
                            <div class="list"><div class="list-left"><i class="fa fa-tag"></i></div> <div class="list-right"><a href="#">Delete</a></div></div>                            

                        </div>
                    </div>

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
                                    <h3>Business Name</h3>
                                </div>
                                <div class="col-lg-6">
                                    <div class="logo">
                                        <img src="{{ asset('assets/sites/img/logo.jpg') }}" alt="logo">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="save-business-details" id="businessForm"  method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- 1 -->
                            <div class="business-name space-form-group">


                                <!-- box -->
                                <div class="twotab-content-box" id="BN">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-clipboard"></i> Business Name</h3>
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
                                                <label>Business Name <span>*</span></label>
                                                <input type="text" name="business_name" class="form-control"  placeholder="{Businessname}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Business legal name <span>*</span></label>
                                                <input type="text" name="business_legal_name" class="form-control"  placeholder="{Businessname}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Business Branch <span>*</span></label>
                                                <input type="text" name="business_branch" class="form-control"  placeholder="{Businessnumber}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Industry <span>*</span></label>
                                                <input type="text" name="industry" class="form-control"  placeholder="{Businessindustry}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Business Short Name <span>*</span></label>
                                                <input type="text" name="business_sort_name" class="form-control"  placeholder="{Businesssystemname}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Business Initials <span>*</span></label>
                                                <input type="text" name="business_initials" class="form-control"  placeholder="{Businessinitials}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Business Number <span>*</span></label>
                                                <input type="text" name="business_number" class="form-control"  placeholder="{Businessnumber}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Type <span>*</span></label>
                                                <input type="text" name="business_number_type" class="form-control"  placeholder="{bnumbertype}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Tax number <span>*</span></label>
                                                <input type="text" name="tax_number_type" class="form-control"  placeholder="{taxnumbertype}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Type <span>*</span></label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>{taxnumbertype}</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- box -->


                                <div class="twotab-content-box" id="BD">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="fa fa-map-marker-alt"></i> Business Details</h3>
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
                                                <label>Country </label>
                                                <input type="text" name="country" class="form-control"  placeholder="{businesscountry}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>State </label>
                                                <input type="text" name="state" class="form-control"  placeholder="{businesstate}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Address line 1 </label>
                                                <input type="text" name="address1" class="form-control"  placeholder="{businessaddress1}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Address line 2 </label>
                                                <input type="text" name="address2" class="form-control"  placeholder="{businessaddress2}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>City </label>
                                                <input type="text" name="city" class="form-control"  placeholder="{businesscity}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Post code </label>
                                                <input type="number" name="post_code" class="form-control"  placeholder="{businesspostcode}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Business E-mail</label>
                                                <input type="text" name="email" id="businessEmail" class="form-control"  placeholder="{businessemail}">
                                                <span id="businessEmailErr" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Contact name (Admin)</label>
                                                <input type="text" name="contact" class="form-control"  placeholder="{Businesscontactname}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- box -->

                                <div class="twotab-content-box" id="BF">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="fa fa-dollar-sign"></i> Bussiness Financials <i class="fa fa-question-circle"></i></h3>
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
                                                <input type="text" class="form-control"  placeholder="{contrate}">
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

                                </div>

                                <!-- box -->

                                <div class="twotab-content-box" id="R&P">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="fa fa-user-friends"></i> Roles and Pernissions <i class="fa fa-question-circle"></i></h3>
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
                                                <label>Type of Business</label>
                                                <select name="business_type" id="" class="form-control" >
                                                    <!-- <option disabled>{Businesstype}</option> -->
                                                    <option value="My Own Business">My Own Business</option>
                                                    <option value="Agency">Agency</option>
                                                    <option value="Supplier">Supplier</option>
                                                    <option value="Client">Client</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Afiliation</label>
                                                <select name="afiliation" id="" class="form-control" >
                                                    <option value="Agent">Agent</option>
                                                    <option value="Associate">Associate</option>
                                                    <option value="Freelancer">Freelancer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- box -->
                                <div class="twotab-content-box" id="Social">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-smile"></i> Social <i class="fa fa-question-circle"></i></h3>
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
                                                <input type="text" name="linkedin" class="form-control"  placeholder="{businesslinkedin}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter" class="form-control"  placeholder="{businesstwitter}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" name="instagram" class="form-control"  placeholder="{businessinstagram}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook" class="form-control"  placeholder="{businessfacebook}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <input type="text" name="youtube" class="form-control"  placeholder="{businessyoutube}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Anything else</label>
                                                <input type="text" name="anythingelse" class="form-control"  placeholder="{businessanythingelse}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- box -->


                                <div class="twotab-content-box branding" id="BRND">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="fa fa-clipboard-list"></i> Branding <i class="fa fa-question-circle"></i></h3>
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
                                                <input type="file" name="logocolours" class="form-control" onchange= "readURL(this, 'businessColorLogo')"  placeholder="{businesslogocolours}">
                                                <img draggable = "true" id="businessColorLogo" height="40" width="40">                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Color icon file(png,svg-600x400px)</label>
                                                <input type="file" name="coloricon" class="form-control" onchange= "readURL(this, 'businessColorIcon')"  placeholder="{businessiconcolours}">
                                                <img draggable = "true" id="businessColorIcon" height="40" width="40">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Negative Logo file(png,svg-600x400px)</label>
                                                <input type="file" name="negativelogo" class="form-control" onchange= "readURL(this, 'businessNegativeLogo')"  placeholder="{businesslogonegative}">
                                                <img draggable = "true" id="businessNegativeLogo" height="40" width="40">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Negative icon file(png,svg-600x400px)</label>
                                                <input type="file" name="iconnegative" class="form-control" onchange= "readURL(this, 'businessNegativeIcon')"  placeholder="{businessiconnegative}">
                                                <img draggable = "true" id="businessNegativeIcon" height="40" width="40">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Primary Dark colour 1 <span>*</span></label>
                                                <input type="color" name="primarydarkcolour1" class="form-control" value="#36872c" placeholder="{PrimaryDarkcolour1}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Primary Dark colour 2 <span>*</span></label>
                                                <input type="color" name="primarydarkcolour2" class="form-control" value="#3b4263" placeholder="{PrimaryDarkcolour2}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Primary Light colour 1 <span>*</span></label>
                                                <input type="color" name="primarylightcolour1" class="form-control" value="#613838" placeholder="{PrimaryLightcolour1}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Primary Light colour 2 <span>*</span></label>
                                                <input type="color" name="primarylightcolour2" class="form-control" value="#d991ca"  placeholder="{PrimaryLightcolour2}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- box -->

                                <div class="twotab-content-box" id="FM">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="fa fa-cloud"></i> File Management <i class="fa fa-question-circle"></i></h3>
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
                                                <input type="text" name="businessdrive" class="form-control"   placeholder="{businessdrive}">  
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Dropx directory <span></span></label>
                                                <input type="text" name="businessdropbox" class="form-control"   placeholder="{businessdropbox}">  
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- box -->

                                <div class="content-box-btn pt-5">

                                    <div class="row">
                                        <div class="col-lg-3 btn gry">

                                            <a href="#">Dismiss</a>
                                        </div>
                                        <div class="col-lg-2 btn green">
                                            @if(checkBusinessPermission(@$userDetails->user_type))
                                            <button type="submit" id="businessSaveBtn" class="btn form-btn">Save</button>
                                            @else
                                            <a href="#" onclick="return confirm('You don\'t have permission to add business please contact to Super Admin')">Save</a>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 btn green">
                                            <a href="#">Save for later</a>
                                        </div>
                                        <div class="col-lg-3 btn blu">
                                            <a href="#">New Branch</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 2end -->   
                        </form>


                        <div class="wippli-ftr light-blu">
                            <div class="wippli-ftr-inner">
                                <p>Powered by</p>
                                <img src="{{ asset('assets/sites/img/wippli-logo-lightblu.png') }}" alt="">
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
    // $('select[name="organisation"]').on('change',function(){
    //    var organisationId = $(this).val();
    //    getBusinessAddress()
    // })
//    let route = $('meta[name="route"]').attr('content');

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
            url: route + 'getBusinessById',
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