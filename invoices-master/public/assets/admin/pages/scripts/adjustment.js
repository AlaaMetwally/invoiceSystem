$(document).ready(function () {

    var table = $('#adjustments-table').DataTable();
    $(document).on('click','.deleteRow',function (e) {
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
            function(){
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
                            table.row( $tr ).remove().draw();
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });
            });

    });
});
