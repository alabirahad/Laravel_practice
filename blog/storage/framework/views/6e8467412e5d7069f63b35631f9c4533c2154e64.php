<?php $__env->startSection('content'); ?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><?php echo app('translator')->get('eng.PRODUCT_REPORT'); ?></h4>
                        </div>
                        <div class="col-md-1 text-right" >
                            <a class="btn btn-primary" href="<?php echo e(URL::to('/productreport?file=pdf')); ?>"><?php echo app('translator')->get('eng.PDF'); ?></a>
                        </div>
                        <div class="col-md-1 text-right" >
                            <a href="<?php echo e(URL::to('/productreport?file=xls')); ?>" class="btn btn-primary"><?php echo app('translator')->get('eng.XLS'); ?></a>
                        </div>
                        <div class="col-md-1 text-right" >
                            <a href="<?php echo e(URL::to('/productreport?file=print')); ?>" target="_blank" class="btn btn-primary"><?php echo app('translator')->get('eng.PRINT'); ?></a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table products-table">

                            <thead class=" text-primary">
                                <tr>
                                    <th><?php echo app('translator')->get('eng.SERIAL'); ?></th>
                                    <th><?php echo app('translator')->get('eng.NAME'); ?></th>
                                    <th><?php echo app('translator')->get('eng.PRODUCTS'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sl = 1; ?>
                                <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td><?php echo e($sl++); ?></td>
                                    <td> <?php echo e($user->name); ?> </td>
                                    <td> 
                                        <table class="products-list">
                                            <?php
                                            foreach ($prosuctList as $product) {
                                                if ($user->id == $product->user_id) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $product->product_name;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </table>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\blog\resources\views/productReport/productReport.blade.php ENDPATH**/ ?>