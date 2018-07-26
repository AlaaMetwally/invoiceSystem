<div class="m-portlet m-portlet--mobile">

    <div class="m-portlet__body">
        <div class="col-md-6 col-md-offset-4" align="left">
            <a type="submit" class="btn btn-primary pjax-link" href="<?php echo e(route('unit.init')); ?>">Add New</a>
        </div>
        <!--begin: Datatable -->
        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded m-datatable--scroll"
             id="m_datatable_latest_orders" style="">
            <table class="table table-bordered" id="units-table">
                <thead>
                <tr>
                    <th>Unit</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="<?php echo e($unit->id); ?>">
                        <td><?php echo e($unit->name); ?></td>
                        <td><a href="<?php echo e(route('unit.edit', $unit->id)); ?>"
                               class="btn btn-warning btn-sm pjax-link"
                               data-id="<?php echo e($unit->id); ?>">EDIT <i class="fa fa-edit"></i></a>
                            <button class="deleteRow btn btn-danger btn-sm"
                                    id="<?php echo e($unit->id); ?>">DELETE <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!--end: Datatable -->
    </div>

</div>
