@extends('sites.layout.tutor')
@section('content')

<?php
$coverBanner = !empty($userDetails->cover_image) ? $userDetails->id . '/' . $userDetails->cover_image : 'default_banner.jpg';
?>


<div id="banner" class="banneruser">
    <img class="img-responsive" src="{{url('public/sites/images/CoverBanner')}}/{{$coverBanner}}">
    <a href="#" class="banner-edit" data-toggle="modal" data-target="#edit-banner">Change Cover Photo</a>		
</div>


<!-- start Modal -->
<div class="modal fade" id="edit-banner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog login-model">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Banner</h4>
            </div>
            <form action="{{url('changecoverbanner')}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="modal-body" style="height: 150px;">
                    <div class="form-group">
                        <label for="">Banner :</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image">
                    </div>	
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn resources-add" id="saveCoverBanner" userId ="{{@$userDetails->id}}">Save</button>
                    <button type="button" data-dismiss="modal" class="btn resources-cancel">Close</button>
                </div>
            </form>    
        </div>
    </div>
</div>
<!-- end Modal -->


<div id="tutor-profile-secion">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 left-section-main tutor-profile-content sticky-top"> 
                <div class="">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tutor-profile">
                        <span class="tutor-img-cover">
                                        <!-- <span class="tutor-img" style="background: url(http://tutify.com.sg/assets/images/) center no-repeat;"></span> -->
                            <img src="{{ asset('public/sites/images') }}/<?= !empty($userDetails->avatar) ? $imgFolder . '/' . $userDetails->id . '/' . $userDetails->avatar : 'default_profile_user_img.png' ?>" class="tutor-img">
                            <h3>{{@$userDetails->name}}</h3>
                        </span>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 tutor-profile-info">
                        <h3 class="desination">Hey, I’m {{@$userDetails->name}}!</h3>
                        <p>Delhi, India · Member since February 2020</p>
                        <img src="http://tutify.com.sg/assets/images/flag-icon.png"><p class="report-text">Report this user</p>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        <div class="tutor-activities">

                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 center-text">
                                <img class="img-responsive center-block" src="{{url('public/sites/users/img/person-icon.png')}}">
                                <h4>Tutor Services</h4>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 center-text">
                                <img class="img-responsive center-block" src="{{url('public/sites/users/img/person-icon1.png')}}">
                                <h4>Tutor Requests</h4>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 center-text">
                                <img class="img-responsive center-block" src="{{url('public/sites/users/img/book-icon.png')}}">
                                <h4>Shared Resources</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding user_profile_2">
                        <div class="tutor-about-child-sec clearfix ">
                            <h3>About Me</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam faucibus tempor magna vitae scelerisque. Sed consequat fermentum maximus. Fusce tellus lorem, imperdiet ac ullamcorper id, volutpat at mi. Sed sodales lacus vel molestie consectetur. Curabitur quam felis, eleifend non lacinia in, laoreet ut neque. Curabitur non rhoncus erat, a vehicula lacus. Mauris vitae faucibus erat. Integer commodo tellus vel lorem ullamcorper, eu viverra orci vestibulum. Ut est erat, finibus vitae ante et, finibus condimentum dui. Etiam in est interdum tellus iaculis viverra. In congue sapien vitae convallis ultrices. Integer eget fermentum sapien, sit amet imperdiet nisl. Praesent ullamcorper purus et ante faucibus volutpat. Vivamus ultricies, justo sed gravida bibendum, ante magna ornare nibh, pretium imperdiet magna magna non nisl. Praesent scelerisque, ante eget pellentesque faucibus, nunc neque fermentum justo, vel dictum velit arcu eget metus. Suspendisse sodales odio eget convallis aliquam.
                            </p>
                        </div>

                        <!-- Refrence site tab not working -->
                        <!--<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <ul class="resp-tabs-list hor_1">
                                <li class="resp-tab-item hor_1 resp-tab-active" aria-controls="hor_1_tab_item-0" role="tab" style="background-color: rgb(255, 255, 255); border-color: rgb(237, 239, 237);">Tuition Services</li>
                                <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-1" role="tab" style="background-color: rgb(237, 239, 237);">Tuition Requests</li>
                            </ul>
                            <div class="resp-tabs-container clearfix hor_1" style="border-color: rgb(193, 193, 193);">
                                <h2 class="resp-accordion hor_1 resp-tab-active" role="tab" aria-controls="hor_1_tab_item-0" style="background: none; border-color: rgb(237, 239, 237);"><span class="resp-arrow"></span>Tuition Services</h2><div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                                    <div class="recent-request">
                                        <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                        <div class="recent-post-date">
                                            $520/mo
                                            <span>18 hours ago</span>
                                        </div>
                                    </div>
                                    <div class="recent-request">
                                        <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                        <div class="recent-post-date">
                                            $520/mo
                                            <span>18 hours ago</span>
                                        </div>
                                    </div>
                                    <div class="recent-request">
                                        <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                        <div class="recent-post-date">
                                            $520/mo
                                            <span>18 hours ago</span>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-1" style="background-color: rgb(237, 239, 237); border-color: rgb(237, 239, 237);"><span class="resp-arrow"></span>Tuition Requests</h2><div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-1" style="border-color: rgb(237, 239, 237);">
                                    <div class="recent-request">
                                        <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                        <div class="recent-post-date">
                                            S$420/mo
                                            <span>18 hours ago</span>
                                        </div>
                                    </div>
                                    <div class="recent-request">
                                        <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                        <div class="recent-post-date">
                                            S$420/mo
                                            <span>18 hours ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div id="horizontalTab">
                            <div role="tabpanel" class="horizontalTab">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs resp-tabs-list" role="tablist">
                                    <li role="presentation" class="resp-tab-item active"><a href="#TuitionServices" aria-controls="Tuition Services" role="tab" data-toggle="tab">Tuition Services</a></li>
                                    <li role="presentation" class="resp-tab-item"><a href="#TuitionRequests" aria-controls="Tuition Requests" role="tab" data-toggle="tab">Tuition Requests</a></li>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content resp-tabs-container">
                                    <div role="tabpanel" class="tab-pane active" id="TuitionServices">
                                        <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                                            <div class="recent-request">
                                                <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                                <div class="recent-post-date">
                                                    $520/mo
                                                    <span>18 hours ago</span>
                                                </div>
                                            </div>
                                            <div class="recent-request">
                                                <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                                <div class="recent-post-date">
                                                    $520/mo
                                                    <span>18 hours ago</span>
                                                </div>
                                            </div>
                                            <div class="recent-request">
                                                <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                                <div class="recent-post-date">
                                                    $520/mo
                                                    <span>18 hours ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="TuitionRequests">
                                        <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                                            <div class="recent-request">
                                                <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                                <div class="recent-post-date">
                                                    $520/mo
                                                    <span>18 hours ago</span>
                                                </div>
                                            </div>
                                            <div class="recent-request">
                                                <h4>J2 H2 Chemistry @ Tampines Street 13 (Private)</h4>
                                                <div class="recent-post-date">
                                                    $520/mo
                                                    <span>18 hours ago</span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>



                        <!--                        <div id="favourite-tutor">
                                                    <h3>favourite tutors</h3>
                                                    <div id="owl-demo" class="owl-carousel owl-theme">
                                                        <div class="item"> <img src="http://tutify.com.sg/assets/images/img-7.jpg"><span class="slider-name">Jane</span></div>
                                                        <div class="item"> <img src="http://tutify.com.sg/assets/images/img-2.jpg" alt="Los Angeles"><span class="slider-name">Jane</span></div>
                                                        <div class="item"> <img src="http://tutify.com.sg/assets/images/img-3.jpg" alt="Los Angeles"><span class="slider-name">Jane</span></div>
                                                        <div class="item"> <img src="http://tutify.com.sg/assets/images/img-4.jpg" alt="Los Angeles"><span class="slider-name">Jane</span></div>
                                                        <div class="item"> <img src="http://tutify.com.sg/assets/images/img-5.jpg" alt="Los Angeles"><span class="slider-name">Jane</span></div>
                                                        <div class="item"> <img src="http://tutify.com.sg/assets/images/img-6.jpg" alt="Los Angeles"><span class="slider-name">Jane</span></div>
                                                        <div class="item"> <img src="http://tutify.com.sg/assets/images/img-7.jpg" alt="Los Angeles"><span class="slider-name">Jane</span></div>
                                                    </div>
                                                    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div>
                        
                                                    <style>
                                                        #owl-demo .item{
                                                            margin: 3px;
                                                        }
                                                        #owl-demo .item img{
                                                            display: block;
                                                            width: 100%;
                                                            height: auto;
                                                        }
                                                    </style>
                                                    <script>
                                                        $(document).ready(function () {
                        
                                                            $("#owl-demo").owlCarousel({
                        
                                                                autoPlay: 3000, //Set AutoPlay to 3 seconds
                        
                                                                items: 4,
                                                                itemsDesktop: [1199, 3],
                                                                itemsDesktopSmall: [979, 3]
                        
                                                            });
                        
                                                        });
                                                    </script>
                                                </div>-->

                        <!--<div id="favourite-tutor">
                            <h3>favourite tutors</h3>
                            <div class="owl-carousel owl-theme text-center"  >
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper" >
                                        <div class="owl-item" style="width: 165px;"><div class="item">
                                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-7.jpg"><span class="slider-name">Jane</span>
                                            </div></div>
                                        <div class="owl-item" style="width: 165px;"><div class="item">
                                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-4.jpg"><span class="slider-name">Jane</span>
                                            </div></div>
                                        <div class="owl-item" style="width: 165px;"><div class="item">
                                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-5.jpg"><span class="slider-name">Jane</span>
                                            </div></div>
                                        <div class="owl-item" style="width: 165px;"><div class="item">
                                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-6.jpg"><span class="slider-name">Jane</span>
                                            </div></div>
                                        <div class="owl-item" style="width: 165px;"><div class="item">
                                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-3.jpg"><span class="slider-name">Jane</span>
                                            </div></div>
                                        <div class="owl-item" style="width: 165px;"><div class="item">
                                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-2.jpg"><span class="slider-name">Jane</span>
                                            </div></div>
                                    </div>
                                </div>
                                <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div>
                            </div>
                        </div>-->

                        <style>


                        </style>

                        <div id="favourite-tutor">
                            <h3>favourite tutors</h3>
                            <div id="tutor-slider" class="owl-carousel owl-theme">
                                <div class="item"><img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-7.jpg"><span class="slider-name">Jane</span></div>
                                <div class="item"><img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-4.jpg"><span class="slider-name">Jane</span></div>
                                <div class="item"><img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-5.jpg"><span class="slider-name">Jane</span></div>
                                <div class="item"><img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-5.jpg"><span class="slider-name">Jane</span></div>
                                <div class="item"><img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-6.jpg"><span class="slider-name">Jane</span></div>
                                <div class="item"> <img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-3.jpg"><span class="slider-name">Jane</span></div>
                                <div class="item"> <img class="img-reponsive" src="http://tutify.com.sg/assets/images/img-3.jpg"><span class="slider-name">Jane</span></div>

                            </div>

                        </div>



                        <div id="recent-download-sec">
                            <h3>Uploaded Resources</h3>
                            <div class="">
                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/rec-download-1.jpg">
                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/rec-download-2.jpg">
                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/rec-download-3.jpg">
                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/rec-download-4.jpg">
                                <img class="img-reponsive" src="http://tutify.com.sg/assets/images/rec-download-5.jpg">
                            </div>
                            <a href="" class="more-btn">
                                <div class="box">
                                    <input type="file" name="file-4[]" id="file-4" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple />
                                    <label for="file-4"><span>+ More file&hellip;</span></label>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pull-left sticky-top">
                <div class="req-form-main">
                    <div class="req-form-container">
                        <div class="request-form">
                            <div class="req-header">
                                <h1>Verifications</h1>
                            </div>
                            <div class="request-form-content">
                                <ul>
                                    <li>
                                        <h4>email address</h4>
                                        <h4><span>{{@$userDetails->email}}(Not Verified)</span></h4>
                                    </li>
                                    <li>
                                        <h4>phone number</h4>
                                        <h4><span>{{@$userDetails->phone}}(Not Verified)</span></h4>
                                    </li>
                                    <li>
                                        <h4>address</h4>
                                        <h4><span>{{@$userDetails->address}}(Not Validated) </span></h4>
                                    </li>

                                    <li class="more_verify" style="display:none;">
                                        <h4>Google Plus</h4>
                                        <h4><span></span></h4>
                                    </li>
                                    <li class="more_verify" style="display:none;">
                                        <h4>Facebook</h4>
                                        <h4><span></span></h4>
                                    </li>
                                    <div class="addbtn red clearfix add-more" id="h">Add More</div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="reviews-section">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 pull-left left-section-main">
            <div class="review-header-sec">
                <div class="header-review-stars">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 nopadding header-review-stars-left">
                        <p>10 Reviews</p><img class="img-responsive" src="http://tutify.com.sg/assets/images/star-ranking.png">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 nopadding header-review-stars-search">
                        <input type="text" class="review-search" placeholder="Search Reviews">
                    </div>
                </div>
            </div>

            <div class="review-summery clearfix">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 nopadding">
                    Summary
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 review-summery-list">
                    <li><h4>Accuracy</h4><img class="img-responsive" src="http://tutify.com.sg/assets/images/star-ranking.png"></li>
                    <li><h4>Communication</h4><img class="img-responsive" src="http://tutify.com.sg/assets/images/star-ranking.png"></li>
                    <li><h4>Cleanliness</h4><img class="img-responsive" src="http://tutify.com.sg/assets/images/star-ranking.png"></li>
                    <li><h4>Location</h4><img class="img-responsive" src="http://tutify.com.sg/assets/images/star-ranking.png"></li>
                    <li><h4>Check In</h4><img class="img-responsive" src="http://tutify.com.sg/assets/images/star-ranking.png"></li>
                    <li><h4>Value</h4><img class="img-responsive" src="http://tutify.com.sg/assets/images/star-ranking.png"></li>
                </div>
                <a class="review-english-btn" href="#">Show All</a>
            </div>

            <div class="user-reviews-section">
                <div class="review-block">
                    <div class="col-sm-3 col-md-3 col-lg-3 text-center user-profile">
                        <span class="user-pro-img-cover">
                            <span class="user-img-icon" style="background:url(http://tutify.com.sg/assets/images/profile-pic.png) center no-repeat"></span>
                            <h4>Robin</h4>
                        </span>
                    </div>
                    <div class="col-sm-9 col-md9 col-l9-10 review-desc">
                        <p>Great experience stay at your place sin,what a jacuzzi bath,love it and your place is so home and clean,tidy and Apple TV is a plus too,onto Arigato gozaimasu ain San,would love to stay again when we go to Osaka next time,bye see you soon.</p>
                        <h4 class="review-date">January 2016</h4>
                        <a class="like-box" href=""><img class="img-responsive" src="http://tutify.com.sg/assets/images/thumb.png">Helpful</a>
                    </div>
                </div>

                <!-- Pagination --->
                <nav class="page-pagination">
                    <ul class="pagination text-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>

<script>


    $(document).ready(function () {

        if (window.innerWidth >= 768) {
            $('.sticky-top').stick_in_parent({offset_top: 40});
        }

        $(window).resize(function () {
            if (window.innerWidth >= 768) {
                $('.sticky-top').stick_in_parent({recalc_every: 1, offset_top: 0});
            } else {
                $('.sticky-top').trigger("sticky_kit:detach");
            }
        });

    });

</script>

<script>

    $(document).ready(function () {
        // To edit user
        $(document).on('click', '#saveCoverBanner', function () {
            var userId = $(this).attr('userID');
            $this = $(this);
            var form_data = new FormData();
            var cover_image = $('#cover_image').prop('files')[0];
            // for image file
            form_data.append('cover_image', cover_image);
            console.log(form_data)

            // Get the details of the selected agency
            $.ajax({
                url: $('meta[name="route"]').attr('content') + '/changecoverbanner',
                method: 'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response)
                    if (response.resCode == 0) {
                        location.reload()
                    }

                }
            });
        });
    });

</script>
@endsection