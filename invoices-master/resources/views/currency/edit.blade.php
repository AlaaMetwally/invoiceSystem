<div class="page-content-body">
    <div class="row" style="margin-left:0; margin-right:10px;">
        <form class="form-horizontal ajaxform" method="POST" action="{{route('currency.update',$currency->id)}}">
            {{csrf_field()}}
            <input type="hidden" id="csrf-token" name="_token" value="{{ Session::token() }}">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Currency<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input data-validation="name" id="currency" data-name="Currency Name" type="text"
                           class="form-control" name="name" value="{{$currency->name}}" autofocus="">
                    <p class="testname" style="color:red"></p>
                </div>
            </div>

            <div class="form-group" id="save">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary save" id="{{$currency->id}}">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>