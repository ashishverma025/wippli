@extends('sites.layout.tutor')
@section('content')
<div class="referrals-app">
    <div class="header-cover background-cover">
        <div class="container">
            <div class="row space-8">
                <div class="col-sm-11 col-md-10 col-lg-9 col-center">
                    <div class="va-container va-container-v va-container-h">
                        <div class="va-middle text-center text-contrast">
                            <!--img class="media-photo media-round profile-photo space-top-sm-4 space-top-8 hidden-sm" src="" alt=""-->
                            <h2><span>Earn up to $137 SGD for everyone you invite.</span></h2>
                            <div class="hero-subtext-md-lg">
                                <span>Invite Your Email Contacts</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-sm-offset-4 text-center imageblock">
                                <img src="http://54.179.188.91/public/sites/users/img/gmail.png" class="img-responsive"/>
                                <p>Gmail</p>
                            </div>
                            <div class="col-md-2 text-center imageblock">
                                <img src="http://54.179.188.91/public/sites/users/img/yahoo.png" class="img-responsive"/>
                                <p>Yahoo! Mail</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shareboxbottom">
        <div class="container">
            <!--div class="visible-sm">
                <div class="space-1">
                    <a class="btn btn-primary btn-large btn-block btn-font-normal social-share-btn" href="">
                        <span>Invite Friends by Email</span>
                    </a>
                </div>
                <div class="or-separator">
                    <span class="h6 or-separator--text">
                        <span>or</span>
                    </span>
                    <hr>
                </div>
                <a class="btn btn-large btn-block btn-font-normal social-share-btn" href="">
                    <i class="icon social-share-icon icon-comment"></i>
                    <span class="hidden-md">
                        <span>SMS</span>
                    </span>
                </a>
                <div class="space-1">
                    <a class="btn btn-large btn-block social-share-btn btn-font-normal btn-facebook-messenger hidden-sm" data-network="messenger" data-referral-link="{{url('/')}}" rel="nofollow noopener noreferrer" href="" target="_blank">
                        <i class="icon social-share-icon icon-facebook-messenger"></i>
                        <span class="hidden-md">
                            <span data-reactid="38">Messenger</span>
                        </span>
                    </a>
                    <a class="btn btn-large btn-block social-share-btn btn-font-normal btn-facebook" data-network="facebook" data-referral-link="{{url('/')}}" rel="nofollow noopener noreferrer" href="" target="_blank">
                        <i class="icon social-share-icon icon-facebook"></i>
                        <span class="hidden-md">
                            <span>Facebook</span>
                        </span>
                    </a>
                </div>
                <label class="text-center share-your-link-text" for="share-link">
                    <span>Share Your Link:</span>
                </label>
                <div class="flex-span space-2">
                    <input type="text" class="input-large social-share-btn" value="{{url('/')}}" readonly="">
                </div>
            </div-->
            <div class="share-box">
                <div class="title-credit">
                    <p>Send a friend $27 SGD Tutify credit. You'll get $27 SGD when they travel and $109 SGD when they host. <a href="#">Learn More</a></p>
                    <h3><a href="{{url('/termsConditions')}}" target="_blank" rel="noopener noreferrer">Referals Terms and Conditions</a></h3>
                </div>
                <div class="space-1">
                    <div id="ResMsg" style="display: none;color: #1ab31d;"><span></span></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-sm-10 pr-0">
                                <input type="text" class="form-control" id="receiver_email" name="receiver_email[]" autocomplete="none" placeholder="Enter email addresses, seperated by commas" spellcheck="false">
                            </div>
                            <div class="col-sm-2 pl-0">
                                <button class="btn btn-block btn-primary btn-large btn-font-normal " id="InviteFriend">Send</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-sm-9 pr-0">
                                <input type="text" class="form-control"  autocomplete="none" placeholder="{{url('/')}}" spellcheck="false" readonly="true">
								<div class="share-icon">
								<ul>
								<li>Share:</li>
								<li><a href="#"><img src="http://54.179.188.91/public/sites/users/img/msnger.png"></a></li>
								<li><a href="#"><img src="http://54.179.188.91/public/sites/users/img/twiter.png"></a></li>
								</ul>
								</div>
								
                            </div>
                            <div class="col-sm-3 pl-0">
                                <button class="btn btn-block btn-large btn-font-normal invitefacbook"><img src="http://54.179.188.91/public/sites/users/img/fb-icon.png"> <span>Facebook</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade alert-modal" id="plan_check_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content"> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Alert</h4>
                </div>   

                <div class="modal-body">
                    <div class="form-group">                       
                        <div class="">
                            Please Purchase Plan First.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn success btn-primary" href="{{url('subscribe')}}">Subscribe</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        $("#InviteFriend").click(function () {
            var receiver_email = $("#receiver_email").val()
            if (receiver_email != "") {
                $.ajax({
                    url: "{{url('inviteafriend')}}",
                    method: "POST",
                    data: "receiver_email=" + receiver_email,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        console.log(res.resCode)
                        if (res.resCode == 200) {
                            $("#ResMsg").text(res.resMsg);
                            $("#ResMsg").show();
                        }
                        setTimeout(function () {
                            $("#ResMsg").hide()
                        }, 5000);
                    }
                });
            } else {
                swal({title: "Error!", text: "Please enter email addresses", type: "error"});
            }
        });

        jQuery.smoothScroll();
    </script>
</div>
@endsection