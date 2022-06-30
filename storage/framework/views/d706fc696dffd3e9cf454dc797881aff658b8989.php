<?php $__env->startSection('title'); ?> <?php echo e(__('Patient Profile')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

<body data-topbar="dark" data-layout="horizontal">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">
                    <?php echo e(__('Patient Profile')); ?>

                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('patient')); ?>"><?php echo e(__('Patients')); ?></a></li>
                        <li class="breadcrumb-item active">
                            <?php echo e(__('Patient Profile')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#AppointmentList" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block"><?php echo e(__('Appointment List')); ?></span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#PrescriptionList" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block"><?php echo e(__('Prescription List')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Invoices" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block"><?php echo e(__('Invoices')); ?></span>
                            </a>
                        </li> -->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane" id="AppointmentList" role="tabpanel">
                            <table class="table table-bordered dt-responsive nowrap "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Sr. No')); ?></th>
                                        <th><?php echo e(__('Patient Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count= 1;?>
                                    <?php foreach ($newData as $item =>$key){
                                        if($key->secondanswer!=$patient_email ){
                                            continue;
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo e($count); ?> </td>
                                        <?php if(empty($key->firstanswer)): ?>
                                        <td></td>
                                        <?php else: ?>
                                        <td> <?php echo e($key->firstanswer); ?> </td>
                                        <?php endif; ?>
                                        <?php
                                            if (empty($key->thirdanswer->date)) {
                                                ?> <td></td><?php
                                            }else{
                                                $date1 = json_decode(json_encode($key->thirdanswer->date), true);
                                                $newDate = date("d-m-Y", strtotime($date1));
                                                ?><td> <?php echo e($newDate); ?> </td><?php
                                            }
                                        ?>
                                        <?php
                                            if (empty($key->thirdanswer->date)) {
                                                ?> <td></td><?php
                                            }else{
                                                $date1 = json_decode(json_encode($key->thirdanswer->date), true);
                                                $newTime = date("H:i", strtotime($date1));
                                                ?><td> <?php echo e($newTime); ?> </td><?php
                                            }
                                            ?>
                                        <td></td>
                                    </tr><?php
                                    $count++;}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <!-- flot plugins -->
    <script src="<?php echo e(URL::asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <!-- Plugins js -->
    <script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <!-- Init js-->
    <script src="<?php echo e(URL::asset('assets/js/pages/profile.init.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/doctorly/resources/views/patient/patient-profile.blade.php ENDPATH**/ ?>