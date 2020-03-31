

<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><a href="<?php echo e(route('share.index')); ?>"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;&nbsp; नयाँ सेयर होल्डरको विवरण थप्नुहोस्
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tile">
                <form class="form-horizontal" method="POST" action="<?php echo e(route('share.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="tile-body">
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> सदस्यता नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-id-card-alt"></i></span>
                                    </div>
                                    <input type="number" name="no"
                                        class="form-control <?php echo e(($errors->has('no')) ? 'is-invalid' : ''); ?>" placeholder="नयाँ सेयर होल्डरको सदस्यता नम्बर" value="<?php echo e(old('no')); ?>">
                                    <?php if($errors->has('no')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('no')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> सेयर होल्डरको नाम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
                                    <input type="text" name="name"
                                        class="form-control <?php echo e(($errors->has('name')) ? 'is-invalid' : ''); ?>" placeholder="नयाँ सेयर होल्डरको नाम" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('name')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> सेयर होल्डरको स्थाई ठेगाना</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map-marked-alt"></i></span>
                                    </div>
                                    <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
                                    <input type="text" name="address"
                                        class="form-control <?php echo e(($errors->has('address')) ? 'is-invalid' : ''); ?>" placeholder="नयाँ सेयर होल्डरको स्थाई ठेगाना" value="<?php echo e(old('address')); ?>">
                                    <?php if($errors->has('address')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('address')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> सेयर होल्डरको सम्पर्क नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="contact_no"
                                        class="form-control <?php echo e(($errors->has('contact_no')) ? 'is-invalid' : ''); ?>" placeholder="नयाँ सेयर होल्डरको सम्पर्क नम्बर" value="<?php echo e(old('contact_no')); ?>">
                                    <?php if($errors->has('contact_no')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('contact_no')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> बाजेको नाम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-blind"></i></span>
                                    </div>
                                    <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
                                    <input type="text" name="grandfather_name"
                                        class="form-control <?php echo e(($errors->has('grandfather_name')) ? 'is-invalid' : ''); ?>" placeholder="नयाँ सेयर होल्डरको बाजेको नाम" value="<?php echo e(old('grandfather_name')); ?>">
                                    <?php if($errors->has('grandfather_name')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('grandfather_name')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> बुवाको नाम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                    </div>
                                    <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
                                    <input type="text" name="father_name"
                                        class="form-control <?php echo e(($errors->has('father_name')) ? 'is-invalid' : ''); ?>" placeholder="नयाँ सेयर होल्डरको बुवाको नाम" value="<?php echo e(old('father_name')); ?>">
                                    <?php if($errors->has('father_name')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('father_name')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">लिङ्ग</label>
                            <div class="col-md-8">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input <?php echo e(($errors->has('gender')) ? 'is-invalid' : ''); ?>" type="radio" name="gender" value = <?php echo e(old('gender','पुरुस')); ?>>पुरुस
                                </label>
                                <?php if($errors->has('gender')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('gender')); ?></div>
                                <?php endif; ?>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input <?php echo e(($errors->has('gender')) ? 'is-invalid' : ''); ?>" type="radio" name="gender" value = <?php echo e(old('gender','महिला')); ?>>महिला
                                </label>
                                <?php if($errors->has('gender')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('gender')); ?></div>
                                <?php endif; ?>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input <?php echo e(($errors->has('gender')) ? 'is-invalid' : ''); ?>" type="radio" name="gender" value = <?php echo e(old('gender','अन्य')); ?> >अन्य
                                </label>
                                <?php if($errors->has('gender')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('gender')); ?></div>
                                <?php endif; ?>
                              </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">वैवाहिक स्थिति</label>
                            <div class="col-md-8">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input <?php echo e(($errors->has('marital_status')) ? 'is-invalid' : ''); ?> marital-status" type="radio" name="marital_status" id="married" value = <?php echo e(old('marital_status','विवाहित')); ?>>विवाहित
                                </label>
                                <?php if($errors->has('marital_status')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('marital_status')); ?></div>
                                <?php endif; ?>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input <?php echo e(($errors->has('marital_status')) ? 'is-invalid' : ''); ?> marital-status" type="radio" name="marital_status" id="unmarried" value = <?php echo e(old('marital_status','अविवाहित')); ?>>अविवाहित
                                </label>
                                <?php if($errors->has('marital_status')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('marital_status')); ?></div>
                                <?php endif; ?>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input <?php echo e(($errors->has('marital_status')) ? 'is-invalid' : ''); ?> marital-status" type="radio" name="marital_status" id="other" value = <?php echo e(old('marital_status','अन्य')); ?>>अन्य
                                </label>
                                <?php if($errors->has('marital_status')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('marital_status')); ?></div>
                                <?php endif; ?>
                              </div>
                            </div>
                        </div>
                        <div class="form-group row" id="spouce-name">
                            <label class="control-label col-md-4 mt-2 text-right">दम्पतिको नाम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-restroom"></i></span>
                                    </div>
                                    <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
                                    <input type="text" name="spouce_name"
                                        class="form-control <?php echo e(($errors->has('spouce_name')) ? 'is-invalid' : ''); ?>" placeholder="नयाँ सेयर होल्डरको दम्पतिको नाम" value="<?php echo e(old('spouce_name')); ?>">
                                    <?php if($errors->has('spouce_name')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('spouce_name')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">हकवालाको नाम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-child"></i></span>
                                    </div>
                                    <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
                                    <input type="text" name="inheritant"
                                        class="form-control <?php echo e(($errors->has('inheritant')) ? 'is-invalid' : ''); ?>" placeholder="नयाँ सेयर होल्डरको हकवालाको नाम" value="<?php echo e(old('inheritant')); ?>">
                                    <?php if($errors->has('inheritant')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('inheritant')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">रसीद नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-receipt"></i></span>
                                    </div>
                                    <input type="number" name="receipt"
                                        class="form-control <?php echo e(($errors->has('receipt')) ? 'is-invalid' : ''); ?>" placeholder="रसीद नम्बर" value="<?php echo e(old('receipt')); ?>">
                                    <?php if($errors->has('receipt')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('receipt')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">सेयर कित्ता</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-copy"></i></span>
                                    </div>
                                    <input type="number" name="kittaa"
                                        class="form-control <?php echo e(($errors->has('kittaa')) ? 'is-invalid' : ''); ?>" placeholder="सेयर कित्ता" value="<?php echo e(old('kittaa')); ?>" id="kittaa">
                                    <?php if($errors->has('kittaa')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('kittaa')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">ब्यालेन्स</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money-bill"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="balance" placeholder="ब्यालेन्स" id="balance" readonly>
                                    <?php if($errors->has('balance')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('balance')); ?></div>
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
                                    <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
                                    <input type="text" name="description"
                                        class="form-control <?php echo e(($errors->has('description')) ? 'is-invalid' : ''); ?>" placeholder="विवरण" value="<?php echo e(old('description')); ?>">
                                    <?php if($errors->has('description')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('description')); ?></div>
                                    <?php endif; ?>
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
                                    <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
                                    <input type="text" name="remarks"
                                        class="form-control <?php echo e(($errors->has('remarks')) ? 'is-invalid' : ''); ?>" placeholder="कैफियत" value="<?php echo e(old('remarks')); ?>">
                                    <?php if($errors->has('remarks')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('remarks')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputFile" class="control-label col-md-4 mt-2 text-right">फोटो र हस्ताक्षर भएको इमेज अपलोड गर्नुहोस्</label>
                            <div class="col-md-8">
                                <input class="form-control-file" id="share-image" type="file" aria-describedby="fileHelp" name="image">
                                <small class="form-text text-muted" id="fileHelp">** ठाउँ बचत गर्न कृपया संकुचित इमेज अपलोड गर्नुहोस्</small>
                            </div>
                          </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-success float-right" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i> थप्नुहोस्
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>
    
    <script>
    
        jQuery(function($) {
            $("#spouce-name").hide();
            $(".marital-status").change(() => {
                let marital_status =  $("input[name='marital_status']:checked").val();
                if(marital_status == "विवाहित") {
                    $("#spouce-name").show();
                } else {
                    $("#spouce-name").hide();
                }
            });

            $("#kittaa").on('input', function() {
                let share_kittaa = parseInt($("#kittaa").val());
                if(!isNaN(share_kittaa)) {
                    $("#balance").attr('value', share_kittaa*100);
                } else {
                    $("#balance").attr('value', 0);
                }
            });

            let share_kittaa = parseInt($("#kittaa").val());
            $("#balance").attr('value', share_kittaa*100);
        });
    
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitsahakaari/public_html/sahakaari/resources/views/share/create.blade.php ENDPATH**/ ?>