<?php 
$currentControllerName = Request::segment(1);
$currentFullRouteName = Route::getFacadeRoot()->current()->uri();
?>

<div class="sidebar" data-color="orange">
    
    
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            CT

        </a>
        <a href="" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="<?php echo e(($currentControllerName == 'dashboard') ? 'active' : ''); ?>">
                <a href="<?php echo e(URL::to('/dashboard')); ?>">
                    <i class="now-ui-icons design_app"></i>
                    <p><?php echo app('translator')->get('eng.DASHBOARD'); ?></p>
                </a>
            </li>
            <li class="<?php echo e(($currentControllerName == 'userGroup') ? 'active' : ''); ?> ">
                <a href="<?php echo e(URL::to('/userGroup')); ?>">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <p><?php echo app('translator')->get('eng.USER_GROUP'); ?></p>
                </a>
            </li>
            <li class="<?php echo e(($currentControllerName == 'users') ? 'active' : ''); ?> ">
                <a href="<?php echo e(URL::to('/users')); ?>">
                    <i class="now-ui-icons users_single-02"></i>
                    <p><?php echo app('translator')->get('eng.USERS'); ?></p>
                </a>
            </li>
            <li class="<?php echo e(($currentControllerName == 'academic') ? 'active' : ''); ?> ">
                <a href="<?php echo e(URL::to('/academic')); ?>">
                    <i class="fas fa-book-reader"></i>
                    <p><?php echo app('translator')->get('eng.SET_ACADEMIC_BACKGROUND'); ?></p>
                </a>
            </li>
            <li class=" <?php echo e(($currentControllerName == 'categories') ? 'active' : ''); ?>">
                <a href="<?php echo e(URL::to('/categories')); ?>">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    <p><?php echo app('translator')->get('eng.CATEGORIES'); ?></p>
                </a>
            </li>
            <li class=" <?php echo e(($currentControllerName == 'products') ? 'active' : ''); ?>">
                <a href="<?php echo e(URL::to('/products')); ?>">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    <p><?php echo app('translator')->get('eng.PRODUCTS'); ?></p>
                </a>
            </li>
            <li class="<?php echo e(($currentControllerName == 'usertoproducts') ? 'active' : ''); ?> ">
                <a href="<?php echo e(URL::to('/usertoproducts')); ?>">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <p><?php echo app('translator')->get('eng.USER_TO_PRODUCT'); ?></p>
                </a>
            </li>
            <li class="<?php echo e(($currentControllerName == 'productreport') ? 'active' : ''); ?> ">
                <a href="<?php echo e(URL::to('/productreport')); ?>">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                    <p><?php echo app('translator')->get('eng.PRODUCT_REPORT'); ?></p>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH E:\Xampp\htdocs\blog\resources\views/layouts/partial/sidebar.blade.php ENDPATH**/ ?>