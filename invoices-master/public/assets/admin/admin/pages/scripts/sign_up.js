$(document).on('ready pjax:success' , function () {
$("select").select2();







        $('.image_export').on('click', function() {

            var $this = $(this);
            $this.button('loading');
             html2canvas($("#signupusers-179"), {
                  onrendered: function(canvas) {
                  var img=canvas.toDataURL("image/png");
                  $("a.image").attr('href',img)
                 }
             });
            setTimeout(function() {
                $this.button('reset');
                $('.image_export').addClass('hidden');
                $('.image_download').removeClass('hidden')
            }, 3000);
        });

     if ($('.reorder').length) {
            var drake = dragula([$('#signupusers-179 tbody')[0]]);
            drake.on('drop', function (el, target, source, sibling) {
                $('.reorder').prop('disabled', false);
            });
        }
    var column_data = [];
    var input_values = [];
    var datatable_obj = $("th").map(function () {
        return $(this).data('name');
    });
    var form_element_names = $('.element').map(function () {
        return $(this).data('input');
    });
    $.each(datatable_obj, function (key, value) {
        column_data[key] = {"data": value}
    });

    $('#search-form').on('click', function (e) {
        $('.element').each(function () {
            input_values = [];
        });
        table.draw();
        e.preventDefault();
    });

    var table = $('#signupusers-179').DataTable({'scrollX':true,
         dom: 'Bfrtip',
                         buttons: [{extend:'pdf',exportOptions:{columns:[':not(:last-child)']}},{extend:'excel',exportOptions:{columns:[':not(:last-child)']}},'colvis'],
        "drawCallback": function (settings) {
            $('.popup').magnificPopup({
                type: 'iframe'
            });
        },
        processing: true,
        serverSide: true,
        bFilter: false,
        //--@sorting@--
        //--@disable-sorting@--
        columns: column_data,
        ajax: {
            url: '/sign_up/sign_up_data',
            data: function (d) {
                $('.element').each(function () {
                    input_values.push($(this).val());
                });
                $.each(form_element_names, function (key, value) {
                    d[value] = input_values[key]
                });
            }
        }
    });
    //--@hide-sorting@--
    $(".num_range").slider({
        range: true,
        min: 0,
        max: 1000,
        slide: function (event, ui) {
            ID= $(this).attr('id');
            $("."+ID+".amount").val(+ui.values[0] + "-" + ui.values[1]);
        },
        stop: function (event, ui) {
            // $id= $(this).attr('id');
            $("."+ID+".start_range").val(ui.values[0]);
            $("."+ID+".end_range").val(ui.values[1]);
        }

    });

//js-fn
$(document).on('click','.remove-stuff',function(e){//Delete from list
e.preventDefault();
$row = $(this).closest('tr');
var action = $(this).attr('href');
swal({title: "Are you sure?", text: "", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Yes, delete it!", closeOnConfirm: false}, function () {
$.ajax({
url: action,
method: 'delete',
success: function () {
    swal("Deleted!", 'Successfully deleted', "success");
    table.row($row).remove()
    .draw();
    html2canvas($("#signupusers-179"), {
                onrendered: function (canvas) {
                          console.log(canvas);
                          var img = canvas.toDataURL("image/png");
                          $("a.image").attr('href', img)
                          }
                });
},
error: function () {
       swal("Error", 'Something is wrong, Try again later', "error");
}
        });

    });
        });
});
