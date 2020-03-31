<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><i class="fa fa-arrow-circle-up fa-fw"></i> डाटा आयात कार्यक्षमता</h1>
    </div>

    <?php if($errors->has('select_file')): ?>
        <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <?php echo e($errors->first('select_file')); ?>

            </div>
        </div>
    <?php endif; ?>

    <div class="tile">
        <div class="tile-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('import.import_excel')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td><label>बचत खाताको एक्सेल पाना चयन गर्नुहोस्</label></td>
                            <td>
                                <input type="file" name="select_file"/>
                            </td>
                            <td>
                                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sahakaari\sahakaari\resources\views/import.blade.php ENDPATH**/ ?>