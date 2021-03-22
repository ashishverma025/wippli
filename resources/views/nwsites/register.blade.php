<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="route" content="{{ url('/') }}">
  <link rel="stylesheet" href="{{ url('public/wippli/css/bootstrap.min.css') }}">
  <script src="{{ url('public/wippli/js/bootstrap.min.js') }}"></script>    
  <script src="{{ url('public/wippli/js/popper.min.js') }}"></script>   
  <script src="{{ url('public/wippli/js/jquery.min.js') }}"></script>  
  <!-- <script src="{{ url('public/wippli/js/slider.js') }}"></script> -->

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="{{ url('public/wippli/css/main.css') }}">
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</head>
<body>
  <!--------------------------  form1  -------------------------->
  <section class="form1 form">
   <div class="container">
     <div class="form_inner login_inner">

      <div class="header">
       <div class="row">
        <div class="col-lg-12">
         <div class="logo" style="align-content: center;">
          <img src="{{ asset('assets/sites/img/tasc-logo.png') }}"  width="150" height="50" alt="logo">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="form-txt login_txt">
      <div class="login_form">

      @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif

            <form method="POST"  action="{{ route('registration') }}">
                @csrf
                <label for="lname" >{{ __('First Name') }}</label>
                <input id="lname" type="text"  name="fname" value="{{ old('fname') }}" required autofocus>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif

                <label for="lname" >{{ __('Last Name') }}</label>
                <input id="lname" type="text"  name="lname" value="{{ old('lname') }}" >
                @if ($errors->has('lname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lname') }}</strong>
                </span>
                @endif

                <label for="email">E-Mail</label>
                <input id="email" type="text"  name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif


                <label for="company">Company</label>
                <input id="company" type="text"  name="company" value="{{ old('company') }}" required>
                @if ($errors->has('company'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('company') }}</strong>
                </span>
                @endif

                <label for="password"><b> Password</b></label>
                <input id="password" type="password" name="password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

                <label for="password-confirm"><b>Confirm Password</b></label>
                <input id="password-confirm" type="password"  name="password_confirmation" required>

                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                <label style="float: right;">
                  <a href="{{url('/login')}}"> Login </a>
                </label>
            </form>
      </div>
    </div>
  </div>
</div>   
<div class="form-ftr">
  <p>Powerd By
   <img src="img/Group%201087.png" alt="ftr-logo"></p>
 </div>   
</div>
</div>
</section>
</body>
<script src="{{ url('public/wippli/js/custom-index.js') }}"></script>

</html>