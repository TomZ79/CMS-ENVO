/* 00. POPUP WINDOW - SHARE SOCIAL MEDIA
 ========================================================================*/
$(function() {
    $('.pop a:not(.email)').click(function () {
        window.open($(this).attr('href'), 't', 'toolbar=0,resizable=1,status=0,width=640,height=528');
        return false
    })
});