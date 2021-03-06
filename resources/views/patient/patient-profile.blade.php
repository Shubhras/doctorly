@extends('layouts.master-layouts')
@section('title') {{ __('Patient Profile') }} @endsection
@section('body')

<body data-topbar="dark" data-layout="horizontal">
    @endsection
    @section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">
                    {{ __('Patient Profile') }}
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('patient') }}">{{ __('Patients') }}</a></li>
                        <li class="breadcrumb-item active">
                            {{ __('Patient Profile') }}
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
                                <span class="d-none d-sm-block">{{ __('Appointment List') }}</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#PrescriptionList" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">{{ __('Prescription List') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Invoices" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">{{ __('Invoices') }}</span>
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
                                        <th>{{ __('Sr. No') }}</th>
                                        <th>{{ __('Patient Name') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Time') }}</th>
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
                                        <td>{{$count}} </td>
                                        @if(empty($key->firstanswer))
                                        <td></td>
                                        @else
                                        <td> {{ $key->firstanswer }} </td>
                                        @endif
                                        <?php
                                            if (empty($key->thirdanswer->date)) {
                                                ?> <td></td><?php
                                            }else{
                                                $date1 = json_decode(json_encode($key->thirdanswer->date), true);
                                                $newDate = date("d-m-Y", strtotime($date1));
                                                ?><td> {{$newDate}} </td><?php
                                            }
                                        ?>
                                        <?php
                                            if (empty($key->thirdanswer->date)) {
                                                ?> <td></td><?php
                                            }else{
                                                $date1 = json_decode(json_encode($key->thirdanswer->date), true);
                                                $newTime = date("H:i", strtotime($date1));
                                                ?><td> {{$newTime}} </td><?php
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
    @endsection
    @section('script')
    <!-- flot plugins -->
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
    @endsection