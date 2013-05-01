$(document).ready(function() {
    if ($.cookie("id") != null) {
        $("#"+$.cookie("id")).modal('show');
        $.removeCookie('id');
    }
    else
        $.removeCookie('id');
    $(".form_com_statut").submit(function() {
        $.cookie("id", $(this).parent().parent().attr("id"));//.modal('show');
    });

    $(".remove_com").click(function () {
        $.cookie("id", "myModal2"+$(this).attr("data"));//.modal('show');
    });
});