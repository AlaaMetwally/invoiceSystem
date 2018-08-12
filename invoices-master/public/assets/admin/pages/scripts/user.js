var openFile = function (event) {
    var input = event.target;
    var reader = new FileReader();
    var output = document.getElementById('output');

    reader.onload = function (e) {
        var dataURL = reader.result;
        $("#output").cropper("destroy");
        output.src = "";
        if (document.getElementById('path').value.replace(/^C:\\fakepath\\/i, '').match(/\.(jpeg|jpg|gif|png)$/) == null) {
            document.getElementById('logoimage').innerHTML = "invalid image extension"
        }
        else {
            document.getElementById('logoimage').innerHTML = ""
            output.src = dataURL;
            $("#output").cropper({
                preview: ".preview",
                aspectRatio: 2,
                minContainerWidth: 642,
                minContainerHeight: 450,
                crop(event) {
                    ajaxformbeforeSerialize(event.detail.x,
                        event.detail.y,
                        event.detail.width,
                        event.detail.height,
                        event.detail.rotate,
                        event.detail.scaleX,
                        event.detail.scaleY)
                }
            });
        }
    };
    var cropper = $("#preview").data('cropper');
    reader.readAsDataURL(input.files[0]);
};
$(document).on('ready pjax:success', function () {
    $('.popup').magnificPopup({
        alignTop: true,
        items: {
            src: '.white-popup'
        },
        type: 'inline',
        callbacks: {
            beforeOpen: function () {
                document.getElementById("check").style.display = "block";
            },
        }
    });
});


function ajaxformbeforeSerialize(x,y,w,h,rotate,scalex,scaley) {
    var dimensions = JSON.stringify({x:x,y:y,w:w,h:h,rotate:rotate,scalex:scalex,scaley:scaley});
    $("#dataimage").val(dimensions)
}

