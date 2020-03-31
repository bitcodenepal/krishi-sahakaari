<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><a href="<?php echo e(route('food.index')); ?>"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;&nbsp;अन्नको विवरण थप्नुहोस्
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tile">
                <form action="<?php echo e(route('food.store')); ?>" class="form-horizontal" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="tile-body">

                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> किसानको नाम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name"
                                        class="form-control <?php echo e(($errors->has('name')) ? 'is-invalid' : ''); ?>" placeholder="किसानको नाम" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('name')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">स्थाई ठेगाना</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map-marked-alt"></i></span>
                                    </div>
                                    <input type="text" name="address"
                                           class="form-control <?php echo e(($errors->has('address')) ? 'is-invalid' : ''); ?>"
                                           placeholder="स्थाई ठेगाना" id="address" value="<?php echo e(old('address')); ?>">
                                    <?php if($errors->has('address')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('address')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">सम्पर्क नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="contact_no"
                                           class="form-control <?php echo e(($errors->has('contact_no')) ? 'is-invalid' : ''); ?>"
                                           placeholder="सम्पर्क नम्बर" id="contact-no" value="<?php echo e(old('contact_no')); ?>">
                                    <?php if($errors->has('contact_no')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('contact_no')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> अन्नको प्रकार</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-seedling"></i></span>
                                    </div>
                                    <input type="text" name="variety"
                                        class="form-control <?php echo e(($errors->has('variety')) ? 'is-invalid' : ''); ?>" placeholder="अन्नको प्रकार" value="<?php echo e(old('variety')); ?>">
                                    <?php if($errors->has('variety')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('variety')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> अन्नको प्रजाति</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-spa"></i></span>
                                    </div>
                                    <input type="text" name="species"
                                        class="form-control <?php echo e(($errors->has('species')) ? 'is-invalid' : ''); ?>" placeholder="अन्नको प्रजाति" value="<?php echo e(old('species')); ?>">
                                    <?php if($errors->has('species')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('species')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> तौल</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-balance-scale"></i></span>
                                    </div>
                                    <input type="text" name="weight"
                                        class="form-control <?php echo e(($errors->has('weight')) ? 'is-invalid' : ''); ?>" placeholder="तौल" value="<?php echo e(old('weight')); ?>">
                                    <?php if($errors->has('weight')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('weight')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">रकम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="number" name="amount" id="amount"
                                           class="form-control <?php echo e(($errors->has('amount')) ? 'is-invalid' : ''); ?>"
                                           placeholder="रकम लेख्नुहोस्" value="<?php echo e(old('amount')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-success float-right" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>थप्नुहोस्
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sahakaari\sahakaari\resources\views/food/create.blade.php ENDPATH**/ ?>