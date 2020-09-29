<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Forms Third</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ url('public/wippli/css/bootstrap.min.css') }}">
      <script src="{{ url('public/wippli/js/bootstrap.min.js') }}"></script>    
      <script src="{{ url('public/wippli/js/popper.min.js') }}"></script>   
      <script src="{{ url('public/wippli/js/jquery.min.js') }}"></script>  
      <!-- <script src="js/slider.js"></script> -->
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <link rel="stylesheet" href="{{ url('public/wippli/css/main.css') }}">
   </head>
   <body>
      <!--------------------------  form1  -------------------------->
      <section class="form1 form form_third">
         <div class="container">
            <div class="form_inner">
               <div class="header">
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="logo">
                           <a href="#">
                              <img src="{{ url('public/wippli/img/logo-icn.png') }}" alt="logo"> 
                              <h3>Hi {{@$userDetails->name}}! <span>Brannium</span></h3>
                              <a href="{{ url('logout') }}">Logout</a>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="header_progress">
                           <p>This month</p>
                           <div class="rating">
                              <span><b>5</b></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="header_progress">
                           <p>This month</p>
                           <div class="rating">
                              <span><b>5</b></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="header_progress border-zero">
                           <p>This month</p>
                           <div class="rating">
                              <span><b>5</b></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-txt form-txt-third">
                  <div class="tabs">
                     <form>
                        <ul class="nav nav-tabs third-tab">
                           <li class="active"><a data-toggle="tab" href="#home">New Wippli</a></li>
                           <li><a data-toggle="tab" href="#menu1">With Brannium</a></li>
                           <li><a data-toggle="tab" href="#menu2">With My Team</a></li>
                           <li><a data-toggle="tab" href="#menu3">With Brannium</a></li>
                        </ul>
                        <div class="tab-content">
                           <div id="home" class="tab-pane fade in active">
                              <h3>1</h3>
                               
                              <div class="row">
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{ url('public/wippli/img/logo-icn.png') }}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo2">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
                                                aria-expanded="false" aria-controls="collapseTwo21">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo21" class="collapse in" role="tabpanel" aria-labelledby="headingTwo21"
                                             data-parent="#accordionEx1">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree31">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
                                                aria-expanded="false" aria-controls="collapseThree31">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree31" class="collapse in" role="tabpanel" aria-labelledby="headingThree31"
                                             data-parent="#accordionEx1">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo5">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseTwo5"
                                                aria-expanded="false" aria-controls="collapseTwo5">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo5" class="collapse in" role="tabpanel" aria-labelledby="headingTwo5"
                                             data-parent="#accordionEx2">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree61">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseThree6"
                                                aria-expanded="false" aria-controls="collapseThree6">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree6" class="collapse in" role="tabpanel" aria-labelledby="headingThree6"
                                             data-parent="#accordionEx2">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo8">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx3" href="#collapseTwo8"
                                                aria-expanded="false" aria-controls="collapseTwo8">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo8" class="collapse in" role="tabpanel" aria-labelledby="headingTwo8"
                                             data-parent="#accordionEx3">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree9">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx3" href="#collapseThree9"
                                                aria-expanded="false" aria-controls="collapseThree9">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree9" class="collapse in" role="tabpanel" aria-labelledby="headingThree9"
                                             data-parent="#accordionEx3">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo11">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx5" href="#collapseTwo11"
                                                aria-expanded="false" aria-controls="collapseTwo11">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo11" class="collapse in" role="tabpanel" aria-labelledby="headingTwo11"
                                             data-parent="#accordionEx5">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree12">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx6" href="#collapseThree12"
                                                aria-expanded="false" aria-controls="collapseThree12">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree12" class="collapse in" role="tabpanel" aria-labelledby="headingThree12"
                                             data-parent="#accordionEx6">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo14">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx8" href="#collapseTwo14"
                                                aria-expanded="false" aria-controls="collapseTwo14">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo14" class="collapse in" role="tabpanel" aria-labelledby="headingTwo14"
                                             data-parent="#accordionEx8">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree15">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx9" href="#collapseThree15"
                                                aria-expanded="false" aria-controls="collapseThree15">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree15" class="collapse in" role="tabpanel" aria-labelledby="headingThree15"
                                             data-parent="#accordionEx9">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo17">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx11" href="#collapseTwo17"
                                                aria-expanded="false" aria-controls="collapseTwo17">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo17" class="collapse in" role="tabpanel" aria-labelledby="headingTwo17"
                                             data-parent="#accordionEx11">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree18">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx12" href="#collapseThree18"
                                                aria-expanded="false" aria-controls="collapseThree18">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree18" class="collapse in" role="tabpanel" aria-labelledby="headingThree18"
                                             data-parent="#accordionEx12">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo20">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx14" href="#collapseTwo20"
                                                aria-expanded="false" aria-controls="collapseTwo20">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo20" class="collapse in" role="tabpanel" aria-labelledby="headingTwo20"
                                             data-parent="#accordionEx14">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree21">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx15" href="#collapseThree21"
                                                aria-expanded="false" aria-controls="collapseThree21">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree21" class="collapse in" role="tabpanel" aria-labelledby="headingThree21"
                                             data-parent="#accordionEx15">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo23">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx17" href="#collapseTwo23"
                                                aria-expanded="false" aria-controls="collapseTwo23">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo23" class="collapse in" role="tabpanel" aria-labelledby="headingTwo23"
                                             data-parent="#accordionEx17">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree24">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx18" href="#collapseThree24"
                                                aria-expanded="false" aria-controls="collapseThree24">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree24" class="collapse in" role="tabpanel" aria-labelledby="headingThree24"
                                             data-parent="#accordionEx18">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
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
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo25">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx20" href="#collapseTwo25"
                                                aria-expanded="false" aria-controls="collapseTwo25">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo25" class="collapse in" role="tabpanel" aria-labelledby="headingTwo25"
                                             data-parent="#accordionEx20">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree26">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx21" href="#collapseThree26"
                                                aria-expanded="false" aria-controls="collapseThree26">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree26" class="collapse in" role="tabpanel" aria-labelledby="headingThree26"
                                             data-parent="#accordionEx21">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                           <!--********************************************************************************************22 27-->
                           <div id="menu3" class="tab-pane fade">
                              <h3>4</h3>
                              
                               
                                                                                                                            
                              <div class="row">
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
                                    </div>
                                    <!--Accordion wrapper-->
                                    <div class="accordion md-accordion" id="accordionEx22" role="tablist" aria-multiselectable="true">
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo27">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx22" href="#collapseTwo27"
                                                aria-expanded="false" aria-controls="collapseTwo27">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo27" class="collapse in" role="tabpanel" aria-labelledby="headingTwo27"
                                             data-parent="#accordionEx22">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo28">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx23" href="#collapseTwo28"
                                                aria-expanded="false" aria-controls="collapseTwo28">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo28" class="collapse in" role="tabpanel" aria-labelledby="headingTwo28"
                                             data-parent="#accordionEx23">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree29">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx24" href="#collapseThree29"
                                                aria-expanded="false" aria-controls="collapseThree29">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree29" class="collapse in" role="tabpanel" aria-labelledby="headingThree29"
                                             data-parent="#accordionEx24">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
                                    </div>
                                    <!--Accordion wrapper 6-->
                                    <div class="accordion md-accordion" id="accordionEx25" role="tablist" aria-multiselectable="true">
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo30">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx16" href="#collapseTwo30"
                                                aria-expanded="false" aria-controls="collapseTwo30">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo30" class="collapse in" role="tabpanel" aria-labelledby="headingTwo30"
                                             data-parent="#accordionEx25">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo31">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx26" href="#collapseTwo31"
                                                aria-expanded="false" aria-controls="collapseTwo31">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo31" class="collapse in" role="tabpanel" aria-labelledby="headingTwo31"
                                             data-parent="#accordionEx26">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree24">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx27" href="#collapseThree32"
                                                aria-expanded="false" aria-controls="collapseThree32">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree32" class="collapse in" role="tabpanel" aria-labelledby="headingThree32"
                                             data-parent="#accordionEx27">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                 <div class="col-lg-4">
                                    <div class="sec_head">
                                       What's on
                                       <p class="Text-right"><i class=" fa fa-ellipsis-v"></i></p>
                                    </div>
                                    <!--Accordion wrapper 9-->
                                    <div class="accordion md-accordion" id="accordionEx28" role="tablist" aria-multiselectable="true">
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo33">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx28" href="#collapseTwo33"
                                                aria-expanded="false" aria-controls="collapseTwo33">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo33" class="collapse in" role="tabpanel" aria-labelledby="headingTwo33"
                                             data-parent="#accordionEx28">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingTwo34">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx29" href="#collapseTwo34"
                                                aria-expanded="false" aria-controls="collapseTwo34">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseTwo34" class="collapse in" role="tabpanel" aria-labelledby="headingTwo34"
                                             data-parent="#accordionEx29">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                       <!-- Accordion card -->
                                       <div class="card">
                                          <!-- Card header -->
                                          <div class="card-header" role="tab" id="headingThree35">
                                             <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx30" href="#collapseThree35"
                                                aria-expanded="false" aria-controls="collapseThree35">
                                                <h5 class="mb-0">
                                                   Today <i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                             </a>
                                          </div>
                                          <!-- Card body -->
                                          <div id="collapseThree35" class="collapse in" role="tabpanel" aria-labelledby="headingThree35"
                                             data-parent="#accordionEx30">
                                             <div class="card-body">
                                                <div class="card-txt">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="small_company_logo">
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                                                            <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="icn">
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
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </body>
</html>