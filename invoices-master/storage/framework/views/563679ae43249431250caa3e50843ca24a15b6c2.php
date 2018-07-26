<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo e(asset('assets/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/plugins/cropper/dist/cropper.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/jquery-ui-1.12.1/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.blockui.min.js')); ?>" type="text/javascript" charset="UTF-8"></script>
<script src="<?php echo e(asset('assets/global/plugins/pjax.js')); ?>" type="text/javascript"></script>
<script>
    $(document).on('ready', function () {
        new Pjax({
            elements: "a.pjax-link",
            selectors: [".m-wrapper", "title", ".page-title"]
        });

    });
    $(document).on('pjax:complete', function (response) {
        appUnBlockUI();


    });
    $(document).on('pjax:send', function () {
        appBlockUI();
    });
</script>
<script src="<?php echo e(asset('js/Connection.js')); ?>"></script>
<?php echo $__env->make('admin_includes.socket_connection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/malsup.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/jquery-editable-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/plugins/magnific-popup/jquery.magnific-popup.min.js')); ?>" type="text/javascript"
        charset="UTF-8"></script>
<script src="<?php echo e(asset('assets/admin/pages/scripts/popups.js')); ?>" type="text/javascript" charset="UTF-8"></script>
<script src="<?php echo e(asset('assets/admin/pages/scripts/jquery.form.js')); ?>" type="text/javascript" charset="UTF-8"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/uniform/jquery.uniform.js')); ?>" type="text/javascript"
        charset="UTF-8"></script>

<script src="<?php echo e(asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>" type="text/javascript"
        charset="UTF-8"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"
        type="text/javascript" charset="UTF-8"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/pages/scripts/components-bootstrap-select.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('assets/global/plugins/js.cookie.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/signature-pad/js/signature_pad.js')); ?>"></script>

<!-- Amcharts -->
<script src="<?php echo e(asset('js/amcharts/amcharts.js')); ?>"></script>
<script src="<?php echo e(asset('js/amcharts/serial.js')); ?>"></script>
<script src="<?php echo e(asset('js/amcharts/pie.js')); ?>"></script>
<script src="<?php echo e(asset('js/amcharts/themes/light.js')); ?>"></script>
<?php echo $__env->yieldContent('plugins_js'); ?>

<script src="<?php echo e(asset('assets/global/scripts/app.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/dragula/dragula.min.js')); ?>"></script>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/phone_input/js/intlTelInput.js')); ?>"></script>

<script src="<?php echo e(asset('assets/global/plugins/jscroll-master/jquery.jscroll.js')); ?>" type="text/javascript"
        charset="UTF-8"></script>

<?php echo $__env->yieldContent('theme_js'); ?>
<!-- END THEME GLOBAL SCRIPTS -->
<?php echo $__env->yieldContent('page_js'); ?>
<!-- BEGIN THEME LAYOUT SCRIPTS -->

<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>"></script>
<script type="text/javascript"
        src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>"></script>
<script type="text/javascript"
        src="<?php echo e(asset('assets/global/plugins/datatables/buttons/dataTables.buttons.min.js')); ?>"></script>
<script type="text/javascript"
        src="<?php echo e(asset('assets/global/plugins/datatables/buttons/buttons.flash.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/datatables/pdfmake/pdfmake.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/datatables/pdfmake/vfs_fonts.js')); ?>"></script>

<script type="text/javascript"
        src="<?php echo e(asset('assets/global/plugins/datetimepicker/bootstrap-datetimepicker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/jsvalidation.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')); ?>"></script>


<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/sweetAlert/sweetalert.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/global/plugins/select2/js/select2.min.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"
        type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/week-picker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/fine-uploader/fine-uploader.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/fine-uploader/fine-uploader.map.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/steps.js')); ?>"></script>
<script type="text/javascript"
        src="<?php echo e(asset('assets/global/plugins/bf-countrypicker/bootstrap-formhelpers.min.js')); ?>"></script>
<script type="text/javascript"
        src="<?php echo e(asset('assets/global/plugins/bf-countrypicker/bootstrap-formhelpers-countries.en_US.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/plugins/html2canvas/html2canvas.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/plugins/html2canvas/html2canvas.svg.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA23hcVbGIeP2pszZ5rmOMQ4XFkdnv4pEg&sensor=false&libraries=places"
        type="text/javascript"></script>
<script type="text/javascript"
        src="<?php echo e(asset('assets/global/plugins/locationpicker/locationpicker.jquery.min.js')); ?>"></script>


<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/countries.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/global/plugins/fancybox/dist/jquery.fancybox.min.js')); ?>"></script>
<script src="/js/vendors.bundle.js" type="text/javascript"></script>
<script src="/js/scripts.bundle.js" type="text/javascript"></script>


<!--end::Base Scripts -->
<!--begin::Page Resources -->
<?php echo $__env->make('vendor.fine-uploader.templates.simple-thumbnails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<!-- END THEME LAYOUT SCRIPTS -->
<?php echo $__env->yieldContent('layout_js'); ?>







