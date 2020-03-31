<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><i class="fa fa-shopping-basket fa-fw"></i> अन्न खरीद/बिक्रि</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title text-center">
                    अन्न खरीद विवरण
                </div>
                <table class="table table-sm table-bordered table-hover">
                    <thead class="bg-danger text-white">
                        <th>मिति</th>
                        <th>किसानको नाम</th>
                        <th>प्रकार/प्रजाति</th>
                        <th>तौल</th>
                        <th>खरीद रकम</th>
                    </thead>
                    <tbody>
                        <?php if(count($buyNSells) > 0): ?>
                            <?php $__currentLoopData = $buyNSells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buyNSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if($buyNSell->type == "खरीद"): ?>
                                        <td><span class="badge badge-pill badge-info"> <?php echo e($buyNSell->created_date); ?> </span></td>
                                        <td><?php echo e($buyNSell->food->name); ?></td>
                                        <td><?php echo e($buyNSell->food->variety." (".$buyNSell->food->species." )"); ?></td>
                                        <td><?php echo e($buyNSell->weight); ?></td>
                                        <td><?php echo e("Rs " . $buyNSell->amount); ?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title text-center">
                    अन्न बिक्रि विवरण
                </div>
                <table class="table table-sm table-bordered table-hover">
                    <thead class="bg-danger text-white">
                        <th>मिति</th>
                        <th>किसानको नाम</th>
                        <th>प्रकार/प्रजाति</th>
                        <th>तौल</th>
                        <th>बिक्रि रकम</th>
                    </thead>
                    <tbody>
                        <?php if(count($buyNSells) > 0): ?>
                            <?php $__currentLoopData = $buyNSells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buyNSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($buyNSell->type == "बिक्रि"): ?>
                                    <td><span class="badge badge-pill badge-info"> <?php echo e($buyNSell->created_date); ?> </span></td>
                                    <td><?php echo e($buyNSell->food->name); ?></td>
                                    <td><?php echo e($buyNSell->food->variety." (".$buyNSell->food->species." )"); ?></td>
                                    <td><?php echo e($buyNSell->weight); ?></td>
                                    <td><?php echo e("Rs " . $buyNSell->amount); ?></td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sahakaari\sahakaari\resources\views/food/buyNSell.blade.php ENDPATH**/ ?>