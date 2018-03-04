$(document).on("click", ".completed_task", function (event) {

    $(this).css('color', 'red').toggleClass('fa-check-square-o').toggleClass('fa-square-o');
   // event.preventDefault();

    var status_checked = $(this).hasClass("fa-check-square-o");
    var status_unchecked = $(this).hasClass("fa-square-o");
    var task_id = $(this).siblings().val();
    var url = document.location.href;

    if (task_id && status_checked) {
        $.ajax({
            type: "POST",
            url: url,
            data: {task_id: task_id, status: '1'},
            success: function (d) {

            }
        });
    } else if (task_id && status_unchecked) {
        $.ajax({
            type: "POST",
            url: url,
            data: {task_id: task_id, status: '0'},
            success: function (d) {
            }
        });
    }
});

$(document).on("click", ".text_task", function (event) {
    var text_task = $(this).css('color', 'red');
    var task_id = $(this).siblings("form").children(".task_id").val();

    var td_val = $(this).text();
    var url = document.location.href;

    var input_field = $('<input type="text" id="edit" value="' + td_val + '" />');
    var span = $(this).siblings('span');
    span.html(input_field);

    $(input_field).blur(function (e) {
        var text = $(this).val();
        if (td_val !== text) {
            $.ajax({
                type: "POST",
                url: url,
                data: {task_id: task_id, text: text},
                success: function (d) {
                },
                error: function (e) {
                }
            });
        }
        $(this).hide();
        text_task.text(text);
    });
});







