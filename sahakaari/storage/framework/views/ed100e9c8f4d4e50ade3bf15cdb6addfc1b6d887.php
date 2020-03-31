<div class="modal-header bg-primary">
    <h5 class="modal-title text-white">ऋण विवरण</h5>
    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="bs-component">
                <ul class="list-group">
                  <li class="list-group-item">
                    ऋणीको आईडी
                    <span class="float-right"><b><?php echo e($loan->share_id); ?></b></span>
                  </li>
                  <li class="list-group-item">
                    ऋण मिति
                    <span class="float-right badge badge-pill badge-info" style="font-size: 14px;"><b><?php echo e($loan->created_date); ?></b></span>
                  </li>
                  <li class="list-group-item">
                    ऋणीको नाम
                    <span class="float-right"><b><?php echo e($loan->share->name); ?></b></span>
                  </li>
                  <li class="list-group-item">
                    ऋणको प्रकार
                    <span class="float-right"><b><?php echo e($loan->loan_type); ?></b></span>
                  </li>
                  <li class="list-group-item">
                    कुल रकम
                    <span class="float-right"><b>Rs. <?php echo e($loan->amount); ?></b></span>
                  </li>
                  <li class="list-group-item">
                    ब्याजदर
                    <span class="float-right"><b><?php echo e($loan->interest); ?> %</b></span>
                  </li>
                  <li class="list-group-item">                    
                    ब्याज सहित राशि
                    <span class="float-right"><b>Rs. <?php echo e($loan_amount); ?></b></span>
                  </li>
                </ul>
              </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sahakaari\sahakaari\resources\views/loan/show.blade.php ENDPATH**/ ?>