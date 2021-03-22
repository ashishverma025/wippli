let route = $('meta[name="route"]').attr('content');

$("#popUpform").click(function () {
    $("#myModal").modal();
    $.ajax({
        url: route+"/popupForm",
        type: 'POST',
        dataType: 'html',
        data: {types: 'popupForm'},
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

$(".popUpBusinessform").click(function () {
    var business_id = $(this).attr('data-business_id');
    console.log(business_id)
    $("#myModal").modal();
    $.ajax({
        url: route+"/popUpBusinessform",
        type: 'POST',
//        dataType: 'html',
        data: 'business_id=' + business_id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        success: function (response) {
            $("#recordUpdatePopupForm").html(response)
            $("#myModal").modal();
        }
    })
});

$(document).on('click', '#simpleButton', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var form_data = new FormData();

    var file_data = $("#attachment").prop("files")[0];
    form_data.append("attachment", file_data);
    form_data.append('project_name', $("#project_name").val());
    form_data.append('deadline', $("#deadline").val());
    form_data.append('category', $("#category").val());
    form_data.append('deadline', $("#deadline").val());
    form_data.append('business_id', $("#business_id").val());
    form_data.append('type', $("#type").val());
    form_data.append('instruction', $("#instruction").val());

    $("#simpleButton").html('Loading...')
    $("#simpleButton").prop('disabled', true)
    $.ajax({
        url: route+"/newWippliSave",
        type: 'POST',
        data: form_data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response)
            $(".errMsg").html(response.msg)
            if (response.status == 'success') {
                $("#detailButton").html('SUBMIT WIPPLI')
                $("#simpleButton").html('')
                $("#simpleButton").prop('disabled', false)
                window.location.href = route+"/user-dashboard";
            }
        }
    })
});



$(document).on('click', '#detailButton', function (e) {
    e.preventDefault();
    e.stopPropagation();

    var form_data = new FormData();
    var type_file = $("#type_file").prop("files")[0];
    var attachment2 = $("#attachment2").prop("files")[0];
    form_data.append("type_file", type_file);
    form_data.append("attachment", attachment2);
    form_data.append('project_name', $("#project_name").val());
    form_data.append('deadline', $("#deadline").val());
    form_data.append('category', $("#category").val());
    form_data.append('deadline', $("#deadline").val());
    form_data.append('type', $("#type").val());
    form_data.append('instruction', $("#instruction").val());
    form_data.append('print', $("#print").val());
    form_data.append('video', $("#video").val());
    form_data.append('other', $("#other").val());
    form_data.append('objective', $("#objective").val());
    form_data.append('message', $("#message").val());
    form_data.append('dimensions', $("#dimensions").val());
    form_data.append('width', $("#width").val());
    form_data.append('height', $("#height").val());
    form_data.append('units', $("#units").val());
    form_data.append('portrait', $("#portrait").val());

    // console.log(formData)
    $("#detailButton").html('Loading...')
    $("#detailButton").prop('disabled', true)

    var shortSweeyFormData = $("#detailForm").serializeArray()

    $.ajax({
        url: route+"/newWippliSave",
        type: 'POST',
        data: form_data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response)
            $(".errMsg").html(response.msg)
            if (response.status == 'success') {
                $("#detailButton").html('SUBMIT WIPPLI')
                $("#detailButton").prop('disabled', false)
                location.reload()
            }
        }
    })
});

$(document).on('click', '#category', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var category = $('#category').find(":selected").val();
    $(".typecls").css('display','none')
    if(category == 6){
        $(".typecls").css('display','block')
    }
    // $.ajax({
    //     url: route+"/getTypesByCategory",
    //     type: 'POST',
    //     data: {'category': category},
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     success: function (response) {
    //         $("#types").html(response)
    //     }
    // })
});



