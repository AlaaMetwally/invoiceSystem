$(document).on('ready pjax:success', function () {
    $(document).on('click', '#avatarInput', function (e) {
        console.log(document.getElementById('avatarInput').value.replace(/^.*[\\\/]/, ''));
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
    function make_base() {
        var base_image = new Image();
        base_image.src = 'https://res.cloudinary.com/prestige-gifting/image/fetch/fl_progressive,q_95,e_sharpen:50,w_480/e_saturation:05/https://www.prestigeflowers.co.uk/images/NF4016-130116.jpg';
        base_image.onload = function () {
            context.drawImage(base_image, 0, 0);
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

    make_base();

    $('#viewport').Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
        allowSelect: true,
        allowMove: true,
        allowResize: true,
        aspectRatio: 0
    });

});
