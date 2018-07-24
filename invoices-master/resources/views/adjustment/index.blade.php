<div class="m-portlet m-portlet--mobile">

    <div class="m-portlet__body">
        <div class="col-md-6 col-md-offset-4" align="left">
            <a type="submit" class="btn btn-primary pjax-link" href="{{route('adjustment.init')}}">Add New</a>
        </div>
        <!--begin: Datatable -->
        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded m-datatable--scroll"
             id="m_datatable_latest_orders" style="">
            <table class="table table-bordered" id="adjustments-table">
                <thead>
                <tr>
                    <th>Adjustment</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($adjustments as $adjustment)
                    <tr id="{{$adjustment->id}}">
                        <td>{{ $adjustment->name }}</td>
                        <td><a href="{{route('adjustment.edit', $adjustment->id)}}"
                               class="btn btn-warning btn-sm pjax-link"
                               data-id="{{$adjustment->id}}">EDIT <i class="fa fa-edit"></i></a>
                            <button class="deleteRow btn btn-danger btn-sm"
                                    id="{{$adjustment->id}}">DELETE <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--end: Datatable -->
    </div>

</div>
