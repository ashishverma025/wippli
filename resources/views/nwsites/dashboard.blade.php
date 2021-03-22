@extends('nwsites.layout.sites')
@section('content')
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" style="width:85%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Wippli</h4>
            </div>
            <div class="modal-body" id="popupFormModal"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<section class="dashboard mt-5">
    <div class="container">
        <div class="row">
            <!-- Col-3 --> 
            <div class="col-lg-3">
                <div class="left-board">
                    <div class="left-id mb-3">
                        <div class="img">
                            
                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="logo">
                        </div>
                        <div class="img-txt">
                            <h2>Hi {{@$userDetails->fname}}!</h2>
                            <b>{{@$userDetails->company}}</b>
                            <!-- <span>29 Dec 11:39 am</span> -->
                        </div>
                    </div>
                    <a href="{{url('new-wippli')}}" id="popUpform">New Wippli</a>

                    <!-- @if(checkWippliPermission(@$userDetails->user_type)) -->
                    <!-- <a href="{{url('new-wippli')}}" id="popUpform">New Wippli</a> -->
                    <!-- @else
                    <a href="#" onclick="return confirm('You don\'t have permission to add wippli please contact to Super Admin')" >New Wippli</a>
                    @endif -->
                </div>
                <div class="left-board left-board-second mt-5">
                    <a href="#">What's on</a>
                    <div class="left-inner-box grid-board-second">

                        @if(!empty($NewWippli))
                        @foreach($NewWippli as $wippli)
                        <div class="box">
                            <!--<a href="{{url('wippliDetails').'/'.$wippli->id}}" >-->
                            <div class="box-img">
                                <?php
                                $uId = $wippli->userId;
                                
                                $img =  !empty($wippli->attachment) ? explode('.',$wippli->attachment):"";
                                $extn = $img?$img[1]:'';
                                $wippliImage = !empty($wippli->attachment) ? "public/sites/images/wippli-image/$uId/$wippli->attachment" : 'public/wippli/img/logo-icn.png';
                                $extns = ['jpg','jpeg','png','gif'];
                                $fileImg = !in_array($extn, $extns)?asset('/assets/sites/img/file.png'):url($wippliImage); 
                                
                                ?>
                                <img src="{{url($fileImg)}}" alt="">
                            </div>
                            <div class="box-txt">
                                <em>{{$wippli->updated_at}} min ago</em>
                                <p><b>{{$wippli->name}}</b> from <b>Boomi</b> created a <b>New Wippli</b> for <b>{{$wippli->project_name}}</b></p>
                            </div>
                            <!--</a>-->
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!-- Col-3 End --> 
            <!-- Col-9 -->         
            <div class="col-lg-9">
                <div class="form1 form inner-position form_third">
                    <div class="form_inner">
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="header_progress">
                                        <p class = "task-track"> This Week</p>
										<p> Genrated | Completed</p>
                                        <div class="rating col-lg-6">
                                            <span><b>{{$recordCount['generated']['week']}}</b> </span> 
                                        </div>
										<div class="rating col-lg-6">
                                            <span><b>{{$recordCount['completed']['week']}}</b> </span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="header_progress">
                                        <p class = "task-track"> This month</p>
										<p>Genrated | Completed</p>
                                        <div class="rating col-lg-6">
                                            <span><b>{{$recordCount['generated']['month']}}</b> </span> 
                                        </div>
										<div class="rating col-lg-6">
                                            <span><b>{{$recordCount['completed']['week']}}</b> </span> 
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="header_progress border-zero">
                                        <p class = "task-track">This Year</p>
										<p>Genrated | Completed</p>
                                        <div class="rating col-lg-6">
                                            <span><b>{{$recordCount['generated']['year']}}</b> </span> 
                                        </div>
										<div class="rating col-lg-6">
                                            <span><b>{{$recordCount['completed']['year']}}</b> </span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<hr/>
                        <div class="form-txt-third">
                            <div class="tabs">
                                <form>
                                   <!-- <ul class="nav nav-tabs third-tab">
                                        <li class="active"><a data-toggle="tab" href="#home">With Brannium</a></li>
                                        <li><a data-toggle="tab" href="#menu1">With My Team</a></li>
                                        <li><a data-toggle="tab" href="#menu2">With Dell Boomi</a></li>
                                    </ul> -->
									
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                    
                                            <div class="row">
                                                <div class="col-lg-4 p-3">
                                                    <div class="sec_head">
                                                        To do
                                                    </div>
                                                    <!--Accordion wrapper-->
                                                    <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                           <!-- <div class="card-header" role="tab" id="headingTwo1">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                                                                   aria-expanded="false" aria-controls="collapseTwo1">
                                                                    <h5 class="mb-0">
                                                                        To Allocate <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div> -->
                                                            <!-- Card body -->
                                                            <div id="collapseTwo1" class="collapse in" role="tabpanel" aria-labelledby="headingTwo1"
                                                                 data-parent="#accordionEx1">
                                                                <div class="card-body">
                                                                    <div class="card-txt">

                                                                        @if(!empty($NewWippli))
                                                                        @foreach($NewWippli as $wippli)
                                                                        <a href="{{url('wippliDetails').'/'.$wippli->id}}" >
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div class="small_company_logo">
                                                                                        <?php
                                                                                        $uId = $wippli->userId;

                                                                                        $img =  !empty($wippli->attachment) ? explode('.',$wippli->attachment):"";
                                                                                        $extn = $img?$img[1]:'';
                                                                                        $wippliImage = !empty($wippli->attachment) ? "public/sites/images/wippli-image/$uId/$wippli->attachment" : 'public/wippli/img/logo-icn.png';
                                                                                        $extns = ['jpg','jpeg','png','gif'];
                                                                                        $fileImg = !in_array($extn, $extns)?asset('/assets/sites/img/file.png'):url($wippliImage); 
                                                                                       
                                                                                        ?>
                                                                                        <img src="{{ url($fileImg) }}" alt="icn">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-9">
                                                                                    <div class="company_txt">
                                                                                        <span class="time">{{$wippli->updated_at}}</span>
                                                                                        <p>{{$wippli->name}} has created a New Wippli for {{$wippli->project_name}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Accordion card -->
                                                    </div>
                                                    <!-- Accordion wrapper -->
                                                </div>
                                                <!--****-->   
                                                <div class="col-lg-4 p-3">
                                                    <div class="sec_head">
                                                        Work in progress
                                                    </div>
                                                    <!--Accordion wrapper 6-->
                                                    <div class="accordion md-accordion" id="accordionEx2" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                           <!-- <div class="card-header" role="tab" id="headingTwo4">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseTwo4"
                                                                   aria-expanded="false" aria-controls="collapseTwo4">
                                                                    <h5 class="mb-0">
                                                                        Allocated <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div> -->
                                                            <!-- Card body -->
                                                            <div id="collapseTwo4" class="collapse in" role="tabpanel" aria-labelledby="headingTwo4"
                                                                 data-parent="#accordionEx2">
                                                                <div class="card-body">
                                                                    <div class="card-txt">

                                                                        @if(!empty($userAllocate))
                                                                        @foreach($userAllocate as $allocate)

                                                                        <a href="{{url('wippliDetails').'/'.$allocate->id}}" >
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div class="small_company_logo">
                                                                                        <?php
                                                                                        $uId = $allocate->userId;
                                                                                        
                                                                                        $img =  !empty($allocate->attachment) ? explode('.',$allocate->attachment):"";
                                                                                        $extn = $img?$img[1]:'';
                                                                                        $wippliImage = !empty($allocate->attachment) ? "public/sites/images/wippli-image/$uId/$allocate->attachment" : 'public/wippli/img/logo-icn.png';
                                                                                        $extns = ['jpg','jpeg','png','gif'];
                                                                                        $fileImg = !in_array($extn, $extns)?asset('/assets/sites/img/file.png'):url($wippliImage); 
                                                                                       
                                                                                        
                                                                                        ?>
                                                                                        <img src="{{url($fileImg)}}" alt="icn">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-9">
                                                                                    <div class="company_txt">
                                                                                        <span class="time">{{$allocate->created_at}} AM</span>
                                                                                        <p>{{@$allocate->project_name}}  has created a New Wippli for {{@$wippli->project_name}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Accordion card -->
                                                    </div>
                                                    <!-- Accordion wrapper -->
                                                </div>
                                                <!--****--> 
                                                <div class="col-lg-4 p-3">
                                                    <div class="sec_head">
                                                        Completed
                                                    </div>
                                                    <!--Accordion wrapper 9-->
                                                    <div class="accordion md-accordion" id="accordionEx3" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                           <!-- <div class="card-header" role="tab" id="headingTwo1">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx3" href="#collapseTwo7"
                                                                   aria-expanded="false" aria-controls="collapseTwo7">
                                                                    <h5 class="mb-0">
                                                                        Delivered <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div> -->
                                                            <!-- Card body -->
                                                            <div id="collapseTwo7" class="collapse in" role="tabpanel" aria-labelledby="headingTwo7"
                                                                 data-parent="#accordionEx3">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        
                                                                    @if(!empty($wippliCompleted))
                                                                        @foreach($wippliCompleted as $wippli)
                                                                        <a href="{{url('wippliDetails').'/'.$wippli->id}}" >
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div class="small_company_logo">
                                                                                        <?php
                                                                                        $uId = $wippli->parent_id;
                                                                                        $img =  !empty($wippli->attachment) ? explode('.',$wippli->attachment):"";
                                                                                        $extn = $img?$img[1]:'';
                                                                                        $wippliImage = !empty($wippli->attachment) ? "public/sites/images/wippli-image/$uId/$wippli->attachment" : 'public/wippli/img/logo-icn.png';
                                                                                        $extns = ['jpg','jpeg','png','gif'];
                                                                                        $fileImg = !in_array($extn, $extns)?asset('/assets/sites/img/file.png'):url($wippliImage); 
                                                                                        
                                                                                        ?>
                                                                                        <img src="{{ url($fileImg) }}" alt="icn">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-9">
                                                                                    <div class="company_txt">
                                                                                        <span class="time">{{$wippli->created_at}}</span>
                                                                                        <p>{{$wippli->name}} has created a New Wippli for {{$wippli->project_name}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        @endforeach
                                                                    @endif
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Accordion card -->
                                                    </div>
                                                    <!-- Accordion wrapper -->
                                                </div>
                                                <!--****--> 
                                            </div>
                                        </div>
                                        
                                        <!--********************************************************************************************-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="wippli-ftr">
                        <div class="wippli-ftr-inner">
                            <p>Powered by</p>
                            <img src="{{ asset('assets/sites/img/tasc-logo.png') }}" alt="">
                        </div>
                    </div>
                </div>
              
            </div>
            <!-- Col-9 End --> 
        </div>
    </div>
</section>
@endsection