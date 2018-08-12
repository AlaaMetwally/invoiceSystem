<div class="page-content-body">
    <div class="row" style="margin-left:0; margin-right:10px;">
        <form class="form-horizontal ajaxform" method="POST" action="<?php echo e(route('service.update',$service->id)); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" id="csrf-token" name="_token" value="<?php echo e(Session::token()); ?>">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Service<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input data-validation="name" id="servicename" data-name="Service Name" type="text"
                           class="form-control" name="name" value="<?php echo e($service->name); ?>" autofocus="">
                    <p id="testname" style="color:red"></p>
                </div>
                <label for="text" class="col-md-4 control-label">Service Description<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <textarea data-validation="required" id="serviceinfo" data-name="Service Info"
                              class="form-control" name="info" autofocus=""><?php echo e($service->description); ?></textarea>
                    <p id="testrequired" style="color:red"></p>
                </div>
            </div>


            <div class="form-group" id="save">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary save" id="<?php echo e($service->id); ?>">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>