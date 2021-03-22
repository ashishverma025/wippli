<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TASC</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/assets/sites/css/bootstrap.min.css') }}">
        <script src="{{ asset('/assets/sites/js/popper.min.js') }}"></script>    
        <script src="{{ asset('/assets/sites/js/jquery.min.js') }}"></script>  
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="route" content="{{ url('/') }}">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="{{ asset('/assets/sites/css/main.css') }}">
    </head>
    <style>
    </style>
    <body>
        <!--------------------------  form1  -------------------------->
        <style>
        </style>
        <header class="header">
            <div class="container">
                <div class="header-inner">
                    <div class="row">
                        <div class="col-lg-2">
                            <a href="{{url('/user-dashboard')}}">
                                <img src="{{ asset('/assets/sites/img/tasc-logo.png') }}" width="150" height="50" alt="logo">
                            </a>
                        </div>
                        <div class="col-lg-10">
                            <ul>
                                <li>
                                    <form class="top-search" action="" style="margin:auto;max-width:300px">
                                        <input type="text" placeholder="Search" name="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                                <li><a href="#"><i class="fas fa-comment" title="Comments"></i></a> </li>
                                <li><a href="#"><i class="far fa-bell" title="Notifications"></i></a> 
                                <li><a href="{{url('logout')}}" alt="logout" title="logout"><i class="far fa-sign-out"></i></a> 
                                </li>
                                <li><a href="{{url('/brannium-clients-contacts')}}" title="Brannium Dashboard"><i class="fas fa-user"></i></a> </li>
                                <li><a href="#"><i class="fas fa-ellipsis-v"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>