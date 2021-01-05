<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Login</div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
              <?php echo e(csrf_field()); ?>

              <?php if(session()->has('login_error')): ?>
                <div class="alert alert-success">
                  <?php echo e(session()->get('login_error')); ?>

                </div>
              <?php endif; ?>
              <div class="form-group<?php echo e($errors->has('identity') ? ' has-error' : ''); ?>">
                <label for="identity" class="col-md-4 control-label">Email or Username</label>

                <div class="col-md-6">
                    <input id="identity" type="identity" class="form-control" name="identity"
                         value="<?php echo e(old('identity')); ?>" autofocus>

                  <?php if($errors->has('identity')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('identity')); ?></strong>
                                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password">

                  <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    
                  <button type="submit" class="btn btn-primary">Login</button>
                  
                  <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">Forgot Your Password?</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\blog\resources\views/auth/login.blade.php ENDPATH**/ ?>