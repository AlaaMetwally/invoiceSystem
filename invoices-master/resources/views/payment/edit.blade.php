<div class="page-content-body">
    <div class="row" style="margin-left:0; margin-right:10px;">
        <form class="form-horizontal ajaxform" method="POST" action="{{route('payment.update',$payment->id)}}">
            {{csrf_field()}}
            <input type="hidden" id="csrf-token" name="_token" value="{{ Session::token() }}">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Payment<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input data-validation="name" id="payname" data-name="Payment Name" type="text"
                           class="form-control" name="name" value="{{$payment->name}}" autofocus="">
                    <p class="testname" style="color:red"></p>
                </div>

                <label for="text" class="col-md-4 control-label">Payment Info<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <textarea data-validation="required" id="payinfo" data-name="Payment Info"
                              class="form-control" name="info" autofocus="">{{$payment->info}}</textarea>
                    <p class="testrequired" style="color:red"></p>
                </div>
            </div>



            <div class="form-group" id="save">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary save" id="{{$payment->id}}">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>