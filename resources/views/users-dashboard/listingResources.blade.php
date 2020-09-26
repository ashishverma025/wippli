@extends('sites.layout.tutor')
@section('content')
<?php
$userDetails = getUserDetails();
$LcDetails = getLcDetails();
$imgFolder = ($userDetails->user_type == '4') ? 'student' : 'tutor';
?>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 nopadding sidebar">
    <div class="sidebar-menu">
        <ul>
            <li class=""><a href="{{url('listing/listing_request')}}">Your Tutor Request</a></li>
            <li class=""><a href="{{url('listing/listing_class')}}">Your Classes</a></li>
            <li class="active"><a href="{{url('listing')}}">Your Resources</a></li>
        </ul>
    </div> 

    <a href="#" class="sidebar-link">View Profile</a> 	      
</div>


<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 nopadding">

    <div class="desc-container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <strong>Tutify is a sharing space.</strong> Support the community and be rewarded. Reach out to students in
        a bigger way, both locally and overseas. Resources uploaded on your channel can boost your 
        credentials and your income. <a href="#" class="linkText">Learn more</a>.		
    </div>
    <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
        <h3 class="res-heading">Upload Resources</h3>
        <div class="resources-content">
            <div class="drop-file-block-outer">
                <div class="drop-file-block">
                    <div class="drop-area">
                        <img src="{{url('public/sites/users/images/upload.png')}}" class="img-responsive drop-icon">       
                        <span class="linkText">Drop files here</span>
                        <p class="file-type">PDF, DOC, XLS, JPG, MP3, MP4, WMV, MKV</p>
                    </div>
                </div>
            </div>

            <div class="resources-inner-content clearfix">
                <div class="upload-loading" style="display: none">
                    <img src="{{url('public/sites/users/images/loader.gif')}}">
                    <span class="load-text">Uploading...</span>
                </div>

                <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                        <img src="{{url('public/sites/users/images/sub1.jpg')}}" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                        <h3 class="material-heading">Additional Mathematics - Trigonometry</h3>
                        <textarea class="form-control textarea" placeholder="What are the learning objectives of this resource? For what ages is this suitable for?"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                        <div class="price-area clearfix">
                            <div class="select">
                                <select name="">
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                            <input type="text" name="price" class="price-input">
                        </div>
                    </div>
                </div>

                <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                        <img src="{{url('public/sites/users/images/sub2.jpg')}}" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                        <h3 class="material-heading">Additional Mathematics - Trigonometry</h3>
                        <textarea class="form-control textarea" placeholder="What are the learning objectives of this resource? For what ages is this suitable for?"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                        <div class="price-area clearfix">
                            <div class="select">
                                <select name="">
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                            <input type="text" name="price" class="price-input">
                        </div>
                    </div>
                </div>

                <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                        <img src="{{url('public/sites/users/images/sub3.jpg')}}" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                        <h3 class="material-heading">Additional Mathematics - Trigonometry</h3>
                        <textarea class="form-control textarea" placeholder="What are the learning objectives of this resource? For what ages is this suitable for?"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                        <div class="price-area clearfix">
                            <div class="select">
                                <select name="">
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                            <input type="text" name="price" class="price-input">
                        </div>
                    </div>
                </div>

                <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                        <img src="{{url('public/sites/users/images/sub4.jpg')}}" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                        <h3 class="material-heading">Additional Mathematics - Trigonometry</h3>
                        <textarea class="form-control textarea" placeholder="What are the learning objectives of this resource? For what ages is this suitable for?"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                        <div class="price-area clearfix">
                            <div class="select">
                                <select name="">
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                            <input type="text" name="price" class="price-input">
                        </div>
                    </div>
                </div>

                <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                        <img src="{{url('public/sites/users/images/sub1.jpg')}}" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                        <h3 class="material-heading">Additional Mathematics - Trigonometry</h3>
                        <textarea class="form-control textarea" placeholder="What are the learning objectives of this resource? For what ages is this suitable for?"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                        <div class="price-area clearfix">
                            <div class="select">
                                <select name="price-type">
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                            <input type="text" name="price" class="price-input">
                        </div>
                    </div>
                </div>

                <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 nopadding">
                        <label>Relevance</label>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 ">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="select select-block">
                                <select name="syllabus" class="material-select">
                                    <option value="">Syllabus</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="select select-block">
                                <select name="subject" class="material-select">
                                    <option value="">Subject</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <input type="text" name="topic" class="material-text" placeholder="Topic">
                        </div>

                    </div>
                </div>

                <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding" style="border:none">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 nopadding">
                        <label>Preview</label>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <input type="submit" value="Add Sample" class="addBtn">
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
        <h3 class="res-heading">Published Resources</h3>
        <div class="resources-content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <input type="button" value="Sort by" class="flatbtn">
            </div>
            <div class="subjectslider clearfix">
                <div class="heading-container col-lg-11 col-md-12 col-sm-12 col-xs-12 ">
                    <h2 class="sliderHeading">Additional Mathematics <span>2 Awaiting Approval</span></h2>
                    <a href="#" class="viewall-btn">View All</a>
                </div>
                <div id="sub-slider1" class="clearfix owl-carousel owl-theme" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 2196px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-366px, 0px, 0px);"><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div></div></div>











                    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div>
            </div>


            <div class="subjectslider clearfix">
                <div class="heading-container col-lg-11 col-md-12 col-sm-12 col-xs-12 ">
                    <h2 class="sliderHeading">Chemistry</h2>
                    <a href="#" class="viewall-btn">View All</a>
                </div>
                <div id="sub-slider2" class="clearfix owl-carousel owl-theme" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 2196px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-366px, 0px, 0px);"><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                            <div class="owl-item" style="width: 183px;"><div class="item">
                                    <div class="item-inner">
                                        <img src="{{url('public/sites/users/images/slide1.jpg')}}" class="img-responsive slider-img">
                                        <div class="slider-text">
                                            <h4>Master Google AdWords With The Longest Udemy AdWords...</h4>
                                            <p>Isaac Rudansky, Certified Google AdWords Pro | Co-founder of...</p>
                                            <span class="rating"><img src="{{url('public/sites/users/images/5-star.jpg')}}">(18)</span>
                                            <div class="slider-footer clearfix">
                                                <div class="slider-price"><h4>S$35</h4> <p>S$2013</p></div>
                                                <a href="" class="sub-edit">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div></div></div></div>

                    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div>
            </div>

            <div class="subjectslider clearfix">
                <div class="heading-container col-lg-11 col-md-11 col-sm-12 col-xs-12 ">
                    <h2 class="sliderHeading">Physics</h2>
                </div>
                <div class="clearfix col-lg-11 col-md-11 col-sm-12 col-xs-12">
                    <p class="material-bold not-exist">No existing resources</p>
                </div>
            </div>
        </div>
    </div>


    <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 your-compilations-sec nopadding">
        <h3 class="res-heading">Your Compilations</h3>
        <div class="resources-content paddingtop-none">
            <div class="resources-inner-content clearfix paddingtop-none">
                <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding noborder">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                        <img src="{{url('public/sites/users/images/sub2.jpg')}}" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                        <h3 class="material-heading">Additional Math - Trigonometry Series</h3>
                        <textarea class="form-control textarea" placeholder="What are the learning objectives of this resource? For what ages is this suitable for?"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">

                        <div class="price-with-add clearfix" style="position: relative;">
                            <div class="price-area clearfix marginnone">
                                <div class="select">
                                    <select name="">
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                                <input type="text" name="price" class="price-input">
                            </div>

                            <div class="files">3 Files</div>
                            <input type="submit" value="Add" class="addBtn rightalign-btn">

                            <button type="button" class="added-compilation-show material-show">
                                <img class="img-responsive" src="{{url('public/sites/users/images/more-filter-down-arrow.png')}}">
                            </button>
                        </div>

                    </div>
                </div>

                <div class="hide-material-sec" style="display:none">
                    <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                            <img src="{{url('public/sites/users/images/sub1.jpg')}}" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                            <h3 class="material-heading black">Additional Math - Trigonometry Series</h3>
                            <p class="material-bold">Learn the trigonometric identities and shortcuts to
                                solving trigo equations! Suitable for Ages 13-16.</p>
                            <a href="#" class="course-link">O Level</a>
                            <a href="#" class="course-link">Additional Mathematics</a>
                            <a href="#" class="course-link">Trigonometry  </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                            <div class="price-area clearfix marginnone">
                                <strong>US$12.99</strong>
                            </div>
                            <a href="#" class="removeLink">Remove</a>
                        </div>
                    </div>
                </div>

                <div class="hide-material-sec" style="display:none">
                    <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                            <img src="{{url('public/sites/users/images/sub1.jpg')}}" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                            <h3 class="material-heading black">Additional Math - Trigonometry Series</h3>
                            <p class="material-bold">Learn the trigonometric identities and shortcuts to
                                solving trigo equations! Suitable for Ages 13-16.</p>
                            <a href="#" class="course-link">O Level</a>
                            <a href="#" class="course-link">Additional Mathematics</a>
                            <a href="#" class="course-link">Trigonometry  </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                            <div class="price-area clearfix marginnone">
                                <strong>US$12.99</strong>
                            </div>
                            <a href="#" class="removeLink">Remove</a>
                        </div>
                    </div>
                </div>

                <div class="hide-material-sec" style="display:none">
                    <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                            <img src="{{url('public/sites/users/images/sub1.jpg')}}" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                            <h3 class="material-heading black">Additional Math - Trigonometry Series</h3>
                            <p class="material-bold">Learn the trigonometric identities and shortcuts to
                                solving trigo equations! Suitable for Ages 13-16.</p>
                            <a href="#" class="course-link">O Level</a>
                            <a href="#" class="course-link">Additional Mathematics</a>
                            <a href="#" class="course-link">Trigonometry  </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                            <div class="price-area clearfix marginnone">
                                <strong>US$12.99</strong>
                            </div>
                            <a href="#" class="removeLink">Remove</a>
                        </div>
                    </div>
                </div>

                <input type="button" value="Create New" class="flatbtn create-new" data-toggle="modal" data-target="#resources-popup">

            </div>
        </div>
    </div>

    <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 your-promo-code-sec nopadding">
        <h3 class="res-heading">Your Promo Codes</h3>
        <div class="resources-content">
            <div class="resources-inner-content clearfix paddingtop-none">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 promo-code nopadding">
                    <form name="promo-code" id="promocode-form" action="" method="post">
                        <input type="text" placeholder="Enter Promo Code" class="promo-code-input form-control">
                        <input type="text" placeholder="Start Date" class="start-date form-control">
                        <span class="date-arrow"><img src="{{url('public/sites/users/images/left-arrow.png')}}"></span>
                        <input type="text" placeholder="End Date" class="end-date form-control">
                        <div class="select">
                            <select name="">
                                <option value="USD">USD</option>
                            </select>
                        </div>
                        <input type="text" placeholder="9.99" class="promo-price form-control ">
                        <button class="add-btn" type="submit"> Create</button>
                    </form>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 promo-code-toggle nopadding">
                    <button class="add-btn active-btn" type="submit"> Active</button>
                    <span class="linkText">FUNMATH2016</span>
                    <button type="button" class="promo-list promo-show">
                        <img class="img-responsive" src="{{url('public/sites/users/images/more-filter-down-arrow.png')}}">
                    </button>
                </div>

                <div class="hide-promo-sec clearfix" style="display:none">

                    <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding noborder">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 nopadding">
                            <div class="select select-block">
                                <select name="syllabus" class="material-select">
                                    <option value="">Status</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <p class="material-bold cal">1 April 2016 - 31 Dec 2016</p>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3">
                            <div class="price-area clearfix marginnone">
                                <div class="select">
                                    <select name="">
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                                <input type="text" name="price" class="price-input">
                            </div>


                        </div>

                    </div>

                    <div class="material-list material-list-head col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding noborder">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 nopadding">
                            <label>Apply To</label>
                            <input type="submit" value="Add" class="addBtn">
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 nopadding">
                            <div class="files">3 Files</div>
                        </div>
                    </div>

                    <div class="material-list col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 nopadding material-list-img-block">
                            <img src="{{url('public/sites/users/images/sub1.jpg')}}" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 material-list-content">
                            <h3 class="material-heading black">Additional Math - Trigonometry Series</h3>
                            <p class="material-bold">Learn the trigonometric identities and shortcuts to
                                solving trigo equations! Suitable for Ages 13-16.</p>
                            <a href="#" class="course-link">O Level</a>
                            <a href="#" class="course-link">Additional Mathematics</a>
                            <a href="#" class="course-link">Trigonometry  </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 material-list-price">
                            <div class="price-area clearfix marginnone">
                                <strong>US$12.99</strong>
                            </div>
                            <a href="#" class="removeLink">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="add-btn big" type="submit"> Save</button>
