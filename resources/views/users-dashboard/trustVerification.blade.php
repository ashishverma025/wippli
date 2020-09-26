@extends('sites.layout.tutor')
@section('content')
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 nopadding">
    <form action="http://tutify.com.sg/Users/add_profile_verfi" class="" id="credentail_form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
        <div class="desc-container col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <strong>Tutify is built on trust.</strong> You can improve your rate of engagement by verifying your identity and credentials. All documents uploaded will be processed by our team and kept in high confidence. <a href="#" class="linkText">Learn more</a>.	
        </div>
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 online-verify-box nopadding">
            <h3 class="res-heading">Online Verifications</h3>
            <div class="sec-content">
                <div class="sec-content-inner clearfix">
                    <div class="verify-block">
                        <h2><strong>Email Address</strong></h2>
                        <p>You have confirmed your email: <strong>{{@$userDetails->email}}</strong>. A confirmed email is important to allow us to securely communicate with you.</p>
                    </div>
                    <div class="verify-block">
                        <h2><strong>Phone Number</strong></h2>
                        <p>Rest assured, your number is only shared with another Tutify user once you have a confirmed engagement.</p>
                    </div>

                    <div class="verify-block">
                        <h2><strong>Facebook</strong></h2>
                        <div class="clearfix">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 nopadding">
                                <p>Sign in with Facebook and discover your trusted connections to tutors and/or students all over the world.</p>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 disconnet-btn-container">
<button class="disconnet-btn fb-connect-btn fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" type="button">Connect</button> 
<span data-toggle="tooltip" title="Sign in with Facebook and discover your trusted connections to tutors and/or students all over the world."><img class="question-icon" src="http://tutify.com.sg/assets/images/question-mark.png" alt=""></span>
<div id="status" class="hide-elem"></div>
</div>-->
                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 connect-btn-container">  
								<div class="connect-btn">
                                <a href="https://www.facebook.com/v2.6/dialog/oauth?client_id=766324430229510&amp;state=68482a0b30886a5dff043fca20b730f3&amp;response_type=code&amp;sdk=php-sdk-5.3.1&amp;redirect_uri=http%3A%2F%2Ftutify.com.sg%2Ffacebookctrl%2Fvia_facebook_connect&amp;scope=email" class="connect-btn full btn" style="border: 1px solid #c8c8c8;">Disconnect</a>
								
								<span class="tool-tip" data-toggle="tooltip" title="" data-original-title="Verified Credential / Awaiting Verification"><img class="question-icon" src="http://tutify.com.sg/assets/images/question-mark.png" alt=""></span>
								</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding body-top-gap compress-spacing verify-credential-box ">
            <h3 class="res-heading">Verified Credentials <span data-toggle="tooltip" title="" data-original-title="Verified Credential / Awaiting Verification"><img class="question-icon" src="http://54.179.188.91/public/sites/users/img/qus-icon.png" alt=""></span></h3>
            <div class="sec-content clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right lock form-label">
                        Your Title
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <p><strong>Graduate Tutor (Full-Time)</strong></p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 new-sub form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right lock form-label">
                        Identification
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="col-xs-7 col-sm-8 col-md-9 col-lg-10 nopadding">
                            <div class="form-select full">
                                <select name="identification_id" id="identification1">
                                    <option disabled="" selected="">Select Identification</option>
                                    <option value="1">Driving Licence</option>
                                    <option value="2">Insurance Card</option>
                                    <option value="3">Passport</option>
                                    <option value="4">National ID Card</option>
                                    <option value="5">Residence ID Card</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-xs-5 col-sm-4 col-md-3 col-lg-2 nopadding">
                            <input type="button" name="" value="Upload" onclick="document.getElementById('personal_certifi').click(); return false;">
                            <input type="file" name="personal_certifi" id="personal_certifi" style="visibility: hidden;">                    
                        </div>
                        <div class="certifi_elem1 hide-elem">
                            <span class="file_name1"></span>
                            <img onclick="document.getElementById('personal_certifi').click(); return false;" src="http://tutify.com.sg/assets/images/red-cross.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 new-sub form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right lock form-label">
                        Address
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="col-xs-7 col-sm-8 col-md-9 col-lg-10 nopadding">
                            <div class="form-select full">
                                <select name="address_id" id="address1">
                                    <option disabled="" selected="">Select Address</option>
                                    <option value="1">Utility Bill</option>
                                    <option value="2">Bank Statement</option>
                                    <option value="3">Credit Card Statement</option>
                                    <option value="4">Mobile Phone Bill</option>
                                    <option value="5">Internet Service Bill</option>
                                    <option value="6">Cable Television Bill</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-5 col-sm-4 col-md-3 col-lg-2 nopadding">
                            <input type="button" name="" value="Upload" onclick="document.getElementById('personal_certifi2').click(); return false;">
                            <input type="file" name="personal_certifi2" id="personal_certifi2" style="visibility: hidden;">
                        </div>
                        <div class="certifi_elem2 hide-elem">
                            <span class="file_name2"></span>
                            <img onclick="document.getElementById('personal_certifi2').click(); return false;" src="http://tutify.com.sg/assets/images/red-cross.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding body-top-gap">
            <h3 class="res-heading">Add More Verifications</h3>
            <div class="sec-content">
                <div class="sec-content-inner clearfix">
                    <div class="verify-block">
                        <h2><strong>Google</strong></h2>
                        <div class="clearfix">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 nopadding">
                                <p>Connect your Tutify account to your Google account for simplicity and ease.</p>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 connect-btn-container">
                                <!-- <button class="connect-btn full connect_google" type="button">Connect</button> -->
                                <a href="http://tutify.com.sg/ajax_functions/g_sign_in" class="connect-btn full btn" style="border: 1px solid #c8c8c8;">Connect</a>
                            </div>
                        </div>
                    </div>

                    <div class="verify-block">
                        <h2><strong>LinkedIn</strong></h2>
                        <div class="clearfix">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 nopadding">
                                <p>Create a link to your professional life by connecting your Tutify and LinkedIn accounts.</p>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 connect-btn-container">
                                <button class="connect-btn full" type="button">Connect</button>
                            </div>
                        </div>
                    </div>

                    <div class="verify-block">
                        <h2><strong>American Express &#x00AE;</strong></h2>
                        <div class="clearfix">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 nopadding">
                                <p>Log in with Amex to verify you're a Card Member on your Tutify profile. Your Card will also be added to your account.</p>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 connect-btn-container">
                                <button class="connect-btn full" type="button">Connect</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <button class="add-btn big" type="submit" id="btnSave"> Save</button>

    </form>
