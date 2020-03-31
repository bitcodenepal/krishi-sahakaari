

<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><a href="<?php echo e(route('harvester.index')); ?>"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;&nbsp;हार्वेस्टर प्रयोगको विवरण थप्नुहोस्
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tile">
                <form action="<?php echo e(route('harvester.store')); ?>" class="form-horizontal" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="tile-body">
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> हार्वेस्टर प्रयोगकर्ताको नाम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name"
                                        class="form-control <?php echo e(($errors->has('name')) ? 'is-invalid' : ''); ?>" placeholder="हार्वेस्टर प्रयोगकर्ताको नाम" value="<?php echo e(old('name')); ?>">
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
                            <label class="control-label col-md-4 mt-2 text-right">हार्वेस्टर प्रयोग गरिने ठाउँ</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                                    </div>
                                    <input type="text" name="use_address"
                                           class="form-control <?php echo e(($errors->has('use_address')) ? 'is-invalid' : ''); ?>"
                                           placeholder="हार्वेस्टर प्रयोग गरिने ठाउँ" id="use_address" value="<?php echo e(old('use_address')); ?>">
                                    <?php if($errors->has('use_address')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('use_address')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> हार्वेस्टर प्रयोगको मिति</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="use_date"
                                        class="form-control <?php echo e(($errors->has('use_date')) ? 'is-invalid' : ''); ?>" placeholder="अन्नको प्रकार" value="<?php echo e(old('use_date')); ?>">
                                    <?php if($errors->has('use_date')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('use_date')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> हार्वेस्टर प्रयोग गर्न रकम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="number" name="amount" id="amount"
                                           class="form-control <?php echo e(($errors->has('amount')) ? 'is-invalid' : ''); ?>"
                                           placeholder="हार्वेस्टर प्रयोग गर्न रकम" value="<?php echo e(old('amount')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> विवरण</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-copy"></i></span>
                                    </div>
                                    <input type="text" name="description"
                                        class="form-control <?php echo e(($errors->has('description')) ? 'is-invalid' : ''); ?>" placeholder="विवरण" value="<?php echo e(old('description')); ?>">
                                    <?php if($errors->has('description')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('description')); ?></div>
                                    <?php endif; ?>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitsahakaari/public_html/sahakaari/resources/views/harvester/create.blade.php ENDPATH**/ ?>