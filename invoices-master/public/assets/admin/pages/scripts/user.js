var openFile = function(event)
{
    var input = event.target;
    var reader = new FileReader();
    var output = document.getElementById('output');

    reader.onload = function(e){
        var dataURL = reader.result;
        $("#output").cropper("destroy");
        output.src = dataURL;
        $("#output").cropper({
            preview: ".preview",
            aspectRatio: 2,
            minContainerWidth: 642,
            minContainerHeight: 450,
        });
    };
    var cropper = $("#preview").data('cropper');
    reader.readAsDataURL(input.files[0]);
};
$(document).on('ready pjax:success', function () {

    $(".avatar-save").click(function(e) {
        var id =1;
        $.ajax(
            {
                url: "/user/"+id+"/image",
                type: "POST",
                dataType: 'JSON',
                success: function (data) {
                    $.magnificPopup.close();
                }
            });

    });
    $('#editForm').ajaxForm({
        success: function (data) {
            window.location = data.url;
        }
    });

    $('.popup').magnificPopup({
        alignTop : true,
        items: {
            src: '.white-popup'
        },
        type: 'inline',
        callbacks: {
            beforeOpen: function() {
            document.getElementById("check").style.display="block";
            },
        }
    });
});
