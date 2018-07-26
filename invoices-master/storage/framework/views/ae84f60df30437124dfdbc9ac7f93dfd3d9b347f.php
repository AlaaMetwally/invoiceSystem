<div class="m-portlet m-portlet--mobile">

    <div class="m-portlet m-portlet--tab">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
                    <h3 class="m-portlet__head-text">
                        Edit Your Profile
                    </h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right ajaxform" id="editForm" method="POST"
              action="<?php echo e(route('user.update',$user->id)); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" id="csrf-token" name="_token" value="<?php echo e(Session::token()); ?>">
            <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="name">
                        Name *
                    </label>
                    <input type="text" data-validation="name" name="name" class="form-control m-input m-input--solid"
                           id="name"
                           value="<?php echo e($user->name); ?>">
                    <p id="testname" style="color:red"></p>
                </div>
                <div class="form-group m-form__group">
                    <label for="email">
                        Email address *
                    </label>
                    <input type="email" data-validation="email" name="email" class="form-control m-input m-input--solid"
                           id="email"
                           value="<?php echo e($user->email); ?>">
                    <p id="testemail" style="color:red"></p>

                </div>
                <div class="form-group m-form__group">
                    <label for="phone">
                        Phone
                    </label>
                    <input type="tel" data-validation="phone" name="phone" class="form-control m-input m-input--solid"
                           id="phone"
                           value="<?php echo e($user->phone); ?>">
                </div>
                <div class="form-group m-form__group">
                    <label for="address">
                        Address *
                    </label>
                    <textarea data-validation="required" name="address" class="form-control m-input m-input--solid"
                              id="address"
                              rows="3"><?php echo e($user->address); ?></textarea>
                    <p id="testaddress" style="color:red"></p>
                </div>
                <div class="form-group m-form__group">
                    <label for="country">
                        Country *
                    </label>
                    <select data-validation="country" name="country" class="form-control m-input m-input--solid"
                            id="country"
                            data-default-value="<?php echo e($user->country); ?>" style="padding-top: 5px;">

                    </select>
                    <p id="testcountry" style="color:red"></p>
                </div>
                <div class="form-group m-form__group">
                    <label for="city">
                        City *
                    </label>
                    <select data-validation="city" name="city" class="form-control m-input m-input--solid" id="city"
                            data-default-value="<?php echo e($user->city); ?>" style="padding-top: 5px;">

                    </select>
                    <p id="testcity" style="color:red"></p>
                </div>

                <button type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#m_modal_1"
                        style="margin-left: 30px">
                    Upload Logo
                </button>
                <p id="logoname" name="logo"></p>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                    <button type="submit" class="btn btn-success" id="<?php echo e($user->id); ?>">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <!--end::Form-->
        <div class="white-popup" id="check"
             style="display:none;position: relative;background: #FFF;padding: 20px;width: auto;max-width: 900px;height:700px;margin: 20px auto;">
            <!--form of uploading image -->
            <form class="m-form m-form--fit m-form--label-align-right ajaxform" id="uploadForm" method="POST"
                  enctype="multipart/form-data"
                  action="<?php echo e(route('user.upload',$user->id)); ?>">

                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="csrf-token" name="_token" value="<?php echo e(Session::token()); ?>">
                <div class="modal-body">
                    <div class="avatar-body">

                        <!-- Upload image and data -->
                        <div class="avatar-upload">
                            <label for="avatarInput">Local upload</label>
                            <input type='file' accept='image/*' onchange='openFile(event)' id="path"
                                   name="pathname"><br>
                            <p id="logoimage" style="color:red"></p>
                            <input type="hidden" id="dataimage" name="dataimage"/>
                        </div>
                        <!-- Crop and preview -->
                        <div class="row" style="padding-bottom: 30px;">
                            <div class="col-md-9" style="height:450px">
                                <img id="output">
                            </div>
                            <div class="col-md-3" style="padding-left: 18px;padding-top: 10px;">
                                <div style="border:0.5px solid grey; width:180px;height: 90px">
                                    <div class="preview"></div>
                                </div>
                            </div>
                            <div class="row avatar-btns">
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-block avatar-save"
                                            style="width: 100px;">Done
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end form of uploading image -->
            </form>
        </div>
    </div>

</div>

