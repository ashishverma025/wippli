@extends('sites-student.layout.dashboard')
@section('content')
<div id="content" class="bg-container">
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters" style="">
                <style>
                    .main-bar{
                        background-image:url({{ asset('public/sites/images/dash_bg.jpg')}});
                    position: relative;
                    height:220px;

                    }
                    .dash_bg {
                        position: absolute;
                        top: 30%;
                        left: 28%;
                        z-index: 1;
                    }
                    .dash_bg h4 {

                        font-size: 34px;
                        font-weight: 400;
                    }
                    .dash_bg .dash_btn {
                        background: #565a5c;
                        color: #fff;
                        padding: 8px 23px;
                        border: none;
                    }
                    .main-bar::after {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: #ffffff85;
                    }

                </style>
                <div class="dash_bg text-center">

                    <h4 class="m-t-5">
                        Welcome to Tutify Student Dashboard
                    </h4>
                    <button class="dash_btn">View our School</button>

                </div>
                <!--                <div class="col-4">
                                    <h4 class="m-t-5" style="color: snow">
                                        <i class="fa fa-home"></i>
                                        Dashboard
                                    </h4>
                                </div>
                                <div class="col-3">
                                    <h4 class="m-t-5" style="color: snow">
                                        
                                        Welcome to Your Learning Center Dashboard
                                    </h4>
                                </div>-->
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <!--top section widgets-->
            <div class="row widget_countup">
                <div class="col-12 col-sm-6 col-xl-3">

                    <div id="top_widget1">
                        <div class="front">
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <img src="http://54.179.188.91/public/sites/images/logo.png" >
                                    <!--<i class="fa fa-users"></i>-->
                                </div>
                                <div class="user_font">Learning Center</div>
                                <div id="widget_countup1">{{@$DashboardDetails['LearningCenters']}}</div>
                                <div class="tag-white">
                                    <span id="percent_count1">85</span>%
                                </div>
                                <div class="previous_font">Yearly Users stats</div>
                            </div>
                        </div>
                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5">
                                        <img src="http://54.179.188.91/public/sites/images/logo.png" >
                                    </div>
                                    <div id="widget_countup12">{{@$DashboardDetails['LearningCenters']}}</div>
                                    <div>Students</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="visitsspark-chart"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                    <div id="top_widget2">
                        <div class="front">
                            <div class="bg-success p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="user_font">Classes</div>
                                <div id="widget_countup2">{{$DashboardDetails['classes']}}</div>
                                <div class="tag-white">
                                    <span id="percent_count2">60</span>%
                                </div>
                                <div class="previous_font">Sales per month</div>
                            </div>
                        </div>

                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-success">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div id="widget_countup22">{{$DashboardDetails['classes']}}</div>
                                    <div>Sales</div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="salesspark-chart"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget3">
                        <div class="front">
                            <div class="bg-warning p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="user_font">Subjects</div>
                                <div id="widget_countup3">{{$DashboardDetails['subjects']}}</div>
                                <div class="tag-white ">
                                    <span id="percent_count3">30</span>%
                                </div>
                                <div class="previous_font">Monthly comments</div>
                            </div>
                        </div>

                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-warning">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <div id="widget_countup32">{{$DashboardDetails['subjects']}}</div>
                                    <div>Comments</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="mousespeed"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget4">
                        <div class="front">
                            <div class="bg-danger p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="user_font">Rating</div>
                                <div id="widget_countup4">8</div>
                                <div class="tag-white">
                                    <span id="percent_count4">80</span>%
                                </div>
                                <div class="previous_font">This month ratings </div>
                            </div>
                        </div>

                        <div class="back">
                            <div class="bg-white section_border b_r_5">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-danger">
                                        <i class="fa fa-star-o"></i>
                                    </div>

                                    <div id="widget_countup42">8</div>
                                    <div>Rating</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="rating"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
