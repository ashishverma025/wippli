@extends('layouts.app_user')
@section('title', 'Edit Profile')

@section('content')
<div class="col-lg-9">
    <div class="dash-container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb cust-bread">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
        @if(session()->has('success'))
        <div class="col-md-12">
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="col-md-12">
            <div class="alert alert-success">
                {{ session()->get('error') }}
            </div>
        </div>
        @endif
        <div class="abc">

            <div class="row">
                <div class="col-md-9">
                    <div class="personal">

                        <div class="card-block m-t-35">
                            <div>
                                <h4>Personal Information</h4>
                            </div>
                            <form class="form-horizontal login_validator" id="tryitForm"
                                  enctype="multipart/form-data" action="{{ url('/edit_profile') }}"
                                  method="post">
                                <div class="row">
                                    <div class="col-12">
                                        {{ csrf_field() }}
                                        <div class="form-group row m-t-25">
                                            <div class="col-lg-3 text-center text-lg-right">
                                                <label class="col-form-label">Profile Picture</label>
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
                                            <label for="phone" class="col-form-label">Phone
                                            </label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
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
                                            <div class="radio">
                                                <label><input type="radio"
                                                              name="gender"
                                                              value="Male"
                                                              {{ (isset($user->gender) ? $user->gender : old('gender')) == 'Male' ? 'checked' : ''}}>
                                                    Male</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio"
                                                              name="gender"
                                                              value="Female"
                                                              {{ (isset($user->gender) ? $user->gender : old('gender')) == 'Female' ? 'checked' : ''}}>
                                                    Female</label>
                                            </div>
                                        </div>
                                        @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">

                                        </div>
                                        <div class="col-xl-6 col-lg-8 text-lg-left">
                                            <button class="btn btn-primary blue-buton" type="submit">
                                                <i class="fa fa-user"></i>
                                                {{ 'Edit Profile' }}
                                            </button>
                                        </div>
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

@yield('content')
@endsection