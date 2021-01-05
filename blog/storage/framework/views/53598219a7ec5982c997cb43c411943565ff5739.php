


<div class="modal-content" style="width: 1100px">
    <div class="modal-header">
        <div class="text-right">
            <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
        </div>
    </div>
    <div class="modal-body">
        <table class="table table-bordered table-striped" border='0' width='100%'>
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('eng.NAME'); ?></th>
                    <th><?php echo app('translator')->get('eng.EMAIL'); ?></th>
                    <th><?php echo app('translator')->get('eng.PHONE'); ?></th>
                    <th><?php echo app('translator')->get('eng.STATUS'); ?></th>
                    <th><?php echo app('translator')->get('eng.DESIGNATION'); ?></th>
                    <th><?php echo app('translator')->get('eng.PHOTO'); ?></th>
                    <th><?php echo app('translator')->get('eng.ADDRESS'); ?></th>
                    <th><?php echo app('translator')->get('eng.CITY'); ?></th>
                    <th><?php echo app('translator')->get('eng.COUNTRY'); ?></th>
                    <th><?php echo app('translator')->get('eng.POSTAL_CODE'); ?></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td> <?php echo e($users['name']); ?> </td>
                    <td> <?php echo e($users['email']); ?> </td>
                    <td><?php echo e($users['number']); ?></td>
                    <td>
                        <?php if($users['status'] == '1'): ?>
                        <?php echo app('translator')->get('eng.ACTIVE'); ?>
                        <?php elseif($users['status'] == '2'): ?>
                        <?php echo app('translator')->get('eng.INACTIVE'); ?>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($users['designation']); ?></td>
                    <td><img src="<?php echo e(URL::to(asset('public/uploads/users/'.$users['photo']))); ?>"></td>
                    <td><?php echo e($users['address']); ?></td>
                    <td><?php echo e($users['city']); ?></td>
                    <td><?php echo e($users['country']); ?></td>
                    <td><?php echo e($users['postalcode']); ?></td>
                </tr>
            </tbody>
        </table> 

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

</div><?php /**PATH E:\Xampp\htdocs\blog\resources\views/user/userDetails.blade.php ENDPATH**/ ?>