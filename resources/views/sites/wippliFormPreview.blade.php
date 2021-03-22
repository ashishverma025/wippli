<!--------------------------  form1  -------------------------->
<section class="form1 form boomi">
    <div class="container" style="width:100% !important">
        <div class="row">

            <div class="col-lg-9">
                <div class="form_inner">
                    <div class="header bimmo_header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="logo">
                                    @if(!empty($NewWippli->business_name))
                                    <img src="{{ url('public/wippli/img/bimmo_logo.jpg') }}" alt="logo">
                                    @else
                                    <img src="{{ url('public/wippli/images/BusinessLogo') }}/{{$NewWippli->business_name}}" alt="logo"> 
                                    @endif
                                </div>
                                <div class="wipl_logo">
                                    Wippli
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-txt boomi_txt">
                                <em>{{ $NewWippli->business_name }} - {{ $NewWippli->business_branch }}</em>
                                <h3>Task: {{$NewWippli->project_name}}</h3>
                                <span>
                                    <p>{{ $NewWippli->name }}</p>
                                    {{ $NewWippli->first_name }} {{ $NewWippli->surname }} - {{ $NewWippli->department }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="bimmo_collaps">
                        <!--Accordion wrapper-->
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                            <!-- Accordion card -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingOne1">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                                       aria-controls="collapseOne1">
                                        <h5 class="mb-0">
                                            The Wippli <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <!-- Card body -->
                                <div id="collapseOne1" class="collapse show show" role="tabpanel" aria-labelledby="headingOne1"
                                     data-parent="#accordionEx">
                                    <div class="card-body">
                                        <div class="wippli_drop">
                                            <div class="drp_txt">
                                                <b>Project Name/title</b> 
                                                <p>{{@$NewWippli->project_name}}</p>
                                            </div>
                                            <div class="drp_txt">
                                                <b>Deadline</b> 
                                                <p>{{@$NewWippli->deadline}}</p>
                                            </div>
                                            <div class="drp_txt">
                                                <b>Objective</b> 
                                                <p>{{@$NewWippli->objective}}</p>
                                            </div>
                                            <div class="drp_txt">
                                                <b>Instruction</b> 
                                                <p>{{@$NewWippli->instruction}}
                                                </p>
                                            </div>
                                            <div class="drp_txt">
                                                <b>Message/Copy</b> 
                                                <p>{{@$NewWippli->message}}</p>
                                            </div>
                                            <div class="drp_txt">
                                                <b>Format</b> 
                                                <p>{{@$NewWippli->message}}</p>
                                            </div>
                                            <div class="drp_txt">
                                                <b>Attachment</b> 
                                                <p>{{@$NewWippli->message}}</p>
                                                <?php
                                                $uDetails = getUserDetails();
                                                $uId = $uDetails->id;
                                                $uEmail = $uDetails->email;
                                                $uName = $uDetails->name;
                                                $wippliImage = !empty($NewWippli->attachment) ? "public/sites/images/wippli-image/$uId/$NewWippli->attachment" : 'public/wippli/img/logo-icn.png';
                                                ?>
                                                <img src="{{url($wippliImage)}}" alt="icn" height="50" width="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion card -->
                            <!-- Accordion card -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingTwo2">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                       aria-expanded="false" aria-controls="collapseTwo2">
                                        <h5 class="mb-0">
                                            Job Name <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <!-- Card body -->
                                <div id="collapseTwo2" class="collapse show" role="tabpanel" aria-labelledby="headingTwo2"
                                     data-parent="#accordionEx">
                                    <div class="card-body">
                                        <div class="row boomi_form">
                                            <div class="col-lg-12">
                                                <div class="fields">
                                                    <form>
                                                        <b>The job name for Forrester Banners - adjust is looking like this:</b>
                                                        <ul>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Client</label>
                                                                    <input type="text" class="form-control" placeholder="" value="{{@$NewWippli->business_name}}" disabled>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Title</label>
                                                                    <input type="text" class="form-control" placeholder="ForresterEvent" value="{{@$NewWippli->project_name}}" disabled>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Type</label>
                                                                    <input type="text" class="form-control" placeholder="Banner" value="{{@$NewWippli->type}}" disabled>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Date(3+4)</label>
                                                                    <input type="text" class="form-control" placeholder="Aug2020" value="{{@$NewWippli->deadline}}" disabled>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Job Number</label>
                                                                    <input type="text" class="form-control" placeholder="BOVQ123" value="" disabled>

                                                                </div>
                                                            </li>
                                                            <li class="center_line">
                                                                <div class="form-group">
                                                                    <label>Characters(50)</label>
                                                                    <input type="text" class="form-control" placeholder="46" value="" disabled>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>JPreset</label>
                                                                    <input type="text" class="form-control" placeholder="BOVQ123" value="" disabled>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </form>

                                                    <div class="row boomi_btn">
                                                        <div class="col-lg-3 col-sm-3">
                                                            <a href="#">Cancel</a>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-3">
                                                            <a href="#">Copy File Name</a>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-3">
                                                            <a id="generateFolder" data-id="{{@$NewWippli->id}}">Generate Folders</a>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-3">
                                                            <a href="{{url('downloadZip')}}/{{$NewWippli->business_name.'_'.$NewWippli->first_name.' '.$NewWippli->surname}}">Save</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Accordion card -->

                            <div class="card" id="allocateCard">
                                <div class="card-header" role="tab" id="headingThree3">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                                       aria-expanded="false" aria-controls="collapseThree3">
                                        <h5 class="mb-0">
                                            Allocate <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>


                                <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                                     data-parent="#accordionEx">
                                    <div class="card-body">
                                        <div class="row boomi_form">
                                            <div class="col-lg-12">
                                                <div class="fields">
                                                    <form>
                                                        <b>Task:</b>
                                                        <ul>
                                                            <input type="hidden" id="business_id" value="{{@$NewWippli->bId}}">
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <select class="form-control" name="toUser" id="toUser">
                                                                        <option>select</option>
                                                                        @if(!empty($allBusinessUsers))
                                                                        @foreach($allBusinessUsers as $bUsers)
                                                                        <option value="{{$bUsers->userId}}" data-email="{{$bUsers->email}}">{{$bUsers->name}}</option>
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Email Address</label>
                                                                    <input type="text" class="form-control" name="email_address" id="email_address" placeholder="Email Address" value="" >
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <ul>

                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Message</label>
                                                                    <textarea class="form-control" name="message" id="message" placeholder="Message" ></textarea>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </form>

                                                    <div class="row boomi_btn">
                                                        <div class="col-lg-4 col-sm-3">
                                                            <a href="#">SHARE</a>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-3">
                                                            <a href="#" id="allocateBtn" data-email="{{@$NewWippli->email}}" data-id="{{@$NewWippli->id}}">ALLOCATE</a>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-3">
                                                            <a id="takeOn" data-email="{{@$uEmail}}" data-uid="{{@$uId}}" data-wid="{{@$NewWippli->id}}">TAKE ON</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>



                            <div class="card" id="commentCard">
                                <div class="card-header" role="tab" id="headingFour4">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                                       aria-expanded="true" aria-controls="collapseThree3">
                                        <h5 class="mb-0">
                                            Comment Wippli <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>


                                <div id="headingFour4" class="collapse in" role="tabpanel" aria-labelledby="headingThree3"
                                     data-parent="#accordionEx">
                                    <div class="card-body">
                                        <div class="row boomi_form">
                                            <div class="col-lg-12">
                                                <div class="fields">
                                                    <form>
                                                        <ul>
                                                            <li>
                                                                <div class="form-group">
                                                                    <!--<label>Message</label>-->
                                                                    <div class="col-md-4">
                                                                        <b style="background-color: #337ab7;color:#ffffff" class="form-control">{{$uName}}</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control" name="comment" id="comment" placeholder="Comment Here" ></textarea>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="row boomi_btn">
                                                            <div class="col-lg-4 col-sm-3">
                                                                <a href="#" id="commentBtn" data-email="{{@$NewWippli->email}}" data-id="{{@$NewWippli->id}}">COMMENT</a>
                                                            </div>
                                                        </div>
                                                        @if(!empty($wippliComment))
                                                        @foreach($wippliComment as $wcomment)
                                                        <!--<label>Message</label>-->
                                                        <b>{{$wcomment->comment}}</b>
                                                        @endforeach
                                                        @endif
                                                        </ul>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                            <div class="card" id="commentCard">
                                <div class="card-header" role="tab" id="headingFour4">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                                       aria-expanded="true" aria-controls="collapseThree3">
                                        <h5 class="mb-0">
                                            Incident <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>


                                <div id="headingFour5" class="collapse in" role="tabpanel" aria-labelledby="headingThree3"
                                     data-parent="#accordionEx">
                                    <div class="card-body">
                                        <div class="row boomi_form">
                                            <div class="col-lg-12">
                                                <div class="fields">
                                                    <form>

                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label>Type of Incedent</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="incedent_type" id="incedent_type" placeholder="Incedent Type" ></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label>Description of Incedent</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" name="description" id="description" placeholder="Description" ></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label>Implications</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="implications" id="implications" placeholder="Implications" ></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label>Attachment/File</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control" name="attachment" id="attachment"  >
                                                            </div>
                                                        </div>

                                                        <div class="row boomi_btn">
                                                            <div class="col-lg-4 col-sm-3">
                                                                <a href="#" id="incidentBtn" data-email="{{@$NewWippli->email}}" data-id="{{@$NewWippli->id}}">SEND</a>
                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- Accordion wrapper -->
                    </div>
                    <div class="form-ftr">
                        <p>POWERED BY
                            <img src="{{url('public/wippli/img/Group%201087.png')}}" alt="ftr-logo">
                        </p>
                    </div>
                </div>
            </div>  
            <div class="col-lg-3">
                <div class="form_inner boomi_actions">
                    <div class="header bimmo_header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="wipl_logo">
                                    Actions
                                </div>
                                <div class="">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-txt boomi_action_txt">
                                <ul>
                                    <li><a href="#">Track Time</a> </li>
                                    <li><a href="#">The Wippli</a> </li>
                                    <li><a href="#">Job Name</a> </li>
                                    <li><a href="#allocateCard">Allocate</a> </li>
                                    <li><a href="#">Generate Folders</a> </li>
                                    <li><a href="#">People</a> </li>
                                    <li class="line">---------- </li>
                                    <li><a href="#">Archive</a> </li>
                                    <li><a href="#">Mark as Delivered</a> </li>
                                    <li><a href="#">Delete</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>