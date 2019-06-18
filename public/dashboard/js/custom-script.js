$(function () {
    $('.ui.dropdown').dropdown();
    $('.menu .item').tab();
    $.ajax({
        type:'get',
        url:'staff-notification-count',
        data:{
            '_token':'{{csrf_token()}}',
        },
        success: function (data) {
            $('#notification').html(data.count);
        }
    })
    /*init popup*/
    let popupClasses = document.querySelectorAll('.popupHover');
    $.each(popupClasses, function (index, el) {
        $(el).popup();
    });
});
