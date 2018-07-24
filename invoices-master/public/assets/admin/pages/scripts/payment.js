$(document).on('ready pjax:success', function () {
    var table = $('#payments-table').DataTable({
        "columnDefs": [
            {"orderable": false, "searchable": false, "targets": 1}
        ]
    });
    table.search('').draw();
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
                        url: "payment/" + id,
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

});

