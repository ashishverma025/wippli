@extends('nwsites.layout.sites')
@section('content')
<?php
$uDetails = getUserDetails();
$uId = $NewWippli->user_id;
$uEmail = $uDetails->email;
$uName = $uDetails->name;
$wippliImage = !empty($NewWippli->attachment) ? "public/sites/images/wippli-image/$uId/$NewWippli->attachment" : 'public/wippli/img/logo-icn.png';
?>
<section class="dashboard mt-5">
    <div class="container">
        <div class="row">
            <!-- Col-3 --> 
            <div class="col-lg-3">
                <div class="left-board">
                    <div class="left-id mb-3">
                        <div class="img">
                            @if(!empty($NewWippli->business_name))
                            <img src="{{ url('public/wippli/img/bimmo_logo.jpg') }}" alt="logo">
                            @else
                            <img src="{{asset('/assets/sites')}}/img/demo.png" alt="logo"> 
                            @endif
                        </div>
                        <div class="img-txt">
                        <h2>Hi {{@$userDetails->fname}}!</h2>
                            <b>{{@$userDetails->company}}</b>
                            <!-- <span>{{ $NewWippli->created_at }} </span> -->
                        </div>
                    </div>
                    <a href="{{url('new-wippli')}}">New Wippli</a>
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
                                    <h3>Task: Forrester Banners - adjust</h3>
                                </div>
                                <div class="col-lg-6">
                                    <div class="logo">
                                        <img src="{{ asset('assets/sites/img/tasc-logo.png') }}" alt="logo">
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3 pb-3">
                                <div class="col-lg-12">
                                    <div class="bdr"></div>
                                </div>
                            </div>
                            <div class="row wippli-detail-info">
                                <div class="col-lg-6">
                                    <div class="detail-info-left">
                                        <span><img src="{{asset('/assets/sites')}}/img/demo.png" alt=""> <strong>Valerie Earth</strong> - Marketing </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="detail-info-right text-right">
                                        <!-- <em>Dell Boomi - Australia</em> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form>
                            <!-- 1 -->
                            <div class="business-name space-form-group">
                                <!-- box -->
                                <div class="twotab-content-box wippli-detail-data">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-clipboard"></i> The Wippli</h3>
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
                                            <h4>Job Name / title</h4>
                                        </div>

                                        <div class="col-lg-9">
                                            <span><b>{{@$NewWippli->project_name}}</b></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h4>Deadline</h4>
                                        </div>

                                        <div class="col-lg-9">
                                            <span>{{@$NewWippli->deadline}}</span>
                                        </div>
                                    </div>

                                 

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h4>Instruction</h4>
                                        </div>

                                        <div class="col-lg-9">
                                            <span>{{@$NewWippli->instruction}}</span>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h4>Attachments</h4>
                                        </div>

                                        <div class="col-lg-9">
                                            <ul>
                                                <li> <span>
                                                        <?php
                                                        $uDetails = getUserDetails();
                                                        $uId = $uDetails->id;
                                                        $img =  !empty($NewWippli->attachment) ? explode('.',$NewWippli->attachment):"";
                                                        $extn = $img?$img[1]:'';
                                                        $wippliImage = !empty($NewWippli->attachment) ? "public/sites/images/wippli-image/$NewWippli->user_id/$NewWippli->attachment" : 'public/wippli/img/logo-icn.png';
                                                        $extns = ['jpg','jpeg','png','gif'];
                                                        $fileImg = !in_array($extn, $extns)?asset('/assets/sites/img/file.png'):url($wippliImage); 
                                                        ?>
                                                        <a href="{{url($wippliImage)}}" target="_blank" download><img src="{{url($fileImg)}}" alt="icn" height="50" width="50" ></a>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- box -->


                                <div class="twotab-content-box">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-6">
                                            <h3><i class="far fa-clipboard"></i> Allocate</h3>
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
                                        <div class="col-lg-12">
                                            <div class="small-txt"><span><b>Task: Forrester Banner - adjust</b> </span></div>
                                        </div>

                                    </div>
                                    <input type="hidden" id="business_id" value="{{@$NewWippli->bId}}">

                                    <div class="row dropdown-grid">

                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <div class="to"><span>To</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <div class="dropdown">
                                                    <select class="form-control" name="toUser" id="toUser">
                                                        <option>select</option>
                                                        @if(!empty($allBusinessUsers))
                                                        @foreach($allBusinessUsers as $bUsers)
                                                        <option value="{{$bUsers->userId}}" data-email="{{$bUsers->email}}">{{$bUsers->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <i class="fa fa-plus-circle"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email_address" id="email_address" placeholder="Email Address" value="" >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row dropdown-grid" style="display: none;">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Message</label>

                                                <textarea class="form-control" name="message" id="message" placeholder="Message" ></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row boomi_btn">
                                    <?php 
                                        $sts = empty($wippliAllocate) ? 'block' : ($wippliAllocate->status == 'Active'?'block':'none');
                                    ?>
                                        <div class="col-lg-4 col-sm-3" style="display:{{$sts}}">
                                            <a href="#" id="allocateBtn" data-email="{{@$NewWippli->email}}" data-id="{{@$NewWippli->id}}">ALLOCATE</a>
                                        </div>
                                        
                                        <div class="col-lg-4 col-sm-3">
                                            <a id="takeOn" data-email="{{@$uEmail}}" data-uid="{{@$uId}}" data-wid="{{@$NewWippli->id}}">TAKE ON</a>
                                        </div>

                                        @if(empty($wippliComplete))
                                        <div class="col-lg-4 col-sm-3">
                                            <a id="completeBtn" data-uid="{{@$uId}}" data-wid="{{@$NewWippli->id}}">Complete</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>



                                <!-- box -->


                                <div class="twotab-content-box">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-7">
                                            <h3><i class="fa fa-dollar-sign"></i> Comments: Forrester Banners - adjust <i class="fa fa-question-circle"></i></h3>
                                        </div>
                                        <div class="col-lg-5">
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


                                    @if(!empty($wippliComment))
                                    @foreach($wippliComment as $wcomment)
                                    <div class="comments">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group-box">
                                                    <div class="comment-img">
                                                        <img src="{{asset('/assets/sites')}}/img/demo.png" alt="img">
                                                    </div>
                                                    <div class="img-txt">
                                                        <b>{{$wcomment->name}}</b>
                                                        <p>{{$wcomment->created_at}}</p>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group-box form-group-txt">
                                                    <p>{{$wcomment->comment}}</p>
                                                </div>
                                            </div>
                                            @if(!empty($wcomment->commentfile))
                                            <div class="col-lg-2">
                                                <?php
                                                    $img =  !empty($wcomment->commentfile) ? explode('.',$wcomment->commentfile):"";
                                                    $extn = $img?$img[1]:'';
                                                    $wippliImage = !empty($wcomment->commentfile) ? "public/sites/images/wippli-comment/$wcomment->wippli_id/$wcomment->commentfile" : 'public/wippli/img/logo-icn.png';
                                                    $extns = ['jpg','jpeg','png','gif'];
                                                    $fileImg = !in_array($extn, $extns)?asset('/assets/sites/img/file.png'):url($wippliImage); 
                                                ?>
                                                <a href="{{url($wippliImage)}}" target="_blank" download><img src="{{url($fileImg)}}" alt="icn" height="30" width="30" ></a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>                                    
                                    @endforeach
                                    @endif

                                    <div class="comments comments-typ ">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group-box">
                                                    <div class="comment-img">
                                                        <!-- <img src="{{asset('/assets/sites')}}/img/demo.png" alt="img"> -->
                                                    </div>
                                                    <div class="img-txt">
                                                        <b>write here <i class="fa fa-chevron-right"></i></b>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group-box form-group-txt">
                                                    <textarea id="comment" class="form-control" placeholder="Great Thank you!" value=""></textarea>
                                                    <div class="post-btn">
                                                        <ul>
                                                            <li><a  id="commentBtn" data-email="{{@$NewWippli->email}}" data-id="{{@$NewWippli->id}}">Post</a></li>
                                                            <li><input type="file" id="commentfile" name="commentfile" ></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- box -->


                                {{--<div class="twotab-content-box">
                                    <div class="row twotab-content-header">
                                        <div class="col-lg-7">
                                            <h3><i class="fa fa-dollar-sign"></i> Incident <i class="fa fa-question-circle"></i></h3>
                                        </div>
                                        <div class="col-lg-5">
                                            <ul>
                                                <li><i class="fa fa-bars"></i></li>
                                                <li><i class="fa fa-times"></i></li>
                                                <li><i class="fa fa-chevron-down"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="bdr"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="small-txt"><span><b>Task: Forrester Banner - adjust</b> </span></div>
                                        </div>             
                                    </div>

                                    <div class="comments">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group-box">
                                                    <div class="comment-img">
                                                        <img src="{{asset('/assets/sites')}}/img/demo.png" alt="img">
                                                    </div>
                                                    <div class="img-txt">
                                                        <b>Valery Earth</b>
                                                        <p>Monday 28 Dec 2020 03:32 pm</p>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group-box form-group-list">
                                                    <ul>
                                                        <!--<li><b>Date</b> <span><input type="date" name="incedent_type" id="incedent_type" placeholder="09 December 2020"></span></li>-->
                                                        <li><b>Type of incident</b> <input type="text" name="incedent_type" id="incedent_type" placeholder="Incedent type"></li>
                                                        <li><b>Description</b> <textarea name="description" id="description" placeholder="Description"></textarea></li>
                                                        <li><b>Implications</b><input type="text" class="form-control" name="implications" id="implications" placeholder="Implications" ></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>--}}

                                <!-- box -->
                            </div>
                            <!-- 2end -->   
                        </form>
                        <div class="wippli-ftr light-blu">
                            <div class="wippli-ftr-inner">
                                <p>Powered by</p>
                                <img src="{{asset('/assets/sites')}}/img/tasc-logo.png" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Col-9 End --> 
        </div>
    </div>
</section>
@endsection