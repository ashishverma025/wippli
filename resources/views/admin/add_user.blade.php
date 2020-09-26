@extends('admin.layout.app')
@section('title', 'Add Users')
@section('css')
<link href="{{URL::asset('/public/admn/css/plugincss/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('/public/admn/css/bootstrapValidator.min.css')}}" rel="stylesheet">
@stop
@section('content')
<div id="content" class="bg-container">
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        {{ isset($user->id) ? 'Edit User' : 'Add Users' }}
                    </h4>
                </div>
            </div>
        </div>
    </header>
    @if(session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    </div>
    @endif
    @if(session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
    @endif
    <div class="outer">
        <div class="inner bg-container">
            <!--top section widgets-->
            <div class="card">

                <div class="card-block m-t-35">
                    <div>
                        <h4>Personal Information</h4>
                    </div>
                    <form class="form-horizontal login_validator" id="tryitForm"
                          enctype="multipart/form-data" action="{{ isset($user->id) ? url('/admin/edit_user/' . $user->id) : url('/admin/add_user') }}"
                          method="post">
                        <div class="row">
                            <div class="col-12">
                                {{ csrf_field() }}
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-center text-lg-right">
                                        <label class="col-form-label">Profile Pic</label>
                                    </div>
                                    <div class="col-lg-6 text-center text-lg-left">
                                        <div class="fileinput fileinput-new" 
                                             data-provides="fileinput">
                                            <div class="fileinput-new img-thumbnail text-center">
                                                @if (isset($user->avatar))
                                                <img src="{{url('public/images/users/' . $user->avatar)}}"></div>
                                                @else
                                                <img src="" 
                                                     data-src="holder.js/100%x100%"  
                                                     alt="not found"></div>
                                                @endif
                                            <div class="fileinput-preview fileinput-exists img-thumbnail"></div>
                                            <div class="m-t-20 text-center">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="avatar"></span>
                                                <a href="#" class="btn btn-warning fileinput-exists"
                                                   data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="u-name" class="col-form-label">
                                            Name *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user text-primary"></i>
                                            </span>
                                            <input type="text" name="name"
                                                   class="form-control" value="{{ isset($user->name) ? $user->name : old('name') }}">
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <!--<div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="u-name" class="col-form-label">User
                                            Name *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user text-primary"></i>
                                            </span>
                                            <input type="text" name="userName"
                                                   value="{{ isset($user->username) ? $user->username : old('userName') }}"
                                                   autocomplete="user-name"
                                                   class="form-control">
                                        </div>
                                        @if ($errors->has('userName'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('userName') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>-->
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="email" class="col-form-label">Email
                                            *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope text-primary"></i>
                                            </span>
                                            <input type="text" value="{{ isset($user->email) ? $user->email : old('email') }}" name="email"
                                                   class="form-control">
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="pwd" class="col-form-label">Password
                                            *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-lock text-primary"></i>
                                            </span>
                                            <input type="password" name="password" autocomplete="new-password"
                                                   class="form-control">
                                        </div>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="cpwd" class="col-form-label">Confirm
                                            Password *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-lock text-primary"></i>
                                            </span>
                                            <input type="password" name="confirmpassword" placeholder=" "
                                                   class="form-control">
                                        </div>
                                        @if ($errors->has('confirmpassword'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('confirmpassword') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="phone" class="col-form-label">Phone
                                            </label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone text-primary"></i>
                                            </span>
                                            <input name="phone"
                                                   type="number"
                                                   minlength="10"
                                                   maxlength="20"
                                                   value="{{ isset($user->phone) ? $user->phone : old('phone') }}" 
                                                   class="form-control">
                                        </div>
                                        @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group gender_message row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label class="col-form-label">Gender *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="gender"
                                                       class="custom-control-input" value="Male"
                                                       {{ (isset($user->gender) ? $user->gender : old('gender')) == 'Male' ? 'checked' : ''}}>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Male</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="gender"
                                                       class="custom-control-input" value="Female"
                                                       {{ (isset($user->gender) ? $user->gender : old('gender')) == 'Female' ? 'checked' : ''}}>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Female</span>
                                            </label>
                                        </div>
                                        @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--<div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="address" class="col-form-label">Address
                                            *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                                            <input type="text" placeholder=" "  name="address1"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="city" class="col-form-label">City
                                            *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                                            <input type="text" placeholder=" " name="city" id="city"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="pincode" class="col-form-label">Pincode
                                            *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                                            <input type="text" placeholder=" " name="pincode" id="pincode"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>-->
                                <!--<div class="form-group row">
                                    <div class="col-xl-6 col-lg-8 add_user_checkbox_error push-lg-3">
                                        <div>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" name="active"
                                                       class="custom-control-input" value="1"
                                                       {{ (isset($user->active) ? $user->active : old('active')) == 1 ? 'checked' : ''}}>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Activate your account</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="form-group row">
                                    <div class="col-lg-9 push-lg-3">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-user"></i>
                                            {{ isset($user->id) ? 'Edit User' : 'Add User' }}
                                        </button>
                                        @if(!isset($user->id))
                                        <button class="btn btn-warning" type="reset" id="clear">
                                            <i class="fa fa-refresh"></i>
                                            Reset
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('pagescript')
    <script src="{{URL::asset('/public/admn/js/pluginjs/jasny-bootstrap.js')}}"></script>
    <script src="{{URL::asset('/public/admn/js/holder.js')}}"></script>
    <script src="{{URL::asset('/public/admn/js/bootstrapValidator.min.js')}}"></script>
    <!--<script src="{{URL::asset('/public/admn/js/pages/validation.js')}}"></script>-->
    @stop