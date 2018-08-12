$(document).on('ready pjax:success', function () {
    buttonToggle()
    $('.datepicker').datepicker();
    var input_values = [];
//advanced search
    var form_element_names = $('.element').map(function () {
        return $(this).data('input');
    });

    var table = $('#tasks-table').DataTable({
        responsive: true,
        serverSide: true,
        ajax: {
            url:'task/getData',
//advanced search
            data: function (d) {
                $('.element').each(function () {
                    input_values.push($(this).val());
                });
                $.each(form_element_names, function (key, value) {
                    d[value] = input_values[key]
                });
            }
            },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'client_id', name: 'client_id' },
            { data: 'service_id', name: 'service_id' },
            { data: 'invoice_number', name: 'invoice_number' },
            { data: 'po_number', name: 'po_number' },
            { data: 'unit_id', name: 'unit_id' },
            { data: 'unit_price', name: 'unit_price' },
            { data: 'amount', name: 'amount' },
            { data: 'total', name: 'total' },

            { data: 'fixed_price', name: 'fixed_price' },
            { data: 'start_date', name: 'start_date' },
            {data: 'finished', name: 'finished'},
            {data: 'invoiced', name: 'invoiced'},
            {data: 'action', name: 'action', orderable: false, searchable: false,
            render: function (data, type, row) {
              var id = row['id'];
              var linkEdit='<a href= "task/' + row["id"] + '/edit" class="btn btn-warning btn-sm" id="' + row['id'] + '">EDIT <i class="fa fa-edit"></i></a>';
              var linkDelete='<button class="btn btn-danger btn-sm deleteRow" id="' + row["id"] + '">DELETE <i class="fa fa-trash"></i></button>';

                return linkEdit +' '+ linkDelete;
            }
        }
        ],
        "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 13 },

        ]
    });
    // table.search('').draw();
    $(document).on('click', '.toggle-vis', function (e) {
        e.preventDefault();
        var value = e.target.getAttribute("data-column")
        document.querySelectorAll("[data-column='"+ value +"']")[0].setAttribute("class","toggle-invis");
        table.columns( [value] ).visible( false )
    });
    $(document).on('click', '.toggle-invis', function (e) {
        e.preventDefault();
        var value = e.target.getAttribute("data-column")
        document.querySelectorAll("[data-column='"+ value +"']")[0].setAttribute("class","toggle-vis");
        table.columns( [value] ).visible( true )

    });

