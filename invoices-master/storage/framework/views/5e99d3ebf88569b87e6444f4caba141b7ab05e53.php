<div class="page-content-body">
    <div class="row" style="margin-left:0; margin-right:10px;">
        <form class="form-horizontal ajaxform" method="POST"
              action="<?php echo e(route('client.update',$client->id)); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" id="csrf-token" name="_token" value="<?php echo e(Session::token()); ?>">
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Client Name<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input data-validation="name" id="clientname" data-name="Client Name" type="text"
                           class="form-control" name="name" value="<?php echo e($client->name); ?>" autofocus="">
                    <p class="testname" style="color:red"></p>
                </div>
                <label for="name" class="col-md-4 control-label">Client Email<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input data-validation="email" id="clientemail" data-name="Client Email" type="text"
                           class="form-control" name="email" value="<?php echo e($client->email); ?>" autofocus="">
                    <p class="testemail" style="color:red"></p>
                </div>
                <label for="name" class="col-md-4 control-label">Billing Info<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <textarea data-validation="required" id="clientinfo" data-name="Billing Info" type="text"
                              class="form-control" name="billing_info" autofocus=""><?php echo e($client->billing_info); ?></textarea>
                    <p class="testrequired" style="color:red"></p>
                </div>
                <label for="name" class="col-md-4 control-label">Payment Method<span style="color:red;">*</span></label>
                <div class="col-md-3">
                    <select data-validation="select" name="payment" class="form-control m-input m-input--solid select"
                            id="clientmethod" style="padding-top: 5px; display:block">
                        <option value="">Select Payment</option>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($payment->id); ?>" name="payment_method" id="<?php echo e($payment->id); ?>"
                                    <?php if($client->payment_id == $payment->id): ?>  selected <?php endif; ?>>
                                <?php echo e($payment->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p class="testselect" style="color:red"></p>

                    <input value="<?php echo e($client->payment?$client->payment->name:''); ?>" data-validation="addname" id="new_payment" type="text" class="form-control addpayment" name="addname"
                           style="display:none;">
                           <p class="testaddname" style="color:red"></p>
                    <div style="display:none;" class="cancel">
                        <button type="button" data-name="<?php echo e($client->payment?$client->payment->name:''); ?>" class="btn btn-danger cancelAdd" style="margin-top:10px;">Cancel</button>
                        <button data-input="new_payment" data-name="Payment" type="button"
                                class="btn btn-success" id="addStuff" style="margin-top:10px;margin-left:20px;">Add
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-warning addNew" type="button" value="add new" style="display: block">Add new
                    </button>
                </div>
            </div>

            <div class="form-group" id="save">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary save" id="<?php echo e($client->id); ?>">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



