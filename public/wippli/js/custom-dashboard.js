
$("#popUpform").click(function () {
  $.ajax({
    url: "popupForm",
    type: 'POST',
    dataType: 'html',
    data: { types: 'popupForm' },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    contentType: false,
    processData: false,
    success: function (response) {
      $("#popupFormModal").html(response)
      $("#myModal").modal();

    }
  })
});



$(document).on('click', '#simpleButton', function (e) {
  e.preventDefault();
  e.stopPropagation();
  var thisBtn = $(this);
  var thisForm = thisBtn.closest("form");
  var formData = new FormData(thisForm[0]);
  // console.log(formData)
  $("#simpleButton").html('Loading...')
  $("#simpleButton").prop('disabled',true)

  //var formData = thisForm.serializeArray();
  var shortSweeyFormData = $("#shortSweeyForm").serializeArray()

  $.ajax({
    url: "newWippliSave",
    type: 'POST',
    data: formData,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response)
      $(".errMsg").html(response.msg)
      if(response.status == 'success'){
        $("#simpleButton").html('Loading...')
        $("#simpleButton").prop('disabled',false)
        location.reload()
      }
    }
  })
});