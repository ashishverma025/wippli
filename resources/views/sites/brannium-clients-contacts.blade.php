<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Forms Third</title>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="route" content="{{ url('/') }}">
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
                              <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="logo"> 
                              <h3>People <span>Setting</span></h3>
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
               <div class="form-txt form-txt-third people-seting">
                  <div class="tabs">
                     <form>
                        <ul class="nav nav-tabs third-tab ">
                           <li ><a href="{{url('business-details')}}">New Contact</a></li>
                           <li class="active"><a data-toggle="tab" href="#menu1">Brannium</a></li>
                           <li><a data-toggle="tab" href="#menu2">Clients</a></li>
                           <li><a data-toggle="tab" href="#menu3">Contacts</a></li>
                        </ul>
                        <div class="tab-content">
                           <div id="home" class="tab-pane">
                              <h3>1</h3>

                           </div>
                           <!--********************************************************************************************-->
                           <div id="menu1" class="tab-pane fade in active">
                              <h3>2</h3>
                              <div class="box-wht">
                                 <div class="row white-bg">
                                    <div class="col-lg-3 bdr-rit">
                                       <div class="logo-inner">
                                          <img src="{{url('public/wippli/img/bimmo_logo.jpg')}}" alt="innerlogo">
                                       </div>
                                    </div>
                                    <div class="col-lg-9 border-left">
                                       <div class="logo-inner-txt">
                                          <ul>
                                             <li><i class="fab fa-linkedin-in"></i></li>
                                             <li><i class="fab fa-twitter"></i></li>
                                             <li><i class="fas fa-pencil-alt"></i></li>
                                             <li><i class="fas fa-trash"></i></li>
                                             <li><i class="fas fa-ellipsis-v"></i></li>
                                          </ul>
                                          <b>Brannium PTY LTD</b>
                                          <p>19 114 North Steyne, Manly, NSW, 2095 <br>ABN 1234567</p>
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
                                       <li><i class="fas fa-search"></i></li>
                                    </ul>
                                 </div>
                              </div>
                              @if(!empty($businessDetails))
                              @foreach($businessDetails as $bDetails)
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
                                             <div class="grid-inner-txt">{{$bDetails->business_name}}</div>
                                          </div>
                                       </li>
                                       <li>Director</li>
                                       <li>Brannium</li>
                                       <li>{{$bDetails->email}}</li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Resource</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Superuser</option>
                                             <option>...</option>
                                          </select>
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
                                             <li><i class="fas fa-pencil-alt"></i></li>
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
                           <!--********************************************************************************************13 19-->
                           <div id="menu2" class="tab-pane fade">
                              <h3>3</h3>
                              <div class="box-wht">
                                 <div class="row white-bg">
                                    <div class="col-lg-3">
                                       <div class="logo-inner">
                                          <img src="{{url('public/wippli/img/bimmo_logo.jpg')}}" alt="innerlogo">
                                       </div>
                                    </div>
                                    <div class="col-lg-4">
                                       <div class="logo-inner-txt">
                                          <b>Brannium PTY LTD</b>
                                          <p>19 114 North Steyne, Manly, NSW, 2095 <br>ABN 1234567</p>
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
                              <div class="box-wht">
                                 <div class="row white-bg">
                                    <div class="col-lg-3">
                                       <div class="logo-inner">
                                          <img src="{{url('public/wippli/img/bimmo_logo.jpg')}}" alt="innerlogo">
                                       </div>
                                    </div>
                                    <div class="col-lg-4">
                                       <div class="logo-inner-txt">
                                          <b>Brannium PTY LTD</b>
                                          <p>19 114 North Steyne, Manly, NSW, 2095 <br>ABN 1234567</p>
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
                              <div class="box-wht">
                                 <div class="row white-bg">
                                    <div class="col-lg-3">
                                       <div class="logo-inner">
                                          <img src="{{url('public/wippli/img/bimmo_logo.jpg')}}" alt="innerlogo">
                                       </div>
                                    </div>
                                    <div class="col-lg-4">
                                       <div class="logo-inner-txt">
                                          <b>Brannium PTY LTD</b>
                                          <p>19 114 North Steyne, Manly, NSW, 2095 <br>ABN 1234567</p>
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
                           </div>
                           <!--********************************************************************************************22 27-->
                           <div id="menu3" class="tab-pane fade">
                              <h3>4</h3>
                               <div class="people-seting-contact">
                                   <div class="tabs">
                              <ul class="nav nav-tabs contact-nav ">
                                 <li class="active"><a data-toggle="tab" href="#boomi">BOOMI</a></li>
                                 <li><a data-toggle="tab" href="#agencies">AGENCIES</a></li>
                              </ul>
                               
                               <div class="tab-content">
                                     <div id="boomi" class="tab-pane fade active in">    
                                         <p>boomi</p>
                                         
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
                               
                              @if(!empty($businessDetails))
                              @foreach($businessDetails as $bDetails)
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
                                             <div class="grid-inner-txt">{{$bDetails->business_name}}</div>
                                          </div>
                                       </li>
                                       <li>Director</li>
                                       <li>Brannium</li>
                                       <li>{{$bDetails->email}}</li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Resource</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Superuser</option>
                                             <option>...</option>
                                          </select>
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
                                             <li><i class="fas fa-pencil-alt"></i></li>
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
                               
                               <div id="agencies" class="tab-pane fade">
                                   <p>agencies</p>
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
                                             <div class="grid-inner-txt">Jay Marcano</div>
                                          </div>
                                       </li>
                                       <li>Director</li>
                                       <li>Brannium</li>
                                       <li>jm@brannium.com</li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Resource</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Superuser</option>
                                             <option>...</option>
                                          </select>
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
                                             <li><i class="fas fa-pencil-alt"></i></li>
                                             <li><i class="fas fa-trash"></i></li>
                                             <li><i class="fas fa-ellipsis-v"></i></li>
                                          </ul>
                                       </div></li>
                                    </ul>
                                 </div>
                              </div>
                              
                                         
                               </div>
                               </div>
                               </div>
                               </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="{{ url('public/wippli/js/custom-dashboard.js') }}"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </body>
</html>