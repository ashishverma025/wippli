@extends('sites.layout.tutor')
@section('content')


<div class="row hide" id="successMsgdiv">
    <div class="col-md-4"></div>
    <div class="col-xs-12 col-md-4">
        <h2 class="centr"><span id="successMsg" style="color:#01d1c0;">Thank you for subscribing with Tutify , Cheers!</span></h2>
        <h3 class="centr">
            <span id="successMsg" style="color:#484848;">
                You can enjoy our services for 7 days as a free trial ,<br>
                during this time you will not be charged. If you don't like our services ,<br>
                you can cancel the subscription within 7 days of activation
            </span>
        </h3>
        <a href="{{url('subscribe')}}" class="btn btn-primary">Go Back</a>
    </div>
</div>

<div id="paymentForm">

    <style>
        .centr{text-align: center;}
        .plan{color:red;margin-right: 2px;}
        body { margin-top:20px; }
        .panel-title {display: inline;font-weight: bold;}
        .checkbox.pull-right { margin: 0; }
        .pl-ziro { padding-left: 0px; }
    </style>
    <h3 class="centr">Your <span class="plan"> Plan </span>{{@$planDetails['plan_name']}}</h3>
    <div class="row ">
        <div class="col-xs-12 col-md-3"></div>
        <form role="form" name="payform" action="{{url('saveTransaction')}}" method="post" id="directPayment">
            @csrf

            <input type="hidden" name="sId" id="sId" value="{{@$planDetails['id']}}">
            <input type="hidden" name="cur" id="currency" value="USD">
            <input type="hidden" name="amt" id="amount" value="{{ @$planDetails['subscription_fee'] - (@$planDetails['subscription_fee'] * ( @$planDetails['discount'] / 100)) }}">
            <input type="hidden" name="details" id="amount" value="">



            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Personal Details
                        </h3>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="leftone">First Name</div>
                                <div class="rightone"><input name="firstname" id="firstname" type="text" value=""></div>
                            </div>
                            <div class="col-md-6">
                                <div class="leftone">Last Name</div>
                                <div class="rightone"><input name="lastname" id="lastname" type="text" value=""></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="leftone">Email</div>
                                <div class="rightone"><input name="email" type="text" value=""></div>
                            </div>
                            <div class="col-md-6">
                                <div class="leftone">Address</div>
                                <div class="rightone"><input name="address" id="address" type="text" value=""></div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="leftone">City</div>
                                <div class="rightone"><input name="city" id="city" type="text" value=""></div>
                            </div>
                            <div class="col-md-6">
                                <div class="leftone">State/Zip</div>
                                <div class="rightone"><input name="state" id="state" type="text" maxlength="2" style="width:30px;" value="">
                                    <span style="font:8pt arial;">eg. NY</span>
                                    <input name="zip" type="text" id="zip" style="width:75px;" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Payment Details
                        </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="leftone">Card Type</div>
                                <div class="rightone">
                                    <select name="cardtype" id="cardType" >
                                        <option value="visa" selected="selected">Visa</option>
                                        <option value="MasterCard">Master Card</option>
                                        <option value="AmericanExpress">American Express</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="leftone">Cardholder Name</div>	
                                <div class="rightone">
                                    <input name="cardholder" id="cardholder" type="text" value="John Doe">
                                </div>
                            </div>
                        </div>

                        <div class="leftone">Card Number</div>	
                        <div class="rightone"><input type="text" name="cardnumber"  id="cardNumber" data-len='16' maxlength="16" class="numbersOnly" value="4066901366000455"></div>	

                        <div class="row">
                            <div class="col-md-6">
                                <div class="leftone">Expiration <span style=" font:7pt arial; color:gray;">[ mm / yyyy ]</span></div>	
                                <div class="rightone">
                                    <input type="text" name="cardmonth" id="expityMonth" data-len='2' maxlength="2" class="sel numbersOnly" style="width:76px;" value="01" />&nbsp;
                                    <input type="text" name="cardyear" id="expityYear" data-len='4' maxlength="4" class="sel numbersOnly" style=" width:190px;" value="2012">
                                </div>	
                            </div>
                            <div class="col-md-6">
                                <div class="leftone">CVV Number</div>	
                                <div class="rightone"><input type="text" name="cardcvv"  id="cvCode" data-len='3' maxlength="3" value="962"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <br/>
                <button type="button" class="btn btn-success btn-lg btn-block payment" role="button">Pay Now</button>
            </div>
        </form>
    </div>
