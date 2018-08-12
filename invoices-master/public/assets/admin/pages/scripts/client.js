$(document).on('ready', function (e) {
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
                        url: "/client/" + id,
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
    $(document).on('click', '.cancelAdd', function (e) {
        $('.testpayment').hide();
        $(".addNew").show();
        $(".select").show();
        $(".addpayment").hide();
        $(".cancel").hide();
    })
    $(document).on('click', '#addStuff', function (e) {
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
                        console.log(response)
                        if(response.error){
                            $('.testpayment').show();
                            $('.testpayment').text('Name exists');
                        } else if(response.success){

                            $(".addNew").show();
                            $(".select").show();
                            $(".addpayment").hide();
                            $(".cancel").hide();
                            $('.testpayment').hide();
                            var option = $("<option selected name='payment_method'></option>");
                            option.text(new_payment);
                            option.attr("id", response.id);
                            option.attr("value",response.id);
                            $("select").append(option);

                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
        }
        else {
            $(".testpayment").show();
            $('.testpayment').text('name invalid');
            return false;
        }
    })
});
