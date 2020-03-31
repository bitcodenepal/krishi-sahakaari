<!DOCTYPE html>
<html lang="en">
<head>
    <title>कृषि उपज बजार ब्यबस्थापन सहकारी संस्था ली.</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>"/>
    <link href="<?php echo e(asset('css/data-tables.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/datatable-bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/nepali.datepicker.v2.1.min.css')); ?>">
    <?php echo $__env->yieldContent('page-styles'); ?>
    <style>
        .btn, .modal-content {
            border-radius: 0px;
        }
        .naya_convert{
 	     	display: none;
 		}
    </style>
    <?php echo $__env->yieldContent('custom-styles'); ?>
</head>
<body class="app sidebar-mini rtl">
<?php echo $__env->make('layouts.partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="app-content">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/datatables-jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/datatables-bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/nepali.datepicker.v2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/nepalidate.js')); ?>"></script>
<script src="<?php echo e(asset('js/nayaEN2NPinit.js')); ?>"></script>
<?php echo $__env->yieldContent('page-scripts'); ?>
<?php echo $__env->yieldContent('custom-scripts'); ?>
<script>
    <?php if(Session::has('success')): ?>
    jQuery.notify({
        title: "सफल : ",
        message: "<?php echo e(Session::get('success')); ?>",
        icon: 'fa fa-check'
    }, {
        type: "success"
    });
    <?php endif; ?>
    <?php if(Session::has('info')): ?>
    jQuery.notify({
        title: "जानकारी : ",
        message: "<?php echo e(Session::get('info')); ?>",
        icon: 'fa fa-exclamation-triangle'
    }, {
        type: "info"
    });
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
    jQuery.notify({
        title: "त्रुटि : ",
        message: "<?php echo e(Session::get('error')); ?>",
        icon: 'fa fa-times-circle'
    }, {
        type: "danger"
    });
    <?php endif; ?>
</script>
</body>
</html>
<?php /**PATH /home/bitsahakaari/public_html/sahakaari/resources/views/layouts/master.blade.php ENDPATH**/ ?>