<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="bx bx-home-circle mr-2"></i>{{ __('Dashboard') }}
                        </a>
                    </li>
                    @if ($role == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="bx bx-user-circle mr-2"></i>{{ __('Doctors') }} <div class="arrow-down"> -->
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Staff') }} <div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <!-- <a href="{{ url('doctor') }}" class="dropdown-item">{{ __('List of Doctors') }}</a> -->
                                <a href="{{ url('doctor') }}" class="dropdown-item">{{ __('Lista de Staff') }}</a>
                                <a href="{{ route('doctor.create') }}"
                                    class="dropdown-item">{{ __('Agregar nuevo Staff') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Pacientes') }} <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('patient') }}"
                                    class="dropdown-item">{{ __('Lista de Patients') }}</a>
                                <!-- <a href="{{ route('patient.create') }}"
                                    class="dropdown-item">{{ __('Agregar nuevo Patient1') }}</a> -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Recepcionistas ') }} <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('receptionist') }}"
                                    class="dropdown-item">{{ __('Lista de Recepcionistas') }}</a>
                                <a href="{{ route('receptionist.create') }}"
                                    class="dropdown-item">{{ __('Agregar nuevo Recepcionista') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('pending-appointment') }}">
                                <i class='bx bx-list-plus mr-2'></i>{{ __('Control de Citas') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('transaction') }}">
                                <i class='bx bx-list-check mr-2'></i>{{ __('Transacciones') }}
                            </a>
                        </li>
                    @elseif ($role == 'doctor')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('appointment.create') }}">
                                <i class="bx bx-calendar-plus mr-2"></i>{{ __('Calendario') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Pacientes') }} <div
                                    class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('patient') }}"
                                    class="dropdown-item">{{ __('Lista de Pacientes') }}</a>
                                <!-- <a href="{{ route('patient.create') }}"
                                    class="dropdown-item">{{ __('Agregar Nuevo Paciente') }}</a> -->
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ url('receptionist') }}">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Recepcionistas') }}
                            </a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="bx bx-notepad mr-2"></i>{{ __('Prescription') }} -->
                                <i class="bx bx-notepad mr-2"></i>{{ __('Historial Clinico') }}
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('prescription') }}" class="dropdown-item">{{ __('Lista de historial médicos') }}</a>
                                <!-- <a href="{{ url('prescription') }}" class="dropdown-item">{{ __('Bandeja de entrada de historial médico')}}</a> -->
                                <!-- <a href="{{ route('prescription.create') }}" class="dropdown-item">{{ __('Create Prescription') }}</a> -->
                                <a href="{{ route('prescription.create') }}" class="dropdown-item">{{ __('Crear historial medico') }}</a>
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-receipt mr-2"></i>{{ __('Invoices') }} <div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('invoice') }}"
                                    class="dropdown-item">{{ __('List of Invoices') }}</a>
                                <a href="{{ route('invoice.create') }}"
                                    class="dropdown-item">{{ __('Create New Invoice') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('pending-appointment') }}">
                                <i class='bx bx-list-plus mr-2'></i>{{ __('Control de Citas') }}
                            </a>
                        </li> -->
                    @elseif ($role == 'receptionist')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('appointment.create') }}">
                                <i class="bx bx-calendar-plus mr-2"></i>{{ __('Calendario') }}
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('doctor') }}">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Staff') }}
                            </a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Pacientes') }} <div
                                    class="arrow-down"></div>
                            </a> -->
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('patient') }}"
                                    class="dropdown-item">{{ __('Lista de Pacientes') }}</a>
                                <!-- <a href="{{ route('patient.create') }}"
                                    class="dropdown-item">{{ __('Agregar Nuevo Paciente') }}</a> -->
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('transaction') }}">
                                <i class='bx bx-list-check mr-2'></i>{{ __('Transacciones') }}
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('prescription') }}">
                                <i class="bx bx-notepad mr-2"></i>{{ __('Prescription') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-receipt mr-2"></i>{{ __('Invoices') }}<div class="arrow-down">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                <a href="{{ url('invoice') }}"
                                    class="dropdown-item">{{ __('List of Invoices') }}</a>
                                <a href="{{ route('invoice.create') }}"
                                    class="dropdown-item">{{ __('Create New Invoice') }}</a>
                            </div>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('pending-appointment') }}">
                                <i class='bx bx-list-plus mr-2'></i>{{ __('Control de Citas') }}
                            </a>
                        </li>
                    @elseif ($role == 'patient')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('appointment.create') }}">
                                <i class="bx bx-calendar-plus mr-2"></i>{{ __('Appointment') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('doctor') }}">
                                <i class="bx bx-user-circle mr-2"></i>{{ __('Doctors') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('prescription-list') }}">
                                <i class="bx bx-notepad mr-2"></i>{{ __('Prescription') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('invoice-list') }}">
                                <i class="bx bx-receipt mr-2"></i>{{ __('Invoices') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('patient-appointment') }}">
                                <i class='bx bx-list-plus mr-2'></i>{{ __('Appointment List') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
