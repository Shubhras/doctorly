<?php $__env->startSection('title'); ?> <?php echo e(__('Pending Appointment list')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <body data-topbar="dark" data-layout="horizontal">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
        <!-- start page title -->
        <?php $__env->startComponent('components.breadcrumb'); ?>
            <?php $__env->slot('title'); ?> Appointment List <?php $__env->endSlot(); ?>
            <?php $__env->slot('li_1'); ?> Dashboard <?php $__env->endSlot(); ?>
            <?php $__env->slot('li_2'); ?> Appointment <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('today-appointment')); ?>">
                                    <span class="d-block d-sm-none"><i class="fas fa-calendar-day"></i></span>
                                    <span class="d-none d-sm-block"><?php echo e(__("Today's Appointment List")); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo e(url('pending-appointment')); ?>">
                                    <span class="d-block d-sm-none"><i class="far fa-calendar"></i></span>
                                    <span class="d-none d-sm-block"><?php echo e(__('Pending Appointment List')); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('upcoming-appointment')); ?>">
                                    <span class="d-block d-sm-none"><i class="fas fa-calendar-week"></i></span>
                                    <span class="d-none d-sm-block"><?php echo e(__('Upcoming Appointment List')); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('complete-appointment')); ?>">
                                    <span class="d-block d-sm-none"><i class="fas fa-check-square"></i></span>
                                    <span class="d-none d-sm-block"><?php echo e(__('Complete Appointment List')); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('cancel-appointment')); ?>">
                                    <span class="d-block d-sm-none"><i class="fas fa-window-close"></i></span>
                                    <span class="d-none d-sm-block"><?php echo e(__('Cancel Appointment List')); ?></span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="PendingAppointmentList" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered dt-responsive nowrap "
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('#')); ?></th>
                                                <th><?php echo e(__('Staff')); ?></th>
                                                <th><?php echo e(__('Paciente')); ?></th>
                                                <th><?php echo e(__('Teléfono')); ?></th>
                                                <th><?php echo e(__('Tipo')); ?></th>
                                                <th><?php echo e(__('E-Mail')); ?></th>
                                                <th><?php echo e(__('Fecha')); ?></th>
                                                <th><?php echo e(__('Hora')); ?></th>
                                                <th><?php echo e(__('Estatus')); ?></th>
                                                <th><?php echo e(__('Acción')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $newData ?>
                                            <?php
                                            $count= 1;
                                            ?>
                                            <?php $__currentLoopData = $newData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item =>$key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($count); ?> </td>
                                                    <?php if(empty($key->fifthanswer)): ?>
                                                    <td></td>
                                                    <?php else: ?>
                                                    <td> <?php echo e($key->fifthanswer); ?> </td>
                                                    <?php endif; ?>
                                                    <?php if(empty($key->firstanswer)): ?>
                                                    <td></td>
                                                    <?php else: ?>
                                                    <td><?php echo e($key->firstanswer); ?></td>
                                                    <?php endif; ?>
                                                    <?php 
                                                    if(empty($key->sevenhanswer->phone)){
                                                        ?><td></td><?php
                                                    }else{
                                                        $area = json_decode(json_encode($key->sevenhanswer->area), true);
                                                        $phone_no = json_decode(json_encode($key->sevenhanswer->phone), true);
                                                        ?><td> (<?php echo e($area); ?>)<?php echo e($phone_no); ?> </td><?php
                                                    }?>
                                                    <?php if(empty($key->sixanswer)): ?>
                                                    <td></td>
                                                    <?php else: ?>
                                                    <td><?php echo e($key->sixanswer); ?></td>
                                                    <?php endif; ?>
                                                    <?php if(empty($key->secondanswer)): ?>
                                                    <td></td>
                                                    <?php else: ?>
                                                    <td> <?php echo e($key->secondanswer); ?> </td>
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
                                                    <?php if(empty($key->fourthanswer)): ?>
                                                    <td></td>
                                                    <?php else: ?>
                                                    <td> <?php echo e($key->fourthanswer); ?> </td>
                                                    <?php endif; ?>
                                                    <td> </td>
                                                </tr>
                                                <?php
                                                $count++;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <div class="d-flex justify-content-start">
                                        Showing <?php echo e($pending_appointment->firstItem()); ?> to
                                        <?php echo e($pending_appointment->lastItem()); ?> of <?php echo e($pending_appointment->total()); ?>

                                        entries
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <?php echo e($pending_appointment->links()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <!-- Plugins js -->
        <script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
        <!-- Init js-->
        <script src="<?php echo e(URL::asset('assets/js/pages/notification.init.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/js/pages/appointment.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/doctorly/resources/views/appointment/pending-appointment.blade.php ENDPATH**/ ?>