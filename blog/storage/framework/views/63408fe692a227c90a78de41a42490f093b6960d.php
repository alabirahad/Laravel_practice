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
                            <a href="<?php echo e(url('/users/create')); ?>" class="btn btn-primary">
                                <?php echo app('translator')->get('eng.CREATE_NEW_USER'); ?>
                                <i class="now-ui-icons users_single-02"></i>
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

                    <?php echo Form::open(['url' => 'users/filter','enctype' => 'multipart/form-data']); ?>

                    <?php echo csrf_field(); ?>
                    
                     
                    <div class="user-filter">
                        <div class="row">
                            <div class="col-md-4 filter-options">
                                <div class="form-group">
                                    <?php echo Form::select('course', $courseList, Request::get('course'), ['class' => 'form-control','placeholder' =>  __('eng.PICK_COURSE')]); ?>

                                    <span class="text-danger"><?php echo e($errors->first('course')); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 filter-options">
                                <div class="form-group">
                                    <?php echo Form::select('userGroup', $userGroupList, Request::get('userGroup'), ['class' => 'form-control','placeholder' =>  __('eng.PICK_USER_GROUP')]); ?>

                                    <span class="text-danger"><?php echo e($errors->first('userGroup')); ?></span>
                                </div>
                            </div>

                            <div class="col-md-4 filter-options">
                                <div class="form-group">
                                    <?php echo Form::text('name',Request::get('name'), ['class' => 'form-control','placeholder' => __('eng.FILTER_BY_NAME')]); ?>

                                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 filter-options">
                                <div class="form-group">
                                    <?php echo Form::text('phone',Request::get('phone'), ['class' => 'form-control','placeholder' => __('eng.FILTER_BY_PHONE')]); ?>

                                    <span class="text-danger"><?php echo e($errors->first('username')); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 filter-options">
                                <div class="text-left">
                                    <?php echo Form::submit(__('eng.FILTER'), ['class' => 'btn btn-primary'] ); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>




                    <div class="modal fade"  id="empModal" role="dialog">
                        <div class="modal-dialog" style="margin-left: 150px;" >
                            <div id="modalShow">


                            </div>
                        </div>
                    </div>


                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th><?php echo app('translator')->get('eng.SERIAL'); ?></th>
                                    <th><?php echo app('translator')->get('eng.USER_GROUP'); ?></th>
                                    <th><?php echo app('translator')->get('eng.NAME'); ?></th>
                                    <th><?php echo app('translator')->get('eng.EMAIL'); ?></th>
                                    <th><?php echo app('translator')->get('eng.PHONE'); ?></th>
                                    <th><?php echo app('translator')->get('eng.COURSE'); ?></th>
                                    <th><?php echo app('translator')->get('eng.DESIGNATION'); ?></th>
                                    <th><?php echo app('translator')->get('eng.PHOTO'); ?></th>
                                    <th><?php echo app('translator')->get('eng.ADDRESS'); ?></th>
                                    <th><?php echo app('translator')->get('eng.CITY'); ?></th>
                                    <th><?php echo app('translator')->get('eng.COUNTRY'); ?></th>
                                    <th><?php echo app('translator')->get('eng.POSTAL_CODE'); ?></th>
                                    <th><?php echo app('translator')->get('eng.STATUS'); ?></th>
                                    <th><?php echo app('translator')->get('eng.ACTIONS'); ?></th>
                                </tr></thead>
                            <tbody>
                                <?php $sl = 1; ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                                    <td><?php echo e($sl++); ?></td>
                                    <td> <?php echo e($user->user_group_name); ?></td>
                                    <td> <?php echo e($user->name); ?> </td>
                                    <td> <?php echo e($user->email); ?> </td>
                                    <td><?php echo e($user->number); ?></td>
                                    <td><?php echo e($user->course->name??0); ?></td>
                                    <td><?php echo e($user->designation); ?></td>
                                    <td><img src="<?php echo e(URL::to(asset('public/uploads/users/'.$user->photo))); ?>"></td>
                                    <td><?php echo e($user->address); ?></td>
                                    <td><?php echo e($user->city); ?></td>
                                    <td><?php echo e($user->country); ?></td>
                                    <td><?php echo e($user->postalcode); ?></td>
                                    <td>
                                        <?php if($user->status == '1'): ?>
                                        <?php echo app('translator')->get('eng.ACTIVE'); ?>
                                        <?php elseif($user->status == '2'): ?>
                                        <?php echo app('translator')->get('eng.INACTIVE'); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><button type="button" data-id="<?php echo e($user->id); ?>" class="btn btn-success userinfo" data-toggle="modal" href="#empModal" id="edit-item" data-item-id="1"><?php echo app('translator')->get('eng.DETAILS'); ?></button></td>
                                    <td><a href ="<?php echo e(URL::to('users/'.$user->id.'/edit')); ?>" class="btn btn-primary"><?php echo app('translator')->get('eng.EDIT'); ?></a></td>
                                    <td>
                                        <?php echo Form::open(['url' => 'users/'.$user->id]); ?>

                                        <?php echo Form::hidden('_method', 'DELETE'); ?>

                                        <button class="btn btn-danger remove"  type="submit"><?php echo app('translator')->get('eng.DELETE'); ?></button>
                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="text-center"><?php echo e($users->appends($data)->links()); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function () {
        $('.userinfo').click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var userid = $(this).data('id');
            $.ajax({
                url: "<?php echo e(URL::to('users/details')); ?>",
                type: 'post',
                data: {userid: userid},
                success: function (response) {
                    $('#modalShow').html(response.msg);
//                    $('#empModal').modal('show');
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\blog\resources\views/user/users.blade.php ENDPATH**/ ?>