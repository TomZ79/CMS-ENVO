/*
 |--------------------------------------------------------------------------
 | Other function
 |--------------------------------------------------------------------------
 */

$(function () {

    $( ".show-pass" )
        .mouseup(function() {
            $("#password").attr('type','password');
        })
        .mousedown(function() {
            $("#password").attr('type','text');
        });
});

/*
 |--------------------------------------------------------------------------
 | 'jakWeb' - definition
 |--------------------------------------------------------------------------
 */
(function () {
    jakWeb = {
        jak_lang: "",
        jak_url: "",
        jak_url_orig: "",
        request_uri: "",
        jak_search_link: "",
        jak_template: "",
        jak_heatmap: "",
        jak_quickedit: "",
        jak_acp_nav: false
    }
})();


/*
 |--------------------------------------------------------------------------
 | POPUP WINDOW - SHARE SOCIAL MEDIA
 |--------------------------------------------------------------------------
 */
$(function () {
    $('.pop a:not(.email)').click(function () {
        window.open($(this).attr('href'), 't', 'toolbar=0,resizable=1,status=0,width=640,height=528');
        return false
    })
});

/*
 |--------------------------------------------------------------------------
 | POPUP WINDOW - Bootstrap modal dialog
 |--------------------------------------------------------------------------
 */
$(function () {
    $(".jaktip").tooltip();

    $('#login').on('click', function (e) {
        e.preventDefault();
        $('#LoginModal').modal({show: true});
    });

    $('.quickedit').on('click', function (e) {
        e.preventDefault();
        frameSrc = $(this).attr("href");
        $('#JAKModalLabel').html(jakWeb.jak_quickedit);
        $('#JAKModal').on('show.bs.modal', function () {
            $('<iframe src="' + frameSrc + '" width="100%" height="450" frameborder="0">').appendTo('.modal-body');
        });
        $('#JAKModal').on('hidden.bs.modal', function () {
            window.location.reload();
        });
        $('#JAKModal').modal({show: true});
    });

    $('.commedit').on('click', function (e) {
        e.preventDefault();
        frameSrc = $(this).attr("href");
        $('#JAKModalLabel').html(jakWeb.jak_quickedit);
        $('#JAKModal').on('show.bs.modal', function () {
            $('<iframe src="' + frameSrc + '" width="100%" height="400" frameborder="0">').appendTo('.modal-body');
        });
        $('#JAKModal').on('hidden.bs.modal', function () {
            window.location.reload();
        });
        $('#JAKModal').modal({show: true});
    });

});
