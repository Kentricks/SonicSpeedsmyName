$(document).ready(function() {
    if ($.cookie("id") != null) {
        $("#"+$.cookie("id")).modal('show');
        $.cookie("id", null);
    }
    $("form").submit(function() {
        $.cookie("id", $(this).parent().parent().attr("id"));//.modal('show');
    });
});