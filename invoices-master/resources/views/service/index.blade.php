<div class="m-portlet m-portlet--mobile">

    <div class="m-portlet__body">
        <div class="col-md-6 col-md-offset-4" align="left">
            <a type="submit" class="btn btn-primary pjax-link" href="{{route('service.init')}}">Add New</a>
        </div>
        <!--begin: Datatable -->
        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded m-datatable--scroll"
             id="m_datatable_latest_orders" style="">
            <table class="table table-bordered" id="services-table">
                <thead>
                <tr>
                    <th>Service</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr id="{{$service->id}}">
                        <td>{{ $service->name }}</td>
                        <td><a href="{{route('service.edit', $service->id)}}" class="btn btn-warning btn-sm pjax-link"
                               data-id="{{$service->id}}">EDIT <i class="fa fa-edit"></i></a>
                            <button class="deleteRow btn btn-danger btn-sm"
                                    id="{{$service->id}}">DELETE <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--end: Datatable -->
    </div>

</div>
