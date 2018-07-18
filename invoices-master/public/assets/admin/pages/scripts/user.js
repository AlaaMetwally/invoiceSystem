$(document).on('ready pjax:success', function () {
    $(".avatar-save").click(function(e) {
        $.magnificPopup.close();
        $image_upload = document.getElementById("avatarInput").value.replace(/^C:\\fakepath\\/i, '');
        document.getElementById('logoname').innerHTML = $image_upload; 
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
    var count = 0;
    function make_base(input) {
        var base_image = new Image();
       
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                base_image.src = e.target.result;
            }
            base_image.onload = function (e) {
                count++;
                if(count>1){
                    context.clearRect(0, 0, context.canvas.width, context.canvas.height)
                }
                context.drawImage(base_image, 0, 0);
            }
            reader.readAsDataURL(input.files[0]);

        }
    }

    function updatePreview(c) {
        if (parseInt(c.w) > 0) {
            // Show image preview
            var imageObj = $("#viewport")[0];
            var canvas = $("#preview")[0];
            var context = canvas.getContext("2d");
            if (imageObj != null && c.x != 0 && c.y != 0 && c.w != 0 && c.h != 0) {
                context.drawImage(imageObj,c.x , c.y, c.w, c.h, 0, 0, canvas.width, canvas.height);
            }
        }
    }

    var canvas = document.getElementById('viewport'),
        context = canvas.getContext('2d');
        $("#avatarInput").change(function(){
            make_base(this);
        });

    $('#viewport').Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
        allowSelect: true,
        allowMove: true,
        allowResize: true,
        aspectRatio: 0
    });

});
