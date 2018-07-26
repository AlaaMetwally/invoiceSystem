$(document).on('ready pjax:success', function () {
    var table = $('#clients-table').DataTable({
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 1 }
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
                        url: "client/" + id,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "id": id,
                        },
                        success: function (response) {
                            if (response.error) {
                                swal("Record is related to other recorders in another tables!")
                            }
                            else {
                                swal("Deleted!", "It is deleted successfully.", "success");
                                table.row($tr).remove().draw();
                            }
                        },
                        error: function (xhr) {
                            swal("Record is related to other recorders in another tables!")
                        }
                    });
            });
    });
    $(document).on('click', '.addNew', function (e) {
        $(".addNew").hide();
        $(".select").hide();
        $("#testselect").hide();
        $(".addpayment").show();
        $(".cancel").show();
    })
    $(document).on('click', '.cancel', function (e) {
        document.getElementById('testpayment').innerHTML = "";
        $(".addNew").show();
        $(".select").show();
        $("#testselect").show();
        $(".addpayment").hide();
        $(".cancel").hide();
    })
    $(document).on('click', '.addStuff', function (e) {
        document.getElementById('testpayment').innerHTML = "";
        var new_payment = document.getElementById('new_payment').value;
        var nameRegex = /^[a-zA-Z ]+$/;
        var nameResult = nameRegex.test(new_payment);
        if (nameResult == true) {
            $.ajax(
                {
                    url: "/payment/null/update",
                    data: {
                        payment: new_payment,
                    },
                    type: "POST",
                    success: function (response) {
                        var option = $("<option selected></option>");
                        option.text(new_payment);
                        option.attr("id", response.id);
                        $("select").append(option);
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
        }
        else {
            document.getElementById('testpayment').innerHTML = "name invalid";
            return false;
        }
    })
});