</div>

<script>
    $('.chk_plan_btn').click(function () {
        var type = $(this).data('type');
        $.ajax({
            url: "http://tutify.com.sg/Ajax_functions/checkPlanData",
            data: {'type': type},
            type: "Post",
            datatype: 'json',
            beforeSend: function () {
                $('.model-loader').show();
            },
            success: function (res) {
                if (res == 1) {
                    if (type == 'group')
                        $('#create-group').modal('show');
                    else if (type == 'class')
                        $('#create-class').modal('show');
                } else {
                    $('#plan_check_modal').modal('show');
                }

            }
        });
    });
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip(
                {
                    //selector: '#viewport',
                    //padding: 0,
                    html: true,
                    //placement: "bottom",
                    //delay: 1000,
                    //delay: {show: 500, hide: 100},
                }
        );
    });

    $("#menu-arrow").click(function () {
        $(this).parent().parent().parent().find('#menu-list').slideToggle();
        if (jQuery(this).find('img').attr('src') == "{{url('public/sites/users/images/menu-down-arrow.png')}}")
            jQuery(this).find('img').attr('src', "http://tutify.com.sg/assets/images/menu-close-arrow.png");
        else if (jQuery(this).find('img').attr('src') == "http://tutify.com.sg/assets/images/menu-close-arrow.png")
            jQuery(this).find('img').attr('src', "http://tutify.com.sg/assets/images/menu-down-arrow.png");
    });

    window.onload = function (e) {
        var url_list = ["dashboard", "inbox", "listing", "engagements", "users", "account", "subscribe"];
        var uri1 = 'listing';

        var sess_id = "61";
        if (sess_id > 0) {
            new_message();
            setInterval(new_message, 60000);
        }

        if ($.inArray(uri1, url_list) != -1)
        {
            var uri2 = '';
            if (uri2) {
                var uri1 = uri1 + "/" + uri2;
            }
            $.ajax({
                url: "http://tutify.com.sg/Inbox/visited",
                data: {'val': uri1},
                type: "Post",
                datatype: 'json',
                success: function (res) {}
            });
        }
    }

    function new_message() {
        $.ajax({
            url: "http://tutify.com.sg/ajax_functions/getUnreadMsg",
            data: {},
            type: "Post",
            datatype: 'json',
            success: function (res) {
                if (res > 0) {
                    $('.msg-count').removeClass('hidden');
                    $('.msg-count span').text(res);
                } else {
                    $('.msg-count').addClass('hidden');
                }

            }
        })
    }

    $("#searchHelp").keyup(function (e) {
        val = $("#searchHelp").val();
        $("#helpResult").html("<img class=img-responsive src='http://tutify.com.sg/assets/images/loader.gif'>");
        $("#search_desc_div").html('');
        if (val.length >= 1) {
            $.ajax({
                url: "http://tutify.com.sg/Help/fetchHeading",
                data: {'search_text': val},
                type: "Post",
                datatype: 'json',
                success: function (data) {
                    if (data) {
                        data = JSON.parse(data);
                        $("#helpResult").html('');
                        $("#resultTitle").html("<h5>Help Center Result for :'" + val + "'</h5>");
                        $.each(data, function (index, value) {
                            $("#helpResult").append("<li data-id=" + value.id + "><a href=# class=getdesc>" + value.heading + "</a></li>");
                        });
                    }
                }
            })
        }
    })

    $(document).on('click', '.getdesc', function () {
        var val1 = $(this).parent().data("id");
        $("#search_desc_div").show();
        $("#search_btn_div").hide();
        $("#search_list_div").hide();
        $.ajax({
            url: "http://tutify.com.sg/Help/fetchDesc",
            data: {'help_id': val1},
            type: "Post",
            datatype: 'json',
            success: function (data) {
                if (data) {
                    data = JSON.parse(data);
                    $.each(data, function (index, value) {
                        $("#search_desc_div").append(value.description)
                    })
                }
            }
        })
        $("#arrowDisplayDiv").show();
    })
    $(document).on('click', '#arrowDisplayIcon', function () {
        $("#search_btn_div").show();
        $("#search_desc_div").hide();
        $("#search_list_div").show();
        $("#arrowDisplayDiv").hide();
    })

    /*(function($) {
     "use strict";
     function positionModals(e) {
     var $this = $(this).css('display', 'block'),
     $window = $(window),
     $dialog = $this.find('.modal-dialog'),
     offset = ($window.height() - $window.scrollTop() - $dialog.height()) / 2,
     marginBottom = parseInt($dialog.css('margin-bottom'), 10);
     
     $dialog.css('margin-top', offset < marginBottom ? marginBottom : offset);
     }
     
     $(document).on('show.bs.modal', '.modal', positionModals);
     
     $(window).on('resize', function(e) {
     $('.modal:visible').each(positionModals);
     });
     }(jQuery));
     */
