
<section class="form1 form form_third">
    <div class="container" style="width: 1065px">
        <div class="form_inner">
            <div class="header">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="#">
                                <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="logo"> 
                                <h3>People <span>Setting</span></h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-txt form-txt-third people-seting">
                <div class="tabs">
                    <form>
<!--                        <ul class="nav nav-tabs third-tab ">
                            <li style="width: 25%"><a href="#">New Contact</a></li>
                            <li style="width: 18%"><a data-toggle="tab" href="#">Brannium</a></li>
                            <li style="width: 18%" class="active"><a data-toggle="tab" href="#">Clients</a></li>
                            <li style="width: 18%"><a data-toggle="tab" href="#">Contacts</a></li>
                        </ul>-->
                        <div class="tab-content">
                            <div id="home" class="tab-pane">
                                <!-- <h3>1</h3> -->

                            </div>
                            <!--********************************************************************************************-->
                            <div id="menu1" class="tab-pane fade in active">
                                <!-- <h3>2</h3> -->
                                <div class="box-wht">
                                    <div class="row white-bg">
                                        <div class="col-lg-3 bdr-rit">
                                            <div class="logo-inner">
                                                @if(!empty($cDetails->logocolours))
                                                <img src="{{url('public/wippli/images/BusinessLogo')}}/{{$cDetails->logocolours}}" data-id="{{$cDetails->id}}" width="50" height="50">
                                                @else
                                                <img src="{{url('public/wippli/img/bimmo_logo.jpg')}}" alt="innerlogo">
                                                @endif                                            
                                            </div>
                                        </div>
                                        <div class="col-lg-9 border-left">
                                            <div class="logo-inner-txt">
                                                <ul>

                                                </ul>
                                                <b>{{$cDetails->business_name}}</b>
                                                <p>{{$cDetails->address1.' '.$cDetails->address2.' '.$cDetails->state.' '.$cDetails->city.' '.$cDetails->country}} <br>{{$cDetails->post_code}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="grids_box">
                                    <div class="grid_header">
                                        <ul>
                                            <li>Name</li>
                                            <li>Position</li>
                                            <li>company</li>
                                            <li>Email Address</li>
                                            <li>Type</li>
                                            <li>Role</li>
                                            <li>Email Alerts</li>
                                        </ul>
                                    </div>
                                </div>
                                @if(!empty($businessUsersLists))
                                @foreach($businessUsersLists as $buList)
                                <div class="grids_box_white">
                                    <div class="grid-inner">
                                        <ul>
                                            <li>{{$buList->name}}</li>
                                            <li>{{$buList->positions}}</li>
                                            <li>{{$buList->business_name}}</li>
                                            <li>{{$buList->email}}</li>
                                            <li>{{$buList->business_type?$buList->business_type:'N/A'}}</li>
                                            <li>{{$buList->Role}}</li>
                                            <li>{{$buList->email_notification}}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

