<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><a href="<?php echo e(route('share.index')); ?>"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;<?php echo e($share->name); ?>को विवरण
        </h1>
    </div>

    
    
    <div id="printable-content">

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <button class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#change-balance"><i class="fa fa-plus-circle fa-fw"></i> सेयर थप्नुहोस्</button>
            <div class="tile-title">
              <h3 class="text-center">
                सेयर खाताको विवरण
              </h3>
            </div>
              <table class="table table-sm table-bordered table-hover">
                <thead class="bg-danger text-white">
                  <tr>
                    <th>मिति</th>
                    <th>रसिद नम्बर</th>
                    <th>विवरण</th>
                    <th>सेयर कित्ता</th>
                    <th>क्रेडिट</th>
                    <th>ब्यालेन्स</th>
                    <th>कैफियत</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $balances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td width="75px"><span class="badge badge-pill badge-info" style="font-size: 14px;"><?php echo e(($balance->creation_date) ? $balance->creation_date : $balance->created_date); ?></span></td>
                      <td><span class="badge badge-pill badge-success"><?php echo e($balance->receipt); ?></span></td>
                      <td><?php echo e($balance->description); ?></td>
                      <td><?php echo e($balance->kittaa); ?></td>
                      <td>Rs. <?php echo e(($balance->deposit == null) ? 0 : $balance->deposit); ?></td>
                      <td>Rs. <?php echo e($balance->balance); ?></td>
                      <td><?php echo e($balance->remarks); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>

      

      
    </div>

    <!-- Modal -->
    <div class="modal" id="change-balance">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0px;">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-white">सेयर थप्न फारम</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo e(route('share.balance', $share->id)); ?>" method="POST">
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
                <label class="control-label">रसीद नम्बर</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-receipt"></i></span>
                    </div>
                    <input type="number" name="receipt"
                      class="form-control" placeholder="रसीद नम्बर" value="<?php echo e(old('receipt')); ?>">
                  </div>
              </div>
              <div class="form-group">
                <label class="control-label">सेयर कित्ता</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-copy"></i></span>
                  </div>
                  <input type="number" name="kittaa"
                    class="form-control" placeholder="सेयर कित्ता" value="<?php echo e(old('kittaa')); ?>" id="kittaa">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">रकम</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-money-bill"></i></span>
                  </div>
                  <input type="number" name="amount" placeholder="रकम" class="form-control" id="amount" readonly>
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
    <script>
      jQuery(function($) {

        $("#kittaa").on('input', function() {
          let share_kittaa = parseInt($("#kittaa").val());
          if(!isNaN(share_kittaa)) {
              $("#amount").attr('value', share_kittaa*100);
          } else {
              $("#amount").attr('value', 0);
          }
        });

        // $(".print-page").click(function() {
        //   printDiv();
        // });

        // function printDiv() {
        //   let divToPrint=document.getElementById('printable-content');
        //   let newWin=window.open('','Print-Window');
        //   newWin.document.open();
        //   newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        //   newWin.document.close();
        //   setTimeout(function(){newWin.close();},10);
        // }
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sahakaari\sahakaari\resources\views/share/show.blade.php ENDPATH**/ ?>