$(".previewToday,.previewDetails").click(function () {
    var wippliId = $(this).attr('data-id');
    var bId = $(this).attr('data-bid');
    $.ajax({
        url: route+"/wippliPreview",
        type: 'post',
        data: "wippli_id=" + wippliId + "&bId=" + bId,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        success: function (response) {
            $("#popupFormModal").html(response)
            $("#myModal").modal();
//            location.reload()
        }
    })
});


function readURL(input, divID) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('#' + divID).show()
        reader.onload = function (e) {
            $('#' + divID).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


$(document).on('click', '#generateFolder', function (e) {
    var wippliId = $(this).attr('data-id');
    // alert('sdjhjkshdfkjs')
    $("#generateFolder").text('Generating ...')
    $("#generateFolder").prop('disabled', true)
    if (wippliId !== '') {
        $.ajax({
            url: route+"/generateFolderStructure",
            type: 'POST',
            data: {'wippli_id': wippliId},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response == 'success') {
                    $("#generateFolder").text('Folder Generated')
                    $("#generateFolder").prop('disabled', false)
                }
            }
        })
    }
})

$(document).on('click', '#allocateBtn', function (e) {
    var wippliId = $(this).attr('data-id');
    var toUser = $('#toUser').find(":selected").val();
    var email_address = $("#email_address").val();
    var business_id = $("#business_id").val();
    // alert('sdjhjkshdfkjs')
    $("#allocateBtn").text('Allocating ...')
    $("#allocateBtn").prop('disabled', true)
    if (wippliId !== '') {
        $.ajax({
            url: route+"/allocateUser",
            type: 'POST',
            data: {'wippli_id': wippliId, toUser: toUser, email_address: email_address, business_id: business_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response == 'success') {
                    $("#allocateBtn").text('User Allocated')
                    alert('User allocated successfully!')
//                    $("#allocateBtn").prop('disabled', false)
                    location.reload()

                }
            }
        })
    }
})
$(document).on('click', '#takeOn', function (e) {
    var wippliId = $(this).attr('data-wid');
    var toUser = $(this).attr('data-uid');
    var email_address = $(this).attr('data-email');
    var business_id = $("#business_id").val();
    // alert('sdjhjkshdfkjs')
    $("#takeOn").text('Taking ...')
    $("#takeOn").prop('disabled', true)
    if (wippliId !== '') {
        $.ajax({
            url: route+"/allocateUser",
            type: 'POST',
            data: {'wippli_id': wippliId, toUser: toUser, email_address: email_address, business_id: business_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response == 'success') {
                    $("#takeOn").text('Task Taken')
                    alert('User allocated successfully!')
//                    $("#takeOn").prop('disabled', false)
                    location.reload()

                }
            }
        })
    }
})

$(document).on('change', '#toUser', function (e) {
    var email = $('option:selected', this).data("email");
    $("#email_address").val(email);
})


$(document).on('click', '#commentBtn', function (e) {
    var wippliId =  $(this).attr('data-id');
    var form_data = new FormData();
    var commentfile = $("#commentfile").prop("files")[0];
    form_data.append("comment", $("#comment").val());
    form_data.append("commentfile", commentfile);
    form_data.append('wippli_id', $(this).attr('data-id'));

    $("#commentBtn").text('Commenting ...')
    $("#commentBtn").prop('disabled', true)
    if (wippliId !== '') {
        $.ajax({
            url: route+"/wippliComment",
            type: 'POST',
            data: form_data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (response) {
                if (response == 'success') {
                    $("#commentBtn").text('Commented')
                    alert('Wippli comment posted successfully!')
                    location.reload()

                }
            }
        })
    }
})


$(document).on('click', '#completeBtn', function (e) {
    var wippli_id = $(this).attr('data-wid');
    console.log(wippli_id)
    $("#completeBtn").text('Process ..')

    $.ajax({
        url: route+"/wippliComplete",
        type: 'POST',
        data: {'wippli_id':wippli_id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
            if (response == 'success') {
                $("#completeBtn").text('Completed')
                alert('Wippli marked as complete successfully!')
//                    $("#allocateBtn").prop('disabled', false)
                location.reload()

            }
        }
    })

})

