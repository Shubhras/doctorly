<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/')); ?>">
                            <i class="bx bx-home-circle mr-2"></i><?php echo e(__('Dashboard')); ?>

                        </a>
                    </li>
                    <?php if($role == 'admin'): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Doctors')); ?> <div class="arrow-down"> -->
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Staff')); ?> <div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <!-- <a href="<?php echo e(url('doctor')); ?>" class="dropdown-item"><?php echo e(__('List of Doctors')); ?></a> -->
                                <a href="<?php echo e(url('doctor')); ?>" class="dropdown-item"><?php echo e(__('Lista de Staff')); ?></a>
                                <a href="<?php echo e(route('doctor.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar nuevo Staff')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Pacientes')); ?> <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('patient')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de Patients')); ?></a>
                                <!-- <a href="<?php echo e(route('patient.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar nuevo Patient1')); ?></a> -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Recepcionistas ')); ?> <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('receptionist')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de Recepcionistas')); ?></a>
                                <a href="<?php echo e(route('receptionist.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar nuevo Recepcionista')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('pending-appointment')); ?>">
                                <i class='bx bx-list-plus mr-2'></i><?php echo e(__('Control de Citas')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('transaction')); ?>">
                                <i class='bx bx-list-check mr-2'></i><?php echo e(__('Transacciones')); ?>

                            </a>
                        </li>
                    <?php elseif($role == 'doctor'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('appointment.create')); ?>">
                                <i class="bx bx-calendar-plus mr-2"></i><?php echo e(__('Calendario')); ?>

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Pacientes')); ?> <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('patient')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de Pacientes')); ?></a>
                                <!-- <a href="<?php echo e(route('patient.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar Nuevo Paciente')); ?></a> -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?php echo e(url('receptionist')); ?>">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Recepcionistas')); ?>

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="bx bx-notepad mr-2"></i><?php echo e(__('Prescription')); ?> -->
                                <i class="bx bx-notepad mr-2"></i><?php echo e(__('Historial Clinico')); ?>

                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('prescription')); ?>" class="dropdown-item"><?php echo e(__('Lista de historial médicos')); ?></a>
                                <!-- <a href="<?php echo e(url('prescription')); ?>" class="dropdown-item"><?php echo e(__('Bandeja de entrada de historial médico')); ?></a> -->
                                <!-- <a href="<?php echo e(route('prescription.create')); ?>" class="dropdown-item"><?php echo e(__('Create Prescription')); ?></a> -->
                                <a href="<?php echo e(route('prescription.create')); ?>" class="dropdown-item"><?php echo e(__('Crear historial medico')); ?></a>
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-receipt mr-2"></i><?php echo e(__('Invoices')); ?> <div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('invoice')); ?>"
                                    class="dropdown-item"><?php echo e(__('List of Invoices')); ?></a>
                                <a href="<?php echo e(route('invoice.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Create New Invoice')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('pending-appointment')); ?>">
                                <i class='bx bx-list-plus mr-2'></i><?php echo e(__('Control de Citas')); ?>

                            </a>
                        </li> -->
                    <?php elseif($role == 'receptionist'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('appointment.create')); ?>">
                                <i class="bx bx-calendar-plus mr-2"></i><?php echo e(__('Calendario')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('doctor')); ?>">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Staff')); ?>

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Pacientes')); ?> <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('patient')); ?>"
                                    class="dropdown-item"><?php echo e(__('Lista de Pacientes')); ?></a>
                                <a href="<?php echo e(route('patient.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Agregar Nuevo Paciente')); ?></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('transaction')); ?>">
                                <i class='bx bx-list-check mr-2'></i><?php echo e(__('Transacciones')); ?>

                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('prescription')); ?>">
                                <i class="bx bx-notepad mr-2"></i><?php echo e(__('Prescription')); ?>

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-receipt mr-2"></i><?php echo e(__('Invoices')); ?><div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="<?php echo e(url('invoice')); ?>"
                                    class="dropdown-item"><?php echo e(__('List of Invoices')); ?></a>
                                <a href="<?php echo e(route('invoice.create')); ?>"
                                    class="dropdown-item"><?php echo e(__('Create New Invoice')); ?></a>
                            </div>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('pending-appointment')); ?>">
                                <i class='bx bx-list-plus mr-2'></i><?php echo e(__('Control de Citas')); ?>

                            </a>
                        </li>
                    <?php elseif($role == 'patient'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('appointment.create')); ?>">
                                <i class="bx bx-calendar-plus mr-2"></i><?php echo e(__('Appointment')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('doctor')); ?>">
                                <i class="bx bx-user-circle mr-2"></i><?php echo e(__('Doctors')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('prescription-list')); ?>">
                                <i class="bx bx-notepad mr-2"></i><?php echo e(__('Prescription')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('invoice-list')); ?>">
                                <i class="bx bx-receipt mr-2"></i><?php echo e(__('Invoices')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('patient-appointment')); ?>">
                                <i class='bx bx-list-plus mr-2'></i><?php echo e(__('Appointment List')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php /**PATH /var/www/html/doctorly/resources/views/layouts/hor-menu.blade.php ENDPATH**/ ?>