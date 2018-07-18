$(document).on('ready pjax:success', function () {
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
    jQuery(function($) {
        $('#imgCrop').Jcrop({
            bgColor:     'white',
            bgOpacity:   .4,
            setSelect:   [ 100, 100, 50, 50 ],
            aspectRatio: 16 / 9
        });
     });
     