</div>

<script>

    $('.numbersOnly').keyup(function () {
        var len = $(this).attr('data-len')
        if (this.value.length > parseInt(len)) {
            e.preventDefault();
            return false;
        }
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });

    var sId = $("#sId").val()
    var currency = $("#currency").val()
    var amount = $("#amount").val()

    $(".payment").click(function () {
        var firstname = $("#firstname").val()
        var lastname = $("#lastname").val()
        var city = $("#city").val()
        var state = $("#state").val()
        var country = $("#country").val()
        var zip = $("#zip").val()
        var address = $("#address").val()
        var country = $("#country").val()
        var cardholder = $("#cardholder").val()
        var cardNumber = $("#cardNumber").val()
        var expityMonth = $("#expityMonth").val()
        var expityYear = $("#expityYear").val()
        var cvCode = $("#cvCode").val()
        var cardType = $("#cardType").val()

        if (firstname == '') {
            swal({title: "Error!", text: "Please fill firstname!", type: "error"});
            $("#firstname").focus()
            return false;
        }
        if (lastname == '') {
            swal({title: "Error!", text: "Please fill lastname!", type: "error"});
            $("#lastname").focus()
            return false;
        }
        if (city == '') {
            swal({title: "Error!", text: "Please fill city!", type: "error"});
            $("#city").focus()
            return false;
        }
        if (state == '') {
            swal({title: "Error!", text: "Please fill state!", type: "error"});
            $("#state").focus()
            return false
        }
        if (zip == '') {
            swal({title: "Error!", text: "Please fill zip!", type: "error"});
            $("#zip").focus()
            return false;
        }
        if (cardholder == '') {
            swal({title: "Error!", text: "Please fill cardholder!", type: "error"});
            $("#cardholder").focus()
            return false;
        }
        if (cardNumber == '') {
            swal({title: "Error!", text: "Please fill valid card number!", type: "error"});
            $("#cardNumber").focus()
            return false;
        }
        if (expityMonth == '') {
            swal({title: "Error!", text: "Please fill valid expiry month!", type: "error"});
            $("#expityMonth").focus()
            return false;
        }
        if (expityYear == '') {
            swal({title: "Error!", text: "Please fill valid expiry year!", type: "error"});
            $("#expityYear").focus()
            return false;
        }
        if (cvCode == '') {
            swal({title: "Error!", text: "Please fill valid CVV!", type: "error"});
            $("#cvCode").focus()
            return false;
        }
        
        // var formData = $('#directPayment').serialize()

        if(firstname !='' && lastname !='' && city !='' && address != '' && state != '' && zip !=''){
        $.ajax({
            url: "{{url('saveTransaction')}}",
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                details: '', cardnumber: cardNumber, cardmonth: expityMonth, cardyear: expityYear,
                cardcvv: cvCode, sId: sId,firstname:firstname,lastname:lastname,city:city,state:state,
                country:country,zip:zip,address:address,country:country,cardholder:cardholder,cardtype:cardType},
            success: function (result) {
                if (result == 'success') {
                    $("#paymentForm").hide()
                    $("#successMsg").text('Congratulation! You have successfully got 7 days FREE Trial')
                    $("#successMsgdiv").removeClass('hide')
                    setTimeout(function () {
                        // window.location.href = "{{url('subscribe')}}";
                    }, 6000);
                }
            }
        });
        }

        // $('#directPayment').submit()

    });

</script>
@endsection