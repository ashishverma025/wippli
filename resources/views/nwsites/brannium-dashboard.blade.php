@extends('nwsites.layout.sites')
@section('content')
<section class="dashboard mt-5">
    <div class="container">
        <div class="row">
            <!-- Col-3 --> 
            <div class="col-lg-3">
                <div class="left-board">
                    <div class="left-id mb-3">
                        <div class="img">
                            <a href="{{url('/user-dashboard')}}"><img src="{{ asset('assets/sites/img/demo.png') }}" alt=""></a>
                        </div>
                        <div class="img-txt">
                            <h2>Hi Valerie!</h2>
                            <b>Dell Boomi</b>
                            <!-- <span>Sydney: The 29 Dec 11:39 am</span> -->
                        </div>
                    </div>
                    <a href="{{url('new-wippli')}}">New Wippli</a>
                    <a href="{{url('business-details')}}" style="background: #106d98 !important;margin-top: 2px;">Add Business</a>
                    <a href="{{url('contact-details')}}" style="background: #36beba !important;margin-top: 2px;">Add Contact</a>
                    
                    
                </div>
                <div class="left-board left-board-second mt-5">

                    <div class="left-inner-box grid-board-second">


                        <div class="tabs two-tabs">

                            <form>
                                
                                <ul class="nav nav-tabs nav-tab-right">
                                    <li class="active"><a data-toggle="tab" href="#left-menu2">Businesses</a></li>
                                    <li><a data-toggle="tab" href="#left-menu3">Contacts</a></li> 
                                </ul>
                                <div class="tab-content">
                                    <div id="left-menu2" class="tab-pane fade in active">
                                        <p>1</p>
                                        <div class="box box-left-tab">
                                            <div class="box-img">
                                                <img src="img/logo-icn-inner.png" alt="">
                                            </div>
                                            <div class="box-txt">
                                                <p><b>Valerie Earth</b></p>
                                            </div>
                                        </div>

                                        <div class="box box-left-tab">
                                            <div class="box-img">
                                                <img src="img/logo-icn-inner.png" alt="">
                                            </div>
                                            <div class="box-txt">
                                                <p><b>Valerie Earth</b></p>
                                            </div>
                                        </div> 

                                    </div>

                                    <div id="left-menu3" class="tab-pane fade">
                                        <p>2</p>
                                        <div class="box">
                                            <div class="box-img">
                                                <img src="img/demo.png" alt="">
                                            </div>
                                            <div class="box-txt">
                                                <em>20 min ago</em>
                                                <p><b>Valerie Earth</b> from <b>Boomi</b> created a <b>New Wippli</b> for <b>Forrester Event-Banners</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                        <p>This Week</p>
                                        <div class="rating">
                                            <span><b>9</b><img src="img/line.png" alt=""> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="header_progress">
                                        <p>This month</p>
                                        <div class="rating">
                                            <span><b>18</b><img src="img/line.png" alt=""> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="header_progress border-zero">
                                        <p>Completed this year</p>
                                        <div class="rating">
                                            <span><b>45</b><img src="img/line.png" alt=""> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-txt form-txt-third">
                            <div class="tabs">
                                <form>
                                    <ul class="nav nav-tabs third-tab">
                                        <li class="active"><a data-toggle="tab" href="#home">With Brannium</a></li>
                                        <li><a data-toggle="tab" href="#menu1">With My Team</a></li>
                                        <li><a data-toggle="tab" href="#menu2">With Dell Boomi</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <h3>1</h3>
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
                                                            <div class="card-header" role="tab" id="headingTwo1">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                                                                   aria-expanded="false" aria-controls="collapseTwo1">
                                                                    <h5 class="mb-0">
                                                                        To Allocate <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo1" class="collapse in" role="tabpanel" aria-labelledby="headingTwo1"
                                                                 data-parent="#accordionEx1">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                            <div class="card-header" role="tab" id="headingTwo4">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseTwo4"
                                                                   aria-expanded="false" aria-controls="collapseTwo4">
                                                                    <h5 class="mb-0">
                                                                        Allocated <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo4" class="collapse in" role="tabpanel" aria-labelledby="headingTwo4"
                                                                 data-parent="#accordionEx2">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                            <div class="card-header" role="tab" id="headingTwo1">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx3" href="#collapseTwo7"
                                                                   aria-expanded="false" aria-controls="collapseTwo7">
                                                                    <h5 class="mb-0">
                                                                        Delivered <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo7" class="collapse in" role="tabpanel" aria-labelledby="headingTwo7"
                                                                 data-parent="#accordionEx3">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                        <div id="menu1" class="tab-pane fade">
                                            <h3>2</h3>
                                            <div class="row">
                                                <div class="col-lg-4 p-3">
                                                    <div class="sec_head">
                                                        To do
                                                    </div>
                                                    <!--Accordion wrapper-->
                                                    <div class="accordion md-accordion" id="accordionEx4" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                            <div class="card-header" role="tab" id="headingTwo10">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx4" href="#collapseTwo10"
                                                                   aria-expanded="false" aria-controls="collapseTwo10">
                                                                    <h5 class="mb-0">
                                                                        To Allocated <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo10" class="collapse in" role="tabpanel" aria-labelledby="headingTwo10"
                                                                 data-parent="#accordionEx4">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                    <div class="accordion md-accordion" id="accordionEx7" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                            <div class="card-header" role="tab" id="headingTwo13">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx13" href="#collapseTwo13"
                                                                   aria-expanded="false" aria-controls="collapseTwo13">
                                                                    <h5 class="mb-0">
                                                                        Allocated <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo13" class="collapse in" role="tabpanel" aria-labelledby="headingTwo13"
                                                                 data-parent="#accordionEx7">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                    <div class="accordion md-accordion" id="accordionEx10" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                            <div class="card-header" role="tab" id="headingTwo16">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx10" href="#collapseTwo16"
                                                                   aria-expanded="false" aria-controls="collapseTwo16">
                                                                    <h5 class="mb-0">
                                                                        Delivered <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo16" class="collapse in" role="tabpanel" aria-labelledby="headingTwo16"
                                                                 data-parent="#accordionEx10">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                        <!--********************************************************************************************13 19-->
                                        <div id="menu2" class="tab-pane fade">
                                            <h3>3</h3>
                                            <div class="row">
                                                <div class="col-lg-4 p-3">
                                                    <div class="sec_head">
                                                        To do
                                                    </div>
                                                    <!--Accordion wrapper-->
                                                    <div class="accordion md-accordion" id="accordionEx13" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                            <div class="card-header" role="tab" id="headingTwo19">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx13" href="#collapseTwo19"
                                                                   aria-expanded="false" aria-controls="collapseTwo19">
                                                                    <h5 class="mb-0">
                                                                        To Allocated <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo19" class="collapse in" role="tabpanel" aria-labelledby="headingTwo19"
                                                                 data-parent="#accordionEx13">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                    <div class="accordion md-accordion" id="accordionEx16" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                            <div class="card-header" role="tab" id="headingTwo22">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx16" href="#collapseTwo22"
                                                                   aria-expanded="false" aria-controls="collapseTwo22">
                                                                    <h5 class="mb-0">
                                                                        Allocated <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo22" class="collapse in" role="tabpanel" aria-labelledby="headingTwo22"
                                                                 data-parent="#accordionEx16">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                    <div class="accordion md-accordion" id="accordionEx19" role="tablist" aria-multiselectable="true">
                                                        <!-- Accordion card -->
                                                        <div class="card">
                                                            <!-- Card header -->
                                                            <div class="card-header" role="tab" id="headingTwo24">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx19" href="#collapseTwo24"
                                                                   aria-expanded="false" aria-controls="collapseTwo24">
                                                                    <h5 class="mb-0">
                                                                        Delivered <span class="dott"></span>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div id="collapseTwo24" class="collapse in" role="tabpanel" aria-labelledby="headingTwo24"
                                                                 data-parent="#accordionEx19">
                                                                <div class="card-body">
                                                                    <div class="card-txt">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="small_company_logo">
                                                                                    <img src="img/logo-icn.png" alt="icn">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                <div class="company_txt">
                                                                                    <span class="time">11:48 AM</span>
                                                                                    <p>Jay Marcano has created a New Wippli for Latin America Prom - Poster to Brannium</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                            <img src="img/wippli-logo-blu.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="form_inner history-sec mt-5">
                    <div class="history-sec-inner">
                        <div class="history-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="history-header-left">
                                        <h2><img src="img/history.png" alt="">&nbsp;History</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="history-header-right">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-search"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-chevron-down"></i></a> </li>
                                            <li><a href="#"><i class="fas fa-ellipsis-v"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grids_box">
                            <div class="grid_header">
                                <ul>
                                    <li>Type </li>
                                    <li>Business </li>
                                    <li>Name </li>
                                    <li>Number </li>
                                    <li>Creator </li>
                                    <li>Date </li>
                                    <li>Delivered </li>
                                    <li>With </li>
                                </ul>
                            </div>
                        </div>
                        <div class="grids_box_white">
                            <div class="grid-inner">
                                <ul>
                                    <li>
                                        <div class="grid-iner-div">
                                            <div class="grid-inner-logo mr-1">
                                                <a href="#">
                                                    <img src="img/bb.png" alt="logo"> 
                                                </a>
                                            </div>
                                            <div class="grid-inner-txt">Task</div>
                                        </div>
                                    </li>
                                    <li>Dell Boomi</li>
                                    <li>Rebranding-QuickGuide</li>
                                    <li>BOVQ1234</li>
                                    <li>
                                        Valerie Earth
                                    </li>
                                    <li>
                                        <select id="inputState" class="form-control">
                                            <option selected>10/08/2020</option>
                                            <option>...</option>
                                        </select>
                                    </li>
                                    <li>
                                        10/08/2020
                                    </li>
                                    <li>Danielle Lau and Danielle</li>
                                    <li><i class="fa fa-ellipsis-v"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="grids_box_white">
                            <div class="grid-inner">
                                <ul>
                                    <li>
                                        <div class="grid-iner-div">
                                            <div class="grid-inner-logo mr-1">
                                                <a href="#">
                                                    <img src="img/bb.png" alt="logo"> 
                                                </a>
                                            </div>
                                            <div class="grid-inner-txt">Task</div>
                                        </div>
                                    </li>
                                    <li>Dell Boomi</li>
                                    <li>Rebranding-QuickGuide</li>
                                    <li>BOVQ1234</li>
                                    <li>
                                        Valerie Earth
                                    </li>
                                    <li>
                                        <select id="inputState" class="form-control">
                                            <option selected>10/08/2020</option>
                                            <option>...</option>
                                        </select>
                                    </li>
                                    <li>
                                        10/08/2020
                                    </li>
                                    <li>Danielle Lau and Danielle</li>
                                    <li><i class="fa fa-ellipsis-v"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="grids_box_white">
                            <div class="grid-inner">
                                <ul>
                                    <li>
                                        <div class="grid-iner-div">
                                            <div class="grid-inner-logo mr-1">
                                                <a href="#">
                                                    <img src="img/bb.png" alt="logo"> 
                                                </a>
                                            </div>
                                            <div class="grid-inner-txt">Task</div>
                                        </div>
                                    </li>
                                    <li>Dell Boomi</li>
                                    <li>Rebranding-QuickGuide</li>
                                    <li>BOVQ1234</li>
                                    <li>
                                        Valerie Earth
                                    </li>
                                    <li>
                                        <select id="inputState" class="form-control">
                                            <option selected>10/08/2020</option>
                                            <option>...</option>
                                        </select>
                                    </li>
                                    <li>
                                        10/08/2020
                                    </li>
                                    <li>Danielle Lau and Danielle</li>
                                    <li><i class="fa fa-ellipsis-v"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="history-numbers">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="number-left">
                                        <span>Show items</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="number-right">
                                        <span> 1 of 5 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wippli-ftr">
                        <div class="wippli-ftr-inner">
                            <p>Powered by</p>
                            <img src="img/wippli-logo-blu.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Col-9 End --> 
        </div>
    </div>
</section>
@endsection