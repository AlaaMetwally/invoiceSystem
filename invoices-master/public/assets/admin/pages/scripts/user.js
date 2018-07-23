var openFile = function (event) {
    var input = event.target;
    var reader = new FileReader();
    var output = document.getElementById('output');

    reader.onload = function (e) {
        var dataURL = reader.result;
        $("#output").cropper("destroy");
        output.src = "";
        if (document.getElementById('path').value.replace(/^C:\\fakepath\\/i, '').match(/\.(jpeg|jpg|gif|png)$/) == null) {
            document.getElementById('logoimage').innerHTML="invalid image extension"
        }
        else {
            document.getElementById('logoimage').innerHTML=""
            output.src = dataURL;
            $("#output").cropper({
                preview: ".preview",
                aspectRatio: 2,
                minContainerWidth: 642,
                minContainerHeight: 450,
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

function ajaxformbeforeSerialize() {
    console.log($(this));
    var data1 = document.getElementsByTagName('img')[2].getBoundingClientRect();
    var width = document.getElementsByClassName('cropper-face')[0].clientWidth;
    var height = document.getElementsByClassName('cropper-face')[0].clientHeight;
    data1.width = width;
    data1.height = height;
    document.getElementById('dataimage').setAttribute("value", JSON.stringify(data1));
}

