@extends('layouts.master-layouts')
@section('title') {{ __('Pending Appointment list') }} @endsection
@section('body')

    <body data-topbar="dark" data-layout="horizontal">
    @endsection
    @section('content')
        <!-- start page title -->
        @component('components.breadcrumb')
            @slot('title') Appointment List @endslot
            @slot('li_1') Dashboard @endslot
            @slot('li_2') Appointment @endslot
        @endcomponent
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('today-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-calendar-day"></i></span>
                                    <span class="d-none d-sm-block">{{ __("Today's Appointment List") }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('pending-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="far fa-calendar"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Pending Appointment List') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('upcoming-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-calendar-week"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Upcoming Appointment List') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('complete-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-check-square"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Complete Appointment List') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('cancel-appointment') }}">
                                    <span class="d-block d-sm-none"><i class="fas fa-window-close"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Cancel Appointment List') }}</span>
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
                                            <?php
                                            $i =0;
                                            $count= 1;
                                            ?>
                                            @foreach ($newData as $item =>$key)   
                                                <tr>
                                                    <td>{{$count}}
                                                    <td> {{ $key->fifthhanswer }} </td>
                                                    <td>{{ $key->firstanswer }}</td>
                                                    <td>{{ $key->sexhanswer }}</td>
                                                    <td> {{ $key->secondanswer }}
                                                    </td>
                                                    <?php
                                                    if (empty($key->thirdanswer->date)) {
                                                       ?> <td></td><?php
                                                    }
                                                    if(!empty($key->thirdanswer->date))
                                                    {
                                                    $date1 = json_decode(json_encode($key->thirdanswer->date), true);
                                                    $newDate = date("d-m-Y", strtotime($date1));

                                                    ?><td> {{$newDate}} </td><?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (empty($key->thirdanswer->date)) {
                                                        ?> <td></td><?php
                                                    } 
                                                    if(!empty($key->thirdanswer->date))
                                                    {
                                                    $date1 = json_decode(json_encode($key->thirdanswer->date), true);
                                                    $newTime = date("H:i", strtotime($date1));

                                                    ?><td> {{$newTime}} </td><?php
                                                    }
                                                    ?>
                                                    <td> {{ $key->fourthanswer }} </td>
                                                    <td> </td>
                                                </tr>
                                                <?php
                                                $i ++;
                                                $count++;
                                                ?>
                                                @if(15 == $i)
                                                @break
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <div class="d-flex justify-content-start">
                                        Showing {{ $pending_appointment->firstItem() }} to
                                        {{ $pending_appointment->lastItem() }} of {{ $pending_appointment->total() }}
                                        entries
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{ $pending_appointment->links() }}
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
