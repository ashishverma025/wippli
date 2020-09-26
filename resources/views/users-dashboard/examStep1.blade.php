@extends('sites.layout.tutor')
@section('content')
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,700);

    body {background: #F2F2F2;padding: 0;maring: 0;}

</style>
<!--ultimite,standard,basic-->
<form action="{{url('onlineExam/start')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="paperName" value="{{$paperName}}">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center subscribe-main-title step1">
        <h2>Online Exam <span>Step-1</span> <br>Fill Form</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <div class="text-center"><button type="button" class="btn btn-primary centr btnCustNew">Step-2</button></div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center subscribe-main-title step2 hide">
        <h2>Online Exam <span>Step-2</span> <br>Instruction</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <div class="text-center"><button type="submit" class="btn btn-primary centr ">Start</button></div>
    </div>
    <script>
        $(".btnCustNew").click(function () {
            $(".step1").hide()
            $(".step2").removeClass('hide')

        });
    </script>
    @endsection