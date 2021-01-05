<?php $__env->startSection('content'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><?php echo app('translator')->get('eng.USER_TABLE'); ?></a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                        </div>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                        <p>
                            <span class="d-lg-none d-md-block"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <ul class="navbar-nav ml-auto">
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre">
                               <i class="now-ui-icons users_single-02"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title"><?php echo app('translator')->get('eng.USER_TABLE'); ?></h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<?php echo e(url('/userGroup/create')); ?>" class="btn btn-primary">
                                <?php echo app('translator')->get('eng.CREATE_NEW_USER_GROUP'); ?>
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </a>
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
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th><?php echo app('translator')->get('eng.SERIAL'); ?></th>
                                    <th><?php echo app('translator')->get('eng.NAME'); ?></th>
                                    <th><?php echo app('translator')->get('eng.ACTIONS'); ?></th>
                                </tr></thead>
                            <tbody>
                                <?php $sl=1;?>
                                <?php $__currentLoopData = $userGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td><?php echo e($sl++); ?></td>
                                    <td> <?php echo e($user->name); ?> </td>
                                    <td><a href = 'userGroup/<?php echo e($user->id); ?>/edit' class="btn btn-primary"><?php echo app('translator')->get('eng.EDIT'); ?></a>
                                    <!--<a href = 'userGroup/destroy/<?php echo e($user->id); ?>' class="btn btn-primary"><?php echo app('translator')->get('eng.DELETE'); ?></a></td>-->
                                    <td>
                                        <?php echo Form::open(['url' => 'userGroup/'.$user->id]); ?>

                                        <?php echo Form::hidden('_method', 'DELETE'); ?>

                                        <button class="btn btn-danger remove"  type="submit"><?php echo app('translator')->get('eng.DELETE'); ?></button>
                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="text-center"><?php echo e($userGroup->links()); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\blog\resources\views/user/userGroup.blade.php ENDPATH**/ ?>