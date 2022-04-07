@extends('dashboard\layouts\main')

@section('container')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Histori Absen Hari Ini</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Peran</th>
                                            <th>Unik Identitas</th>
                                            <th>Tanggal</th>
                                            <th>Waktu Masuk</th>
                                            <th>Waktu Keluar</th>
                                            <th>Departemen</th>
                                            <th>Nama Perangkat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$userlogs)
                                            
                                        @else
                                        @foreach ($userlogs as $userlog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $userlog->userCard->userInfo->name }}</td>
                                            <td>{{ $userlog->userCard->userInfo->role }}</td>
                                            <td>{{ $userlog->userCard->userInfo->unique_identity }}</td>
                                            <td>{{ $userlog->check_in_date }}</td>
                                            <td>{{ $userlog->time_in }}</td>
                                            <td>{{ $userlog->time_out }}</td>
                                            <td>{{ $userlog->userCard->device->device_dept }}</td>
                                            <td>{{ $userlog->userCard->device->device_name }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-warning btn-lg" href="/dashboard/device/{{ $userlog->id }}/edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-link btn-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="{{ $userlog->id }}">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
@include('/dashboard/partials/deleteModal')
@endsection

@push('title')
    <title>Histori Absensi</title>
@endpush

@push('scripts')
<script src="{{ asset('vendor\template\js\plugin\datatables\datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#add-row').DataTable({
            "pageLength": 5,
        });
    });
</script>
@endpush