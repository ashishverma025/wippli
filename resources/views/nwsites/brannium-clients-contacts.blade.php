@extends('nwsites.layout.sites')
@section('content')
<section class="dashboard mt-5 mb-2  form_third">
    <div class="container">
        <div class="form_inner">
            <div class="header">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="#">
                                <a href="{{url('/user-dashboard')}}"><img src="{{ asset('assets/sites/img/demo.png') }}" alt=""></a>
                                <h3>People <span>Setting</span></h3>
                                @if(session()->has('message.level'))
                                <div class="alert alert-{{ session('message.level') }}"> 
                                    {!! session('message.content') !!}
                                </div>
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
            </div>

            <div class="twotab-content-box form-txt form-txt-third people-seting">
                <div class="tabs">
                    <form>
                        <ul class="nav nav-tabs third-tab ">
                            <li ><a href="{{url('contact-details')}}">New Contact</a></li>
                            <!-- <li class="active"><a data-toggle="tab" href="#menu1">Brannium</a></li> -->
                            <!-- <li><a data-toggle="tab" href="#menu2">Clients</a></li> -->
                            <li><a class="active" data-toggle="tab" href="#menu3">Contacts</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane">
                                <h3>1</h3>

                            </div>
                            <!--********************************************************************************************-->
                            <div id="menu1" class="tab-pane fade in active">
                                
                            <div class="grids_box">
                                                    <div class="grid_header">
                                                        <ul>
                                                            <li></li>
                                                            <li>Name</li>
                                                            <li>Position</li>
                                                            <li>company</li>
                                                            <li>Email Address</li>
                                                            <!-- <li>Role</li> -->
                                                            <li>Action</li>
                                                            <!-- <li><i class="fas fa-search"></i></li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                                @if(!empty($ContactDetails))
                                                @foreach($ContactDetails as $cDetails)
                                                <div class="grids_box_white">
                                                    <div class="grid-inner">
                                                        <ul>
                                                            <li>
                                                                <div class="grid-iner-div">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                                                    </div>
                                                                    <div class="grid-inner-logo">
                                                                        <a href="#">
                                                                            <img src="{{url('public/wippli/img/logo-icn-inner.png')}}" alt="logo"> 
                                                                        </a>
                                                                    </div>
                                                                    <div class="grid-inner-txt">{{$cDetails->first_name}}</div>
                                                                </div>
                                                            </li>
                                                            <li>{{$cDetails->positions}}</li>
                                                            <li>{{$cDetails->email}}</li>
                                                            <li>{{@$cDetails->company}}</li>
                                                            <li>{{$cDetails->type}}</li>
                                                           {{-- <li>
                                                                @if(changeRolePermission($userDetails->user_type) && ($userDetails->id != $cDetails->user_id))
                                                                <select id="inputState" class="form-control" onchange="changeRole(this,'Agency',{{$cDetails->id}},{{$cDetails->user_id}})">
                                                                    @foreach($Roles as $role)
                                                                    <option {{($role['id'] == $cDetails->user_type)?'selected':''}} value="{{$role['id']}}">{{$role['name']}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @else
                                                                <select id="inputState" class="form-control" data-role="{{$userDetails->user_type}}" onchange="confirm('You don\'t have permission to change role')">
                                                                    @foreach($Roles as $role)
                                                                    <option {{($role['id'] == $cDetails->user_type)?'selected':''}} value="{{$role['id']}}">{{$role['name']}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                            </li>
                                                            --}}
                                                            <li>
                                                                <select id="inputState" class="form-control">
                                                                    <option selected>Delete</option>
                                                                    <option >Suspand</option>
                                                                </select>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                            </div>
                            <!--********************************************************************************************13 19-->
                            <div id="menu2" class="tab-pane fade">
                                <!--<h3>3</h3>-->
                                @if(!empty($ClientDetails))
                                @foreach($ClientDetails as $cDetails)
                                <div class="box-wht">
                                    <div class="row white-bg">
                                        <div class="col-lg-3">
                                            <div class="logo-inner">
                                                @if(!empty($cDetails->logocolours))
                                                <img src="{{url('public/sites/images/BusinessLogo')}}/{{$cDetails->logocolours}}" alt="innerlogo" data-id="{{$cDetails->id}}" width="50" height="50">
                                                @else
                                                <img src="{{url('public/wippli/img/bimmo_logo.jpg')}}" alt="innerlogo">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="logo-inner-txt">
                                                <b>{{$cDetails->business_name}}</b>
                                                <p>{{$cDetails->address1.' '.$cDetails->address2.' '.$cDetails->state.' '.$cDetails->city.' '.$cDetails->country}} <br>{{$cDetails->post_code}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="logo-inner-txt">
                                                <ul>
                                                    <li><i class="fab fa-linkedin-in"></i></li>
                                                    <li><i class="fab fa-twitter"></i></li>
                                                    <li><i class="fas fa-pencil-alt"></i></li>
                                                    <li><i class="fas fa-trash"></i></li>
                                                    <li><i class="fas fa-ellipsis-v"></i></li>
                                                </ul>
                                                <b>Agency</b>
                                                <p>{TBC}</p>
                                                <p>{TBC}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                            <!--********************************************************************************************22 27-->
                            <div id="menu3" class="tab-pane fade">
                                <!--<h3>4</h3>-->
                                <div class="people-seting-contact">
                                    <div class="tabs">
                                        <ul class="nav nav-tabs contact-nav ">
                                            <li class="active"><a data-toggle="tab" href="#boomi">BOOMI</a></li>
                                            <li><a data-toggle="tab" href="#agencies">AGENCIES</a></li>
                                        </ul>

                                        <div class="tab-content">
                                        
                                            <div id="agencies" class="tab-pane fade">
                                                <!--<p>agencies</p>-->
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
                                                            <li><i class="fas fa-search"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @if(!empty($ContactDetails))
                                                @foreach($ContactDetails as $cDetails)
                                                <div class="grids_box_white">
                                                    <div class="grid-inner">
                                                        <ul>
                                                            <li>
                                                                <div class="grid-iner-div">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                                                    </div>
                                                                    <div class="grid-inner-logo">
                                                                        <a href="#">
                                                                            <img src="{{url('public/wippli/img/logo-icn-inner.png')}}" alt="logo"> 
                                                                        </a>
                                                                    </div>
                                                                    <div class="grid-inner-txt">{{$cDetails->first_name}}</div>
                                                                </div>
                                                            </li>
                                                            <li>{{$cDetails->positions}}</li>
                                                            <li>{{$cDetails->company}}</li>
                                                            <li>{{$cDetails->email}}</li>
                                                            <li>{{$cDetails->type}}</li>
                                                            <li>
                                                                @if(changeRolePermission($userDetails->user_type) && ($userDetails->id != $cDetails->user_id))
                                                                <select id="inputState" class="form-control" onchange="changeRole(this,'Agency',{{$cDetails->id}},{{$cDetails->user_id}})">
                                                                    @foreach($Roles as $role)
                                                                    <option {{($role['id'] == $cDetails->user_type)?'selected':''}} value="{{$role['id']}}">{{$role['name']}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @else
                                                                <select id="inputState" class="form-control" data-role="{{$userDetails->user_type}}" onchange="confirm('You don\'t have permission to change role')">
                                                                    @foreach($Roles as $role)
                                                                    <option {{($role['id'] == $cDetails->user_type)?'selected':''}} value="{{$role['id']}}">{{$role['name']}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                <select id="inputState" class="form-control">
                                                                    <option selected>Limited</option>
                                                                    <option>...</option>
                                                                </select>
                                                            </li>
                                                            <li><div class="logo-inner-txt">
                                                                    <ul>
                                                                        <li><i class="fab fa-linkedin-in"></i></li>
                                                                        <li><i class="fab fa-twitter"></i></li>
                                                                        <li onclick="$('#myModal').modal('show');" class="showPopup" data-title="Agency" data-role="{{$cDetails->role}}" data-id="{{$cDetails->id}}"><i class="fas fa-pencil-alt"></i></li>
                                                                        <li><i class="fas fa-trash"></i></li>
                                                                        <li><i class="fas fa-ellipsis-v"></i></li>
                                                                    </ul>
                                                                </div></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
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
</section>
@endsection