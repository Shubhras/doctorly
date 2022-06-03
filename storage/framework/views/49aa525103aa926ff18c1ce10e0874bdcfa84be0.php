<?php $__env->startSection('title'); ?> <?php echo e(__("Forgot Password")); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<header id="page-topbar" class="login-header-bg-color">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo e(url('/')); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(URL::asset('assets/images/logo-dark.png')); ?>" alt="" height="22">
                    </span>
                </a>
                <a href="<?php echo e(url('/')); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(URL::asset('assets/images/logo-light.png')); ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(URL::asset('assets/images/logo-light1.png')); ?>" alt="" height="35">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?php echo e(__("Search ...")); ?>"
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- App Search-->
        </div>
        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <span class="logo-lg" >
                    <img src="<?php echo e(URL::asset('assets/images/btc_logo1-new.png')); ?>" alt="" height="30">
                </span>&nbsp;
                <span class="logo-lg" >
                    <img src="<?php echo e(URL::asset('assets/images/btc_logo2-new.png')); ?>" alt="" height="30">
                </span>
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen icon-color"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<body>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login-top">
                            <div class="row">
                                <!-- <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> <?php echo e(__("Forgot Password")); ?></h5>
                                        <p>Reset your password with <?php echo e(config('app.name')); ?>.</p>
                                    </div>
                                </div> -->
                                <div class="col-6 align-self-end">
                                    <img src="<?php echo e(URL::asset('assets/images/btc_logo1-new.png')); ?>" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="col-6 align-self-end">
                                    <img src="<?php echo e(URL::asset('assets/images/btc_logo2-new.png')); ?>" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="<?php echo e(url('/')); ?>">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-login-logo">
                                        <img src="<?php echo e(URL::asset('assets/images/login-logo.png')); ?>" alt="" class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="<?php echo e(url('forgot-password')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php if($msg = Session::get('error')): ?>
                                        <div class="alert alert-danger">
                                            <span> <?php echo e($msg); ?> </span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($msg = Session::get('success')): ?>
                                        <div class="alert alert-success">
                                            <span> <?php echo e($msg); ?> </span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label for="username"><?php echo e(__("Email")); ?></label>
                                        <input name="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php if(old('email')): ?> value="<?php echo e(old('email')); ?>" <?php endif; ?> id="username" placeholder="<?php echo e(__("Enter email")); ?>" autocomplete="email" autofocus>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button class="btn w-md waves-effect waves-light bg-btn"
                                                type="submit"><?php echo e(__("Reset")); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p><?php echo e(__("Remember It ?")); ?> <a href="<?php echo e(url('login')); ?>" class="font-weight-medium text-primary"> <?php echo e(__("Sign In here")); ?></a> </p>
                        <!-- <p>© <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. Crafted with <i class="mdi mdi-heart text-danger"></i> <?php echo e(__("by Themesbrand")); ?></p> -->
                        <p>© <?php echo e(date('Y')); ?> <?php echo e("BTC Latam Group"); ?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/doctorly/resources/views/auth/passwords/forgotPassword.blade.php ENDPATH**/ ?>