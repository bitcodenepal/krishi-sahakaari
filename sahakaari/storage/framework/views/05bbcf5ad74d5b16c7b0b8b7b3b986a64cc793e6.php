

<?php $__env->startSection('content'); ?>

    <div class="app-title">
        <h1><a href="<?php echo e(route('share.index')); ?>"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;<?php echo e($share->name); ?>को विवरण
        </h1>
    </div>

    <button class="btn btn-sm btn-primary mb-3 print-page"><i class="fa fa-print fa-fw"></i> Print</button>
    
    <div id="printable-content">

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
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
                    <th>डेबिट</th>
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
                      <td>Rs. <?php echo e(($balance->withdraw == null) ? 0 : $balance->withdraw); ?></td>
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

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title">
              <h3 class="text-center">
                बचत खाताको विवरण
              </h3>
            </div>
              <table class="table table-sm table-bordered table-hover">
                <thead class="bg-danger text-white">
                  <tr>
                    <th>मिति</th>
                    <th>खाता प्रकार</th>
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
                  <?php $__currentLoopData = $savings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saving): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $savingBalance = \App\SavingBalance::where('saving_id', $saving->id)->latest()->first();
                      $date = ($savingBalance->creation_date) ? $savingBalance->creation_at : $savingBalance->created_at;
                      $createdDate = \Carbon\Carbon::parse($date, 'UTC');
                      $now = \Carbon\Carbon::now();
                      $diff = $createdDate->diffInDays($now);
                      $dailyInterest = ($diff *($savingBalance->interest/100))/365;

                      $savingAmount = ($diff > 0) ? $savingBalance->balance+$savingBalance->balance*$dailyInterest : $savingBalance->balance;
                    ?>
                    <tr>
                      <td width="75px"><span class="badge badge-pill badge-info" style="font-size: 14px;"><?php echo e(($savingBalance->creation_date) ? $savingBalance->creation_date : $savingBalance->created_date); ?></span></td>
                      <td><?php echo e($saving->acc_type); ?></td>
                      <td><?php echo e($savingBalance->description); ?></td>
                      <td>Rs. <?php echo e(($savingBalance->withdraw == null) ? 0 : $savingBalance->withdraw); ?></td>
                      <td>Rs. <?php echo e(($savingBalance->deposit == null) ? 0 : $savingBalance->deposit); ?></td>
                      <td>Rs. <?php echo e($savingBalance->balance); ?></td>
                      <td><?php echo e($savingBalance->interest); ?> %</td>
                      <td>Rs. <?php echo e($dailyInterest); ?></td>
                      <td>Rs. <?php echo e($savingAmount); ?></td>
                      <td><?php echo e($savingBalance->remarks); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>
    <script>
      jQuery(function($) {

        $(".print-page").click(function() {
          printDiv();
        });

        function printDiv() {
          let divToPrint=document.getElementById('printable-content');
          let newWin=window.open('','Print-Window');
          newWin.document.open();
          newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
          newWin.document.close();
          setTimeout(function(){newWin.close();},10);
        }
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitsahakaari/public_html/sahakaari/resources/views/share/show.blade.php ENDPATH**/ ?>