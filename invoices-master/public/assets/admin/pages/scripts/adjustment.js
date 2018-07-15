$(document).ready(function () {

    var table = $('#adjustments-table').DataTable();
    $(document).on('click', '.deleteRow', function (e) {
        $tr = $(this).parents('tr');
        var id = e.target.id;
        swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function () {
                swal("Deleted!", "It is deleted successfully.", "success");
                $.ajax(
                    {
                        url: "adjustments/" + id,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "id": id,
                        },
                        success: function (response) {
                            table.row($tr).remove().draw();
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });
            });

    });

    $('#myForm').ajaxForm({
        beforeSubmit: function (arr, $form, options) {
            var i;
            for (i = 0; i < arr.length; i++) {
                if(arr[i].name == "name") {
                  var name = JSON.stringify(arr[i].value);
                }
            }
            var nameRegex = /^"[a-zA-Z0-9]+([a-zA-Z0-9 ])*"$/;
            var nameResult = nameRegex.test(name);
            if (nameResult == true) {
                return true;
            }
            else {
                swal("Please Enter A Correct Adjustment Name");
                return false;
            }
        },
        success: function (data) {
            window.location = data.url;
        }
    });

});
