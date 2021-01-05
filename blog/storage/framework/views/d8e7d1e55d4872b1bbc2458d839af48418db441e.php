<?php $__env->startSection('content'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><?php echo app('translator')->get('eng.PRODUCT_CREATE'); ?></a>
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
                            <h4 class="card-title"><?php echo app('translator')->get('eng.PRODUCT_UPLOAD'); ?></h4>
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

                    <?php echo Form::open(['url' => 'products','enctype' => 'multipart/form-data']); ?>

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo Form::label('name', __('eng.NAME')); ?>

                                <?php echo Form::text('name',NULL, ['class' => 'form-control','placeholder' => __('eng.ENTER_PRODUCT_NAME')]); ?>

                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo Form::label('category', __('eng.CATEGORY')); ?>

                                <?php echo Form::select('category', $categoryList, null, ['class' => 'form-control','placeholder' => '--Pick a Category--']); ?>

                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo Form::label('status', __('eng.STATUS')); ?>

                                <?php echo Form::select('status', $statusList , null,['id' => 'status']); ?>

                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="text-right">
                                <?php echo Form::submit(__('eng.UPLOAD'), ['class' => 'btn btn-primary'] ); ?>

                            </div>
                        </div>
                        <div class="col-md-6 text-left">
                            <a href="<?php echo e(url('products')); ?>" class="btn btn-primary">
                                <?php echo app('translator')->get('eng.CANCEL'); ?>
                            </a>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\blog\resources\views/product/create.blade.php ENDPATH**/ ?>