<div class="m-portlet m-portlet--mobile">

    <div class="m-portlet__body">

        <div><span class="Title">Name : </span><span class="title_info"><?php echo e($user->name); ?></span></div>
        <div><span class="Title">Email : </span><span class="title_info"><?php echo e($user->email); ?></span></div>
        <div><span class="Title">Phone : </span><span class="title_info"><?php echo e($user->phone); ?></span></div>
        <div><span class="Title">Address : </span><span class="title_info"><?php echo e($user->address); ?></span></div>
        <div><span class="Title">Country : </span><span class="title_info"><?php echo e($user->country); ?></span></div>
        <div><span class="Title">City : </span><span class="title_info"><?php echo e($user->city); ?></span></div>
        <hr>

        <img style="width: 500px;height: 300px;" src="<?php echo e(asset("storage$user->logo")); ?>"></img>
        <br>
        <div>
            <a href="<?php echo e(route('user.edit',$user->id)); ?>" style="margin-top: 10px;" class="btn btn-warning btn-sm pjax-link" data-id="<?php echo e($user->id); ?>">
                Edit <i class="fa fa-edit"></i>
            </a>
        </div>

    </div>
</div>