</div>
<script>
    $('.chk_plan_btn').click(function () {
        var type = $(this).data('type');
        $.ajax({
            url: "http://tutify.com.sg/Ajax_functions/checkPlanData",
            data: {'type': type},
            type: "Post",
            datatype: 'json',
            beforeSend: function () {
                $('.model-loader').show();
            },
            success: function (res) {
                if (res == 1) {
                    if (type == 'group')
                        $('#create-group').modal('show');
                    else if (type == 'class')
                        $('#create-class').modal('show');
                } else {
                    $('#plan_check_modal').modal('show');
                }

            }
        });
    });
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip(
                {
                    //selector: '#viewport',
                    //padding: 0,
                    html: true,
                    //placement: "bottom",
                    //delay: 1000,
                    //delay: {show: 500, hide: 100},
                }
        );
    });

    $("#menu-arrow").click(function () {
        $(this).parent().parent().parent().find('#menu-list').slideToggle();
        if (jQuery(this).find('img').attr('src') == "http://tutify.com.sg/assets/images/menu-down-arrow.png")
            jQuery(this).find('img').attr('src', "http://tutify.com.sg/assets/images/menu-close-arrow.png");
        else if (jQuery(this).find('img').attr('src') == "http://tutify.com.sg/assets/images/menu-close-arrow.png")
            jQuery(this).find('img').attr('src', "http://tutify.com.sg/assets/images/menu-down-arrow.png");
    });

    window.onload = function (e) {
        var url_list = ["dashboard", "inbox", "listing", "engagements", "users", "account", "subscribe"];
        var uri1 = 'users';

        var sess_id = "61";
        if (sess_id > 0) {
            new_message();
            setInterval(new_message, 60000);
        }

        if ($.inArray(uri1, url_list) != -1)
        {
            var uri2 = 'profile_trust_verification';
            if (uri2) {
                var uri1 = uri1 + "/" + uri2;
            }
            $.ajax({
                url: "http://tutify.com.sg/Inbox/visited",
                data: {'val': uri1},
                type: "Post",
                datatype: 'json',
                success: function (res) {}
            });
        }
    }

    function new_message() {
        $.ajax({
            url: "http://tutify.com.sg/ajax_functions/getUnreadMsg",
            data: {},
            type: "Post",
            datatype: 'json',
            success: function (res) {
                if (res > 0) {
                    $('.msg-count').removeClass('hidden');
                    $('.msg-count span').text(res);
                } else {
                    $('.msg-count').addClass('hidden');
                }

            }
        })
    }

    $("#searchHelp").keyup(function (e) {
        val = $("#searchHelp").val();
        $("#helpResult").html("<img class=img-responsive src='http://tutify.com.sg/assets/images/loader.gif'>");
        $("#search_desc_div").html('');
        if (val.length >= 1) {
            $.ajax({
                url: "http://tutify.com.sg/Help/fetchHeading",
                data: {'search_text': val},
                type: "Post",
                datatype: 'json',
                success: function (data) {
                    if (data) {
                        data = JSON.parse(data);
                        $("#helpResult").html('');
                        $("#resultTitle").html("<h5>Help Center Result for :'" + val + "'</h5>");
                        $.each(data, function (index, value) {
                            $("#helpResult").append("<li data-id=" + value.id + "><a href=# class=getdesc>" + value.heading + "</a></li>");
                        });
                    }
                }
            })
        }
    })

    $(document).on('click', '.getdesc', function () {
        var val1 = $(this).parent().data("id");
        $("#search_desc_div").show();
        $("#search_btn_div").hide();
        $("#search_list_div").hide();
        $.ajax({
            url: "http://tutify.com.sg/Help/fetchDesc",
            data: {'help_id': val1},
            type: "Post",
            datatype: 'json',
            success: function (data) {
                if (data) {
                    data = JSON.parse(data);
                    $.each(data, function (index, value) {
                        $("#search_desc_div").append(value.description)
                    })
                }
            }
        })
        $("#arrowDisplayDiv").show();
    })
    $(document).on('click', '#arrowDisplayIcon', function () {
        $("#search_btn_div").show();
        $("#search_desc_div").hide();
        $("#search_list_div").show();
        $("#arrowDisplayDiv").hide();
    })