</script>

<script>

    jQuery.smoothScroll();

    jQuery(document).ready(function () {

        jQuery("#sub-slider1,#sub-slider2").owlCarousel({
            navigation: true,
            items: 4,
            pagination: false,
            //transitionStyle : "fade",
            autoPlay: 5000,
            stopOnHover: true,
            itemsDesktop: [1920, 4], //5 items between 1000px and 901px
            itemsDesktopSmall: [1200, 3], // betweem 900px and 601px
            itemsTablet: [640, 2], //2 items between 600 and 0
            itemsMobile: [400, 1],
            navigationText: ["", ""]

        });

    });

    $(".material-show").click(function () {
        $(this).parent().parent().find('.hide-material-sec').toggle();
        if (jQuery(this).find('img').attr('src') == "{{url('public/sites/users/images/more-filter-down-arrow.png')}}")
            jQuery(this).find('img').attr('src', "http://tutify.com.sg/assets/images/more-filter-up-arrow.png");
        else
            jQuery(this).find('img').attr('src', "{{url('public/sites/users/images/more-filter-down-arrow.png')}}");
    });

    $(".promo-show").click(function () {

        $(this).parent().parent().find('.hide-promo-sec').toggle();
        if (jQuery(this).find('img').attr('src') == "{{url('public/sites/users/images/more-filter-down-arrow.png')}}")
            jQuery(this).find('img').attr('src', "{{url('public/sites/users/images/more-filter-up-arrow.png')}}");
        else
            jQuery(this).find('img').attr('src', "{{url('public/sites/users/images/more-filter-down-arrow.png')}}");
    });


    $(document).ready(function () {
        $('.nav_bar').click(function () {
            $('.mob-navigation').toggleClass('visible');
            $('body').toggleClass('opacity');
        });
    });
</script>

@endsection