//advanced search
    $('#search-form').on('click', function (e) {

        $('.element').each(function () {
            input_values = [];
        });
        table.draw();
        e.preventDefault();
    });
    $(document).on('click','.addnew',function (e){
        e.preventDefault();
        if($(this).closest('div').prev().css("display") == "none" ){
            $(this).hide();
            $(this).closest(":has(p)").find('p').hide()
            $(this).closest(":has(select)").find('select').hide()
            $(this).closest('div').prev().css("display","block")
            $(this).closest(":has(div)").find('div .cancel').show()
            $(this).closest(":has(input)").find('input').show()
        }
        else {
            $(this).hide();
            $(this).closest(":has(p)").find('p').hide()
            $(this).closest(":has(div)").find('div .cancel').show()
            $(this).closest(":has(select)").find('select').hide()
            $(this).closest(":has(input)").find('input').show()
        }
    })
    $(document).on('click','.canceladd',function (e){
        e.preventDefault();

        if($(this).closest('div .first_col').attr("style")
            && $(this).closest('div .first_col').css("display") == "block"
            && $("#selectedinvoice").children('option').length == 0 && $("#selectedcontact").find('select').children('option').length === 0)
        {
            $(this).closest('div .first_col').css("display","none")
            $(this).closest(":has(div)").find('div').hide()
            $(this).closest(":has(input)").find('input').hide()
            $(this).closest(":has(p)").find('p').hide()
            $(this).closest(":has(div .addnew)").find('div .addnew').show()
        }
        else {
            $(this).closest(":has(div)").find('div').hide()
            $(this).closest(":has(input)").find('input').hide()
            $(this).closest('.first_col').show();
            $(this).closest(":has(select)").find('select').show()
            $(this).closest(":has(p)").find('p').hide()
            $(this).closest(":has(div .addnew)").find('div .addnew').show()
        }
    })
    $(document).on('click','.addrecord',function(e){
        e.preventDefault();
        var inputgiven = $(this).closest('div .first_col').find('input').val();
        var nameRegex = /^[a-zA-Z ]+$/;
        var nameResult = nameRegex.test(inputgiven);
        var input_id = $(this).closest('div .first_col').find('input').attr('id');
        var this_element  = $(this);
        if (nameResult == true) {
            $.ajax(
                {
                    url: "/" +input_id+ "/null/update",
                    data: {
                        data: inputgiven,
                    },
                    type: "POST",
                    success: function (response) {

                        if(response.error){

                            this_element.closest('div').prev().show();
                            this_element.closest('div').prev().text('Name exists');
                        } else if(response.success){
                            if(this_element.closest('div .first_col').attr("style")
                                && this_element.closest('div .first_col').css("display") == "block"
                                && $("#selectedinvoice").children('option').length == 0 && $("#selectedcontact").find('select').children('option').length === 0)
                            {
                                this_element.closest('div .first_col').css("display","none")
                                this_element.closest(":has(div)").find('div').hide()
                                this_element.closest(":has(input)").find('input').hide()
                                this_element.closest(":has(div .addnew)").find('div .addnew').show()
                                this_element.closest(":has(p)").find('p').hide()
                            }
                            else {
                                this_element.closest(":has(div)").find('div').hide()
                                this_element.closest(":has(input)").find('input').hide()
                                this_element.closest('.first_col').show();
                                this_element.closest(":has(select)").find('select').show()
                                this_element.closest(":has(p)").find('p').hide()
                                this_element.closest(":has(div .addnew)").find('div .addnew').show()
                            }
                            var option = $("<option selected name='"+input_id+"_method'></option>");
                            option.text(inputgiven);
                            option.attr("id", response.id);
                            option.attr("value",response.id);
                            this_element.closest('div .first_col').find('select').append(option);

                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
        }
        else {
            this_element.closest('div').prev().show();
            this_element.closest('div').prev().text('name invalid');
            return false;
        }
    })
    $(document).on('change',"#client",function(e) {
        buttonToggle()
    })
    $(document).on('click','#cancel_search',function (e){
        e.preventDefault();
        $('#filters').hide();
        $('#search-form').hide();
        $('#advanced_search').show();
        $('#cancel_search').hide();
    })
    $(document).on('click','#advanced_search',function (e){
        e.preventDefault();
        $('#filters').show();
        $('#search-form').show();
        $('#advanced_search').hide();
        $('#cancel_search').show();
    })


    $(document).on('click', '.deleteRow', function (e) {
        $prev = $(this).parents('tr').prev();
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
                        url: "task/" + id,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "id": id,
                        },
                        success: function (response) {
                            if(response.error){
                                swal("Record is related to other recorders in another tables!")
                            }
                            else{
                                swal("Deleted!", "It is deleted successfully.", "success");
                                table.row($tr).remove().draw();
                                table.row($prev).remove().draw();
                            }
                        },
                        error: function (xhr) {
                            swal("Record is related to other recorders in another tables!")
                        }
                    });
            });
    });
function  buttonToggle() {
    var id = $('#client').find(":selected").attr('id');

    $.ajax(
        {
            url: "/task/"+id +"/parsedata",//parse_data
            type: "POST",
            success: function (response) {

                if(response.invoice.length !== 0){
                    $("#selectedinvoice").css("display","block")
                    $("#selectedinvoice").find("select").css("display","block")
                    $("#selectedinvoice").find("select").find("option").remove()
                    $("#selectedinvoice").find("select").append("<option value=''>Select Invoice</option>")
                    $.each(response.invoice, function( index, value ) {
                        var option = $("<option name='invoice_method'></option>");
                        option.text(value.invoice_number);
                        option.attr("id", value.id);
                        option.attr("value",value.id);
                        $("#selectedinvoice").find("select").append(option);
                    })
                }
                if(response.contact.length !== 0){
                    $("#selectedcontact").css("display","block")
                    $("#selectedcontact").find("select").css("display","block")
                    $("#selectedcontact").find("select").find("option").remove()
                    $("#selectedcontact").find("select").append("<option value=''>Select Contact</option>")
                    $.each(response.contact, function( index, value ) {
                        var option = $("<option name='contact_method'></option>");
                        option.text(value.name);
                        option.attr("id", value.id);
                        option.attr("value",value.id);
                        $("#selectedcontact").find("select").append(option);
                    })
                }
                if(response.contact.length === 0 && response.invoice.length === 0){
                    $("#selectedinvoice").css("display","none")
                    $("#selectedcontact").css("display","none")
                }
            }
        })
}
});

