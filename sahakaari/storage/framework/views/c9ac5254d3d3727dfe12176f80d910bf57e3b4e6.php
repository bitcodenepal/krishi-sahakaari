<?php $__env->startSection('page-styles'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><a href="<?php echo e(route('savings.index')); ?>"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;&nbsp; नयाँ बचत खाताको विवरण थप्नुहोस्
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tile">
                <form class="form-horizontal" method="post" action="<?php echo e(route('savings.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="tile-body">
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खाताको प्रकार</label>
                            <div class="col-md-8">
                                <select name="acc_type" id="acc-type"
                                        class="form-control select2 <?php echo e(($errors->has('acc_type')) ? 'is-invalid' : ''); ?>">
                                    <option value="" selected>-- खाताको प्रकार चयन गर्नुहोस् --</option>
                                    <option value="नियमित" <?php echo e((old('acc_type') == "नियमित" ? 'selected' : '')); ?>>
                                        नियमित
                                    </option>
                                    <option value="खुत्रुके" <?php echo e((old('acc_type') == "खुत्रुके" ? 'selected' : '')); ?>>
                                        खुत्रुके
                                    </option>
                                    <option value="ऐच्छिक" <?php echo e((old('acc_type') == "ऐच्छिक" ? 'selected' : '')); ?>>
                                        ऐच्छिक
                                    </option>
                                </select>
                                <?php if($errors->has('acc_type')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('acc_type')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row" id="acc-no">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको खाता नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                    </div>
                                    <input type="number" name="acc_no"
                                           class="form-control <?php echo e(($errors->has('acc_no')) ? 'is-invalid' : ''); ?>"
                                           placeholder="खातावालाको खाता नम्बर" value="<?php echo e(old('acc_no')); ?>">
                                    <?php if($errors->has('acc_no')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('acc_no')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको आईडी</label>
                            <div class="col-md-8">
                                <select name="share_id" id="share-id" class="form-control select2">
                                    <option value="" selected> -- खातावालाको आईडी चयन गर्नुहोस् --</option>
                                    <?php $__currentLoopData = $nos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($no); ?>"><?php echo e($no); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('share_id')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('share_id')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">Name (नाम)</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name"
                                           class="form-control <?php echo e(($errors->has('name')) ? 'is-invalid' : ''); ?>"
                                           placeholder="नयाँ खातावालाको नाम" id="name" value="<?php echo e(old('name')); ?>" readonly>
                                    <?php if($errors->has('name')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('name')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको स्थाई ठेगाना</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map-marked-alt"></i></span>
                                    </div>
                                    <input type="text" name="address"
                                           class="form-control <?php echo e(($errors->has('address')) ? 'is-invalid' : ''); ?>"
                                           placeholder="खातावालाको स्थाई ठेगाना" id="address" value="<?php echo e(old('address')); ?>" readonly>
                                    <?php if($errors->has('address')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('address')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको सम्पर्क नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="contact_no"
                                           class="form-control <?php echo e(($errors->has('contact_no')) ? 'is-invalid' : ''); ?>"
                                           placeholder="खातावालाको सम्पर्क नम्बर" id="contact-no" value="<?php echo e(old('contact_no')); ?>" readonly>
                                    <?php if($errors->has('contact_no')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('contact_no')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">सेयर ब्यालेन्स</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money-bill-wave"></i></span>
                                    </div>
                                    <input type="number" name="balance"
                                           class="form-control <?php echo e(($errors->has('balance')) ? 'is-invalid' : ''); ?>"
                                           placeholder="सेयर ब्यालेन्स" id="balance" value="<?php echo e(old('balance')); ?>" readonly>
                                    <?php if($errors->has('balance')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('balance')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाले दिएका कुल रकम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="number" name="money"
                                           class="form-control <?php echo e(($errors->has('money')) ? 'is-invalid' : ''); ?>"
                                           placeholder="खातावालाले दिएका कुल रकम" value="<?php echo e(old('money')); ?>">
                                    <?php if($errors->has('money')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('money')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">कुल ब्याजदर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="number" name="interest"
                                           class="form-control <?php echo e(($errors->has('interest')) ? 'is-invalid' : ''); ?>"
                                           placeholder="कुल ब्याजदर" value="<?php echo e(old('interest')); ?>">
                                    <?php if($errors->has('interest')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('interest')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> खाता सिर्जना को मिति</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="creation_date" id="nepaliDate10"
                                        class="form-control <?php echo e(($errors->has('creation_date')) ? 'is-invalid' : ''); ?>" placeholder="खाता सिर्जना को मिति (YYYY-MM-DD)" value="<?php echo e(old('creation_date')); ?>">
                                    <?php if($errors->has('creation_date')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('creation_date')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">विवरण</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-sticky-note"></i></span>
                                    </div>
                                    <input type="text" name="description"
                                        class="form-control" placeholder="विवरण">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">कैफियत</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="text" name="remarks"
                                        class="form-control" placeholder="कैफियत">
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

<?php $__env->startSection('page-scripts'); ?>

    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>

    <script>
    
        jQuery(function($) {

            $("#acc-no").hide();
            
            $(".select2").select2();

            $("#acc-type").change(function() {
                if ($("#acc-type").val() == "ऐच्छिक") {
                    $("#acc-no").show();
                } else {
                    $("#acc-no").hide();
                }
            });

            $("#share-id").change(function() {
                let accId = $("#share-id").val();
                $.get("<?php echo e(route('get-share-details')); ?>", {accId}, function(response) {
                    $("#name").attr('value', response.share[0].name);
                    $("#address").attr('value', response.share[0].address);
                    $("#contact-no").attr('value', response.share[0].contact_no);
                    $("#balance").attr('value', response.balance)
                });
            });          

        });
    
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sahakaari\sahakaari\resources\views/savings/create.blade.php ENDPATH**/ ?>