$(function(){
    $(".twotab-content-header .fa-times").click(function() { $(this).closest('.twotab-content-box').addClass('hidden-box') });
    $(".twotab-content-header .fa-chevron-down").click(function() { $(this).closest('.twotab-content-box').removeClass('hidden-box') });
})
    