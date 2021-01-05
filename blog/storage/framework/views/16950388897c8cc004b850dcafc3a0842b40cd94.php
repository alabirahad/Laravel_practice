
<?php $sl=1 ?>
<?php $__currentLoopData = $academicHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr >
    <td class="text-center initial-serial"><?php echo e($sl+=1); ?></td>
    <td class="text-center"> <?php echo Form::text('level[]',$history['level'], ['class' => 'field','placeholder' => __('eng.EX_LEVEL')]); ?> </td> 
    <td class="text-center"> <?php echo Form::text('result',$history['result'], ['class' => 'field','placeholder' => __('eng.EX_RESULT')]); ?> </td> 
    <td class="text-center"> <?php echo Form::text('year',$history['year'], ['class' => 'field','placeholder' => __('eng.EX_YEAR')]); ?> </td> 
    <td class="text-center"> <?php echo Form::text('group',$history['subject'], ['class' => 'field','placeholder' => __('eng.EX_GROUP')]); ?> </td> 
    <td class="text-center"> 
        <button class="btn btn-danger remove"type="button">×</button>
    </td> 
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH E:\Xampp\htdocs\blog\resources\views/academic/history.blade.php ENDPATH**/ ?>