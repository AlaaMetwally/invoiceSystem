$(document).on('ready pjax:success', function () {
    $('#editForm').ajaxForm({
        success: function (data) {
            window.location = data.url;
        }
    });
});