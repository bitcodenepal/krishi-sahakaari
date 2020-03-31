

<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><a href="<?php echo e(route('savings.index')); ?>"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;&nbsp; <?php echo e($saving->share->name); ?>को विवरण (खाताको प्रकार => <?php echo e($saving->acc_type); ?>)
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <button class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#change-balance"><i class="fa fa-times-circle fa-fw"></i> withdraw/deposit</button>
              <table class="table table-sm table-bordered table-hover">
                <thead class="bg-danger text-white">
                  <tr>
                    <th>मिति</th>
                    <th>विवरण</th>
                    <th>डेबिट</th>
                    <th>क्रेडिट</th>
                    <th>प्रमुख राशि</th>
                    <th>ब्याजदर</th>
                    <th>ब्याज राशि</th>
                    <th>ब्याज सहित राशि</th>
                    <th>कैफियत</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $saving->savingBalances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td width="75px"><span class="badge badge-pill badge-info" style="font-size: 14px;"><?php echo e(($balance->creation_date) ? $balance->creation_date : $balance->created_date); ?></span></td>
                      <td><?php echo e($balance->description); ?></td>
                      <td>Rs. <?php echo e(($balance->withdraw == null) ? 0 : $balance->withdraw); ?></td>
                      <td>Rs. <?php echo e(($balance->deposit == null) ? 0 : $balance->deposit); ?></td>
                      <td>Rs. <?php echo e($balance->balance); ?></td>
                      <td><?php echo e($balance->interest); ?> %</td>
                      <td>Rs. <?php echo e($balance->balance*$daily_interest); ?></td>
                      <td>Rs. <?php echo e($saving_amount); ?></td>
                      <td><?php echo e($balance->remarks); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="change-balance">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0px;">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-white">डेबिट/क्रेडिट फारम</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo e(route('savings.balance', $saving->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
              <div class="form-group">
                <label class="control-label">विवरण</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-sticky-note"></i></span>
                  </div>
                  <input type="text" name="description"
                      class="form-control" placeholder="विवरण">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">प्रक्रिया चयन गर्नुहोस्</label>
                <select name="method" id="method" class="form-control method">
                  <option disabled>-- प्रक्रिया चयन गर्नुहोस् --</option>
                  <option value="deposit">क्रेडिट</option>
                  <option value="withdraw" selected>डेबिट</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">रकम</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-money-bill"></i></span>
                  </div>
                  <input type="number" name="amount" placeholder="रकम" class="form-control" id="amount" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">कुल ब्याजदर</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-percent"></i></span>
                  </div>
                  <input type="number" name="interest" class="form-control" placeholder="कुल ब्याजदर">
              </div>
            </div>
            <div class="form-group">
                <label class="control-label"> मिति</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" name="creation_date" id="nepaliDate10" class="form-control" placeholder="मिति (YYYY-MM-DD)">
              </div>
            </div>
              <div class="form-group">
                <label class="control-label">कैफियत</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                  </div>
                  <input type="text" name="remarks"
                      class="form-control" placeholder="कैफियत">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success" type="submit"><i
                class="fa fa-fw fa-lg fa-check-circle"></i> थप्नुहोस्</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitsahakaari/public_html/sahakaari/resources/views/savings/show.blade.php ENDPATH**/ ?>