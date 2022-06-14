@extends('layouts.master-layouts')
@section('title') {{ __('Complete Appointment list') }} @endsection
@section('body')

    <body data-topbar="dark" data-layout="horizontal">
    @endsection
    @section('content')
        <!-- start page title -->
        @component('components.breadcrumb')
            @slot('title') Control de Citas @endslot
            @slot('li_1') Dashboard @endslot
            @slot('li_2') Control de Citas @endslot
        @endcomponent
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('today-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-calendar-day"></i></span>
                                    <span class="d-none d-sm-block">{{ __("Citas de hoy") }}</span>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('pending-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="far fa-calendar"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Pendientes') }}</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('upcoming-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-calendar-week"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Próxima') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('complete-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-check-square"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Completadas') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('cancel-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-window-close"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Canceladas') }}</span>
                                </a>
                            </li> -->
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="PendingAppointmentList" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered dt-responsive nowrap "
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>{{ __('#') }}</th>
                                                <th>{{ __('Staff') }}</th>
                                                <th>{{ __('Paciente') }}</th>
                                                <th>{{ __('Teléfono') }}</th>
                                                <th>{{ __('E-Mail') }}</th>
                                                <th>{{ __('Fecha') }}</th>
                                                <th>{{ __('Hora') }}</th>
                                                <th>{{ __('Estatus') }}</th>
                                                <th>{{ __('Acción') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (session()->has('page_limit'))
                                                @php
                                                    $per_page = session()->get('page_limit');
                                                @endphp
                                            @else
                                                @php
                                                    $per_page = Config::get('app.page_limit');
                                                @endphp
                                            @endif
                                            @php
                                                $currentpage = $Complete_appointment->currentPage();
                                            @endphp
                                            @foreach ($Complete_appointment as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 + $per_page * ($currentpage - 1) }}</td>
                                                    <td> {{ $item->doctor->first_name . ' ' . $item->doctor->last_name }}
                                                    </td>
                                                    <td> {{ $item->patient->first_name . ' ' . $item->patient->last_name }}
                                                    </td>
                                                    <td> {{ $item->patient->mobile }} </td>
                                                    <td>{{ $item->patient->email }}</td>
                                                    <td>{{ $item->appointment_date }}</td>
                                                    <td>{{ $item->timeSlot->from . ' to ' . $item->timeSlot->to }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <div class="d-flex justify-content-start">
                                        Showing {{ $Complete_appointment->firstItem() }} to
                                        {{ $Complete_appointment->lastItem() }} of
                                        {{ $Complete_appointment->total() }}
                                        entries
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{ $Complete_appointment->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <!-- Plugins js -->
        <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <!-- Init js-->
        <script src="{{ URL::asset('assets/js/pages/notification.init.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/appointment.js') }}"></script>
    @endsection
