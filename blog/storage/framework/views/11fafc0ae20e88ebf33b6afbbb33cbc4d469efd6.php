<table class="table table-bordered table-striped" border='0' width='100%'>
    <thead>
        <tr>
            <th></th>
            <th><?php echo app('translator')->get('eng.NAME'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(Form::checkbox('check[]', $product['id'],array_key_exists($product->id,$data) ? true : false)); ?></td>
            <td> <?php echo e($product['name']); ?> </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>


</table> <?php /**PATH E:\Xampp\htdocs\blog\resources\views/userToProduct/productDetails.blade.php ENDPATH**/ ?>