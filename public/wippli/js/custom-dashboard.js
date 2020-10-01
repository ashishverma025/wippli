
$("#popUpform").click(function () {
  $.ajax({
    url:"popupForm",
    type:'POST',
    dataType:'html',
    data:{types:'popupForm'},
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    contentType: false,
    processData: false,
    success:function(response){
      $("#popupFormModal").html(response)
      $("#myModal").modal();

    }
  })
});