</script><script>

    document.getElementById('personal_certifi').onchange = function () {
        $('.file_name1').html('');
        if (this.value) {
            $('.certifi_elem1').show();
            $('.file_name1').append(this.value.replace(/.*[\/\\]/, ''));
        } else {
            $('.certifi_elem1').hide();
            $('#identification1').prop('selectedIndex', 0);
        }
    };

    document.getElementById('personal_certifi2').onchange = function () {
        $('.file_name2').html('');
        if (this.value) {
            $('.certifi_elem2').show();
            $('.file_name2').append(this.value.replace(/.*[\/\\]/, ''));
        } else {
            $('.certifi_elem2').hide();
            $('#address1').prop('selectedIndex', 0);
        }
    };


    jQuery.smoothScroll();



    function chkIdentiFile() {
        if ($('#identification1 option:selected').val() > 0) {
            return true;
        }
    }
    function chkAddrFile() {
        if ($('#address1 option:selected').val() > 0) {
            return true;
        }
    }


    $(document).ready(function () {
        $("#credentail_form").validate({
            //errorClass : "error_label",
            rules: {
                personal_certifi: {
                    required: function () {
                        return chkIdentiFile();
                    }
                },
                personal_certifi2: {
                    required: function () {
                        return chkAddrFile();
                    }
                }
            },
            messages: {
                personal_certifi: {
                    required: "This field is required"
                },
                personal_certifi2: {
                    required: "This field is required"
                }
            }
        });
    });


    $(".checkbox-show").click(function () {
        $(this).parent().parent().find('.hide-check-box-sec').toggle();
        if (jQuery(this).find('img').attr('src') == "images/more-filter-down-arrow.png")
            jQuery(this).find('img').attr('src', "images/more-filter-up-arrow.png");
        else
            jQuery(this).find('img').attr('src', "images/more-filter-down-arrow.png");
    });



    $(function () {

        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true,
        });

    });

    $(document).ready(function () {
        $('.nav_bar').click(function () {
            $('.mob-navigation').toggleClass('visible');
            $('body').toggleClass('opacity');
        });
    });
</script>

@endsection




