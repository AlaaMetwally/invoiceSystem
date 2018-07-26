<?php
$i = '';
$j = '';
?>

<?php $__env->startSection('plugins_css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('plugins_js'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
    <script src="<?php echo e(asset('assets/admin/pages/scripts/currency.js')); ?>" type="text/javascript" charset="UTF-8"></script>
    <script src="<?php echo e(asset('assets/admin/pages/scripts/ajaxForms.js')); ?>" type="text/javascript" charset="UTF-8"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('add_inits'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page_title_small'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make($partialView, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>