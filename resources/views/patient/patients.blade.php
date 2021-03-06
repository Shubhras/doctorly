@extends('layouts.master-layouts')
@section('title') {{ __('List of Patients') }} @endsection
@section('body')

<body data-topbar="dark" data-layout="horizontal">
    @endsection
    @section('content')
    <!-- start page title -->
    @component('components.breadcrumb')
    @slot('title') Pacientes @endslot
    @slot('li_1') Dashboard @endslot
    @slot('li_2') Paciente @endslot
    @endcomponent
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <a href=" {{ route('patient.create') }} ">
                            <button type="button" class="btn btn-primary waves-effect waves-light mb-4">
                                <i class="bx bx-plus font-size-16 align-middle mr-2"></i> {{ __('Nueva Pacientes') }}
                            </button>
                        </a> -->
                    <table class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Teléfono') }}</th>
                                <th>{{ __('E-Mail') }}</th>
                                <th>{{ __('Acción') }}</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
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
                                    $currentpage = $patients->currentPage();
                                @endphp
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $loop->index + 1 + $per_page * ($currentpage - 1) }}</td>
                                        <td><a href="{{ url('patient/' . $patient->id) }}">{{ $patient->first_name }}
                                                {{ $patient->last_name }}</a></td>
                                        <td>{{ $patient->mobile }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>
                                            <a href="{{ url('patient/' . $patient->id) }}">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm btn-rounded waves-effect waves-light mb-2 mb-md-0"
                                                    title="View Profile">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ url('patient/' . $patient->id . '/edit') }}">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm btn-rounded waves-effect waves-light mb-2 mb-md-0"
                                                    title="Update Profile">
                                                    <i class="mdi mdi-lead-pencil"></i>
                                                </button>
                                            </a>
                                            <a href=" javascript:void(0)">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm btn-rounded waves-effect waves-light mb-2 mb-md-0"
                                                    title="Deactivate Profile" data-id="{{ $patient->id }}"
                                                    id="delete-patient">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> -->

                        <tbody>
                            <?php $count= 1;?>
                            <?php $uniqueArry = array();
                                foreach ($newData as $item) {
                                    foreach($uniqueArry as $uniqueValue){
                                        //print_r($uniqueValue);die;
                                        if($item->secondanswer == $uniqueValue->secondanswer){
                                            continue 2;
                                        }
                                    }
                                    $uniqueArry[] = $item;
                                }
                            ?>
                            @foreach ($uniqueArry as $item => $key)
                            <?php 
                                //print_r($i);
                                //if(writeMsg($newData, $key->secondanswer) == true){
                                ?>
                            <tr>

                                <td>{{$count}} </td>
                                @if(empty($key->firstanswer))
                                <td></td>
                                @else
                                <td> {{ $key->firstanswer }} </td>
                                @endif
                                <?php 
                                        if(empty($key->sevenhanswer->phone)){
                                            ?><td></td><?php
                                        }else{
                                            $area = json_decode(json_encode($key->sevenhanswer->area), true);
                                            $phone_no = json_decode(json_encode($key->sevenhanswer->phone), true);
                                            ?><td> ({{$area}}){{$phone_no}} </td><?php
                                        }?>
                                @if(empty($key->secondanswer))
                                <td></td>
                                @else
                                <td> {{ $key->secondanswer }}</td>
                                <?php $email=($key->secondanswer);?>
                                @endif
                                <td>
                                    <a href="{{ url('patients-view/' . $email) }}">
                                    <!-- <a href="{{ url('patient/' . $patient->id) }}"> -->
                                        <button type="button"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light mb-2 mb-md-0"
                                            title="View Profile">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                    </a>
                                    <!-- <a href="{{ url('patient/' . $patient->id . '/edit') }}">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm btn-rounded waves-effect waves-light mb-2 mb-md-0"
                                                    title="Update Profile">
                                                    <i class="mdi mdi-lead-pencil"></i>
                                                </button>
                                            </a>
                                            <a href=" javascript:void(0)">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm btn-rounded waves-effect waves-light mb-2 mb-md-0"
                                                    title="Deactivate Profile" data-id="{{ $patient->id }}"
                                                    id="delete-patient">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </a> -->
                                </td>
                            </tr>
                            <?php
                                    $count++;
                               // }
                                    ?>
                            @endforeach
                            <?php //print_r($arr);?>
                        </tbody>
                    </table>
                    <!-- <div class="col-md-12 text-center mt-3">
                            <div class="d-flex justify-content-start">
                                Showing {{ $patients->firstItem() }} to {{ $patients->lastItem() }} of
                                {{ $patients->total() }} entries
                            </div>
                            <div class="d-flex justify-content-end">
                                {{ $patients->links() }}
                            </div>
                        </div> -->
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    @endsection
    @section('script')
    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/notification.init.js') }}"></script>
    <script>
    $(document).on('click', '#delete-patient', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure want to  delete patient?')) {
            $.ajax({
                type: "DELETE",
                url: 'patient/' + id,
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                beforeSend: function() {
                    $('#pageloader').show()
                },
                success: function(response) {
                    toastr.success(response.message, 'Success Alert', {
                        timeOut: 2000
                    });
                    location.reload();
                },
                error: function(response) {
                    toastr.error(response.responseJSON.message, {
                        timeOut: 20000
                    });
                },
                complete: function() {
                    $('#pageloader').hide();
                }
            });
        }
    });
    </script>
    @endsection