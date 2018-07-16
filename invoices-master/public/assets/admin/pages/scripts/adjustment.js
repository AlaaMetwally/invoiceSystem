$(document).on('ready pjax:success', function () {
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
                $.ajax(
                    {
                        url: "adjustments/" + id,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "id": id,
                        },
                        success: function (response) {
                            swal("Deleted!", "It is deleted successfully.", "success");
                            table.row($tr).remove().draw();
                        },
                        error: function (xhr) {
                            swal("Record is related to other recorders in another tables!")
                        }
                    });
            });
    });
    $('#myForm').ajaxForm({
        beforeSubmit:validateRegex,
        success: function (data) {
            window.location = data.url;
        }
    });
});
function validateRegex (arr, $form, options) {
    var i;
    for (i = 0; i < arr.length; i++) {
        if (arr[i].name == "name") {
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
}
