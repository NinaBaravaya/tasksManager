$(document).on("click", "#preview_task", function (event) {
    $.ajax({
        url: '../tasks',
        type: 'POST',
        data: new FormData($('form')[0]),
        cache: false,
        contentType: false,
        processData: false,
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        $('progress').attr({
                            value: e.loaded,
                            max: e.total
                        });
                    }
                }, false);
            }
            return myXhr;
        },
        success: function (d) {
            var html = $.parseHTML(d);
            var div_content = html[24];
            $(".container").html($(div_content).html());
        }
    });
});

$(document).on("click", "#edit_task", function (event) {
    var data = $('#edit_form').serializeArray();
    $.ajax({
        url: '../tasks',
        type: 'POST',
        data: data,
        success: function (d) {
            var html = $.parseHTML(d);
            var div_content = html[24];
            $(".container").html($(div_content).html());
        }
    });
});



