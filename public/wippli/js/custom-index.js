 $(".signup_with_email").click(function () {
  $("#manualSignup").show();
  $("#socialSignup").hide();
  $('#SignUpModal').addClass('fixedModal');
});

 $(".showPwd").on('click', function () {
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

 $(".showCnfrmPwd").on('click', function () {
  var input = $("#password_confirmation");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
 $(".showLoginPwd").on('click', function () {
  var input = $("#pwd");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

 function mailCheck() {
  $.ajax({
    url: "{{url('checkexistemail')}}",
    method: "POST",
    data: "email=" + value,
    dataType: "json",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (res) {
      return res.status == 'true'
    }
  });
}

$(document).ready(function () {

  loginObj.init();
  $.validator.addMethod("validateEmail", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
  }, "Email Address is invalid: Please enter a valid email address.");

  $.validator.addMethod("validatePassword", function (value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
  }, "Password is invalid: Please enter a valid password.");


  $.validator.addMethod("uniqueEmail", function (value, element) {
    $.ajax({
      url: "{{url('checkexistemail')}}",
      method: "POST",
      data: "email=" + value,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (res) {
        return res.status == 'true'
      }
    });
  });
});
var loginObj = {
  init: function () {
    loginObj.holdFormSubmit();
    loginObj.formValidation();
    loginObj.loginFunction();
  },
  holdFormSubmit: function () {
    $('#login_form').submit(function (e) {
      e.preventDefault();
    });
  },
  formValidation: function () {
    $('#login_form').validate({
      rules: {
        username: {
          required: true,
          validateEmail: true,
          email: true,
        },
        password: {
          required: {
            depends: function () {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
        }

      },
      messages: {
        username: {
          required: 'Please enter email address',
          email: 'Please enter a valid email id',
          validateEmail: 'Please enter a valid email id'
        },
        password: {
          required: 'Please enter password',
        },
      }
    });
  },
  loginFunction: function () {
    $('#user-login-btn').click(function () {
      if ($('#login_form').valid()) {
        var btn = $(this);
        $('#server_resposne').hide();
        $('#server_resposne_msg').html('');
        var email = $("#username").val()
        var password = $("#pwd").val()

        $.ajax({
          url: "signin",
          method: 'post',
          data: {
            'email': email,
            'password': password
          },
          beforeSend: function () {
            $(btn).attr('disabled', true);
            $('#loading_spinner').show();
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          complete: function () {
            $(btn).attr('disabled', false);
            $('#loading_spinner').hide();
          },
          success: function (response) {
            console.log(response)
            
            if (response.success) {
              $('#errMsg').show();
              $('#login_form')[0].reset();
              $('#errMsg').removeClass('alert-danger').addClass('alert-success');
              $('#errMsg').html(response.message);
              location.reload();
              window.location.href = "user-dashboard"
            } else {
              $('#errMsg').removeClass('alert-success').addClass('alert-danger');
              $('#errMsg').removeClass('alert-success').addClass('alert-danger');
              $('#errMsg').html(response.message);
              $('#errMsg').show();
            }
          }
        });
      }
    });
  }
}
