<!DOCTYPE html>
<html lang="en">

    <?php echo $__env->make('layouts.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <body class="">
        <div class="wrapper ">
            <?php echo $__env->make('layouts.partial.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="main-panel" id="main-panel">
             
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo $__env->make('layouts.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <?php echo $__env->make('layouts.partial.footerjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>

</html>
<?php /**PATH E:\Xampp\htdocs\blog\resources\views/layouts/default.blade.php ENDPATH**/ ?>