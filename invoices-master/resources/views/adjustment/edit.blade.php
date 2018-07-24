<div class="page-content-body">
    <div class="row" style="margin-left:0; margin-right:10px;">
        <form class="form-horizontal" id="myForm" method="POST" action="{{route('adjustment.update',$adjustment->id)}}">
            {{csrf_field()}}
            <input type="hidden" id="csrf-token" name="_token" value="{{ Session::token() }}">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Adjustment<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input data-validation="required" id="adjustname" data-name="Adjustment Name" type="text"
                           class="form-control" name="name" value="{{$adjustment->name}}" autofocus="">
                </div>
            </div>

            <div class="form-group" id="save">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary save" id="{{$adjustment->id}}">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>