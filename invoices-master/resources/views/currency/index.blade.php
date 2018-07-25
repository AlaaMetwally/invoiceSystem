<div class="m-portlet m-portlet--mobile">

    <div class="m-portlet__body">
        <div class="col-md-6 col-md-offset-4" align="left">
            <a type="submit" class="btn btn-primary pjax-link" href="{{route('currency.init')}}">Add New</a>
        </div>
        <!--begin: Datatable -->
        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded m-datatable--scroll"
             id="m_datatable_latest_orders" style="">
            <table class="table table-bordered" id="currencies-table">
                <thead>
                <tr>
                    <th>Currency</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($currencies as $currency)
                    <tr id="{{$currency->id}}">
                        <td>{{ $currency->name }}</td>
                        <td><a href="{{route('currency.edit', $currency->id)}}"
                               class="btn btn-warning btn-sm pjax-link"
                               data-id="{{$currency->id}}">EDIT <i class="fa fa-edit"></i></a>
                            <button class="deleteRow btn btn-danger btn-sm"
                                    id="{{$currency->id}}">DELETE <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--end: Datatable -->
    </div>

</div>
