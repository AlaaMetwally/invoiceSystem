<div class="page-content-body">
    <div class="row" style="margin-left:0; margin-right:10px;">
        <form class="form-horizontal ajaxform" method="POST" action="{{route('unit.update',$unit->id)}}">
            {{csrf_field()}}
            <input type="hidden" id="csrf-token" name="_token" value="{{ Session::token() }}">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Unit<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input data-validation="name" id="unit" data-name="Unit Name" type="text"
                           class="form-control" name="name" value="{{$unit->name}}" autofocus="">
                    <p id="testname" style="color:red"></p>
                </div>
            </div>

            <div class="form-group" id="save">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary save" id="{{$unit->id}}">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>