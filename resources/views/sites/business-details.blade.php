<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Business-details</title>
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
      <section class="form1 form business_form">
         <div class="container">
            <div class="row">
               <div class="col-lg-9">
                  <div class="form_inner">
                     <div class="header">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="logo">
                                 <img src="{{url('public/wippli/img/logo.jpg')}}" alt="logo">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="logo-right-txt text-right">
                                 <p class="user">User
                                 <!--   <img src="img/Group%201087.png" alt="ftr-logo">  -->
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-txt">
                        <div class="tabs">
                              <p class="header_txt">Please complete all the required information</p>
                              <ul class="nav nav-tabs">
                                 <li class="active"><a data-toggle="tab" href="#home">Business</a></li>
                                 <li><a data-toggle="tab" href="#menu1">Contact</a></li>
                                 <!--   <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                                    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>  -->
                              </ul>
                              <div class="tab-content">
                              <form action="save-business-details" method="post">
                              @csrf
                                 <div id="home" class="tab-pane fade in active">
                                     <div class="row row-border-dash">
                                     <div class="col-lg-12">
                                         <h3>Business Details</h3>
                                         </div>
                                     </div>
                                    
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Business Name <span>*</span></label>
                                             <input type="text" name="business_name" class="form-control"  placeholder="{Businessname}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Business legal name <span>*</span></label>
                                             <input type="text" name="business_legal_name" class="form-control"  placeholder="{Businessname}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Business Branch <span>*</span></label>
                                             <input type="text" name="business_branch" class="form-control"  placeholder="{Businessnumber}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Industry <span>*</span></label>
                                             <input type="text" name="industry" class="form-control"  placeholder="{Businessindustry}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Business Short Name <span>*</span></label>
                                             <input type="text" name="business_sort_name" class="form-control"  placeholder="{Businesssystemname}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Business Initials <span>*</span></label>
                                             <input type="text" name="business_initials" class="form-control"  placeholder="{Businessinitials}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Business Number <span>*</span></label>
                                             <input type="text" name="business_number" class="form-control"  placeholder="{Businessnumber}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Business Number Type <span>*</span></label>
                                             <input type="text" name="business_number_type" class="form-control"  placeholder="{bnumbertype}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Tax number <span>*</span></label>
                                             <input type="text" name="tax_number" class="form-control"  placeholder="{Businesstaxname}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Tax Number Type <span>*</span></label>
                                             <input type="text" name="tax_number_type" class="form-control"  placeholder="{taxnumbertype}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>Address</h3>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Country <span>*</span></label>
                                             <input type="text" name="country" class="form-control"  placeholder="{businesscountry}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>State <span>*</span></label>
                                             <input type="text" name="state" class="form-control"  placeholder="{businesstate}">

                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Address line 1 <span>*</span></label>
                                             <input type="text" name="address1" class="form-control"  placeholder="{businessaddress1}">

                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Address line 2 <span>*</span></label>
                                             <input type="text" name="address2" class="form-control"  placeholder="{businessaddress2}">

                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>City <span>*</span></label>
                                             <input type="text" name="city" class="form-control"  placeholder="{businesscity}">

                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Post code <span>*</span></label>
                                             <input type="text" name="post_code" class="form-control"  placeholder="{businesspostcode}">

                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Business E-mail</label>
                                             <input type="text" name="email" class="form-control"  placeholder="{businessemail}">

                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Contact name (Admin)</label>
                                             <input type="text" name="contact" class="form-control"  placeholder="{Businesscontactname}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>Roles and permissions</h3>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Type of Business <span>*</span></label>
                                             <input type="text" name="business_type" class="form-control"  placeholder="{Businesstype}">

                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Afiliation <span>*</span></label>
                                             <input type="text" name="afiliation" class="form-control"  placeholder="{Businessafiliation}">

                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>Social</h3>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Linkedin</label>
                                             <input type="text" name="linkedin" class="form-control"  placeholder="{businesslinkedin}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Twitter</label>
                                             <input type="text" name="twitter" class="form-control"  placeholder="{businesstwitter}">

                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Instagram</label>
                                             <input type="text" name="instagram" class="form-control"  placeholder="{businessinstagram}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Facebook</label>
                                             <input type="text" name="facebook" class="form-control"  placeholder="{businessfacebook}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Youtube</label>
                                             <input type="text" name="youtube" class="form-control"  placeholder="{businessyoutube}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Anything else</label>
                                             <input type="text" name="anythingelse" class="form-control"  placeholder="{businessanythingelse}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>Branding</h3>
                                       </div>
                                    </div>
                                    <div class="row grey_row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Colour Logo file(png,svg-600x400px)</label>
                                             <input type="text" name="logocolours" class="form-control"  placeholder="{businesslogocolours}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Color icon file(png,svg-600x400px)</label>
                                             <input type="text" name="coloricon" class="form-control"  placeholder="{businessiconcolours}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row grey_row row-border-dash">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Negative Logo file(png,svg-600x400px)</label>
                                             <input type="text" class="form-control"  placeholder="{businesslogonegative}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Negative icon file(png,svg-600x400px)</label>
                                             <input type="text" name="iconnegative" class="form-control"  placeholder="{businessiconnegative}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Primary Dark colour 1 <span>*</span></label>
                                             <input type="text" name="primarydarkcolour1" class="form-control"  placeholder="{PrimaryDarkcolour1}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Primary Dark colour 2 <span>*</span></label>
                                             <input type="text" name="primarydarkcolour2" class="form-control"  placeholder="{PrimaryDarkcolour2}">

                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Primary Light colour 1 <span>*</span></label>
                                             <input type="text" name="primarylightcolour1" class="form-control"  placeholder="{PrimaryLightcolour1}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Primary Light colour 2 <span>*</span></label>
                                             <input type="text" name="primarylightcolour2" class="form-control"  placeholder="{PrimaryLightcolour2}">

                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>File Management</h3>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>G-drive directory <span></span></label>
                                             <input type="text" name="businessdrive" class="form-control"  placeholder="{businessdrive}">  
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Dropx directory <span>*</span></label>
                                             <input type="text" name="businessdropbox" class="form-control"  placeholder="{businessdropbox}">  
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row btnn-business">
                                       <div class="col-lg-4">
                                          <button type="button" class="btn form-btn">Cancel</button>
                                       </div>
                                       <div class="col-lg-4">
                                          <button type="submit" class="btn form-btn">Save</button>
                                       </div>
                                       <div class="col-lg-4">
                                          <button type="button" class="btn form-btn">New branch</button>
                                       </div>
                                    </div>
                                     
                                 </div>
                              </form>



                              <form>
                                <div id="menu1" class="tab-pane fade">
                                     <div class="row row-border-dash">
                                     <div class="col-lg-12">
                                         <h3>Afiliation</h3>
                                         </div>
                                     </div>
                                    
                                                                          
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Organisation <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{contactorganisation}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Branch <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{contactbranch}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                                   <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>Contact Details</h3>
                                       </div>
                                    </div>
                                     
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>First Name <span>*</span></label>
                                             <input type="text" class="form-control"  placeholder="{contactalias}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Surname <span>*</span></label>
                                             <input type="text" class="form-control"  placeholder="{contactsurname}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Known as <span>*</span></label>
                                             <input type="text" class="form-control"  placeholder="{contactalias}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>Initials (2 digits) <span>*</span></label>
                                             <input type="text" class="form-control"  placeholder="{contactinitials} {CN}">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <label>TBC1 <span>*</span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{Ctbc1}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                           

                                     
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Position <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{contactposition}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Department <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{contactdepartment}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                     
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>E-mail <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{contactemail}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Phone Number <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{contactphonenumber}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Mobile Number <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{contactmobilenumber}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>TBC@ <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{ctbc2}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                     
                                      <div class="row row-border-dash">
                                     <div class="col-lg-6">
                                         <h3>Address</h3>
                                         </div>
                                                  <div class="col-lg-6 text-right-check">
                                       <div class="form-group">
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="gridCheck">
                                             <label class="form-check-label" for="gridCheck">
                                             Same as Business/Branch address
                                             </label>
                                          </div>
                                       </div>
                                         </div>
                                     </div>
                                     
                                     
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Country <span>*</span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businesscountry}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>State <span>*</span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businessstate}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Address line 1 <span>*</span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businessaddress1}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Address line 2 <span>*</span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businessaddress2}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>City <span>*</span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businesscity}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Post code <span>*</span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businesspostcode}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>Roles and permissions</h3>
                                       </div>
                                    </div>
                       
                                    <div class="row">
                                    <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Type <span>*</span></label>
                                             <input type="text" class="form-control"  placeholder="{contactype}">
                                          </div>
                                       </div>
                                        
                                                                <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Role <span>*</span></label>
                                             <input type="text" class="form-control"  placeholder="{contactrole}">
                                          </div>
                                       </div>
                                    </div>
                                                                         <div class="row">
                                    <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Email Notifications <span>*</span></label>
                                             <input type="text" class="form-control"  placeholder="{contactnotification}">
                                          </div>
                                       </div>
                                    </div>
                                     
                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>Social</h3>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Linkedin</label>
                                             <input type="text" class="form-control"  placeholder="{businesslinkedin}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Twitter</label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businesstwitter}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Instagram</label>
                                             <input type="text" class="form-control"  placeholder="{businessinstagram}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Facebook</label>
                                             <input type="text" class="form-control"  placeholder="{businessfacebook}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Youtube</label>
                                             <input type="text" class="form-control"  placeholder="{businessyoutube}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Anything else</label>
                                             <input type="text" class="form-control"  placeholder="{businessanythingelse}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>Branding</h3>
                                       </div>
                                    </div>
                                    <div class="row grey_row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Colour Logo file(png,svg-600x400px)</label>
                                             <input type="text" class="form-control"  placeholder="{businesslogocolours}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Color icon file(png,svg-600x400px)</label>
                                             <input type="text" class="form-control"  placeholder="{businessiconcolours}">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row grey_row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Negative Logo file(png,svg-600x400px)</label>
                                             <input type="text" class="form-control"  placeholder="{businesslogonegative}">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Negative icon file(png,svg-600x400px)</label>
                                             <input type="text" class="form-control"  placeholder="{businessiconnegative}">
                                          </div>
                                       </div>
                                    </div>
                                     
                                 
                                    <div class="row row-border-dash">
                                       <div class="col-lg-12">
                                          <h3>File Management</h3>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>G-drive directory <span></span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businessdrive}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label>Dropx directory <span>*</span></label>
                                             <select class="form-control" id="exampleFormControlSelect1">
                                                <option>{businessdropbox}</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row btnn-business">
                                       <div class="col-lg-4">
                                          <button type="button" class="btn form-btn">Cancel</button>
                                       </div>
                                       <div class="col-lg-4">
                                          <button type="button" class="btn form-btn">Save</button>
                                       </div>
                                       <div class="col-lg-4">
                                          <button type="button" class="btn form-btn">New branch</button>
                                       </div>
                                    </div>
                                     
                                     
                                     
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="form-ftr">
                        <p>Powerd By
                           <img src="{{url('public/wippli/img/Group%201087.png')}}" alt="ftr-logo">
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="form_inner boomi_actions">
                     <div class="header bimmo_header">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="wipl_logo">
                                 Go to
                              </div>
                              <div class="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-txt boomi_action_txt businnes_right_side">
                              <ul>
                                 <li><a href="#">Business Affiliation</a> </li>
                                 <li><a href="#">Contact Details</a> </li>
                                 <li><a href="#">Address</a> </li>
                                 <li><a href="#">Roles and permissions</a> </li>
                                 <li><a href="#">Social</a> </li>
                                 <li><a href="#">Branding</a> </li>
                                 <li><a href="#">File management</a> </li>
                                 <li><a href="#">Actions</a> </li>
                              </ul>
                           </div>
                        </div>
                     </div>
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