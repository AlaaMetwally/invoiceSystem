<div class="page-content-body">
    <div class="row" style="margin-left:0; margin-right:10px;">
        <form class="form-horizontal ajaxform" method="POST" action="<?php echo e(route('payment.update',$payment->id)); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" id="csrf-token" name="_token" value="<?php echo e(Session::token()); ?>">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Payment<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input data-validation="name" id="payname" data-name="Payment Name" type="text"
                           class="form-control" name="name" value="<?php echo e($payment->name); ?>" autofocus="">
                    <p id="testname" style="color:red"></p>
                </div>

                <label for="text" class="col-md-4 control-label">Payment Info<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <textarea data-validation="required" id="payinfo" data-name="Payment Info"
                              class="form-control" name="info" autofocus=""><?php echo e($payment->info); ?></textarea>
                    <p id="testrequired" style="color:red"></p>
                </div>
            </div>



            <div class="form-group" id="save">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary save" id="<?php echo e($payment->id); ?>">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>