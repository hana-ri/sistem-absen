@extends('dashboard/layouts/main')

@section('container')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Informasi Kartu</h4>
                            </div>
                        </div>
                        <div class="card-body">
                                {{-- <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="idDeviceName">Nama Perangkat</label>
                                            <input type="text" value="{{ $device->device_name }}" class="form-control" id="idDeviceName" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="idDeviceDept">Departemen Perangkat</label>
                                            <input type="text" value="{{ $device->device_dept }}" class="form-control" id="idDeviceDept" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="idDeviceMode">Status Perangkat</label>
                                            <input type="text" value="{{ ($device->device_mode) ? 'Aktif' : 'Pasif' }}" class="form-control" id="idDeviceMode" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="idDeviceUID">UID Perangkat</label>
                                            <input type="text" value="{{ $device->uid }}" class="form-control" id="idDeviceUID" readonly>
                                        </div>
                                    </div>
                                </div> --}}                         
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Kartu UID</th>
                                            <th>Nama</th>
                                            <th>Status Kartu</th>
                                            <th>Departemen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $userCard->uid }}</td>
                                            <td>{{ ($userCard->userInfo) ? $userCard->userInfo->name : 'Belum ditautkan' }}</td>
                                            <td>{{ ($userCard->card_status) ? 'Aktif' : 'Pasif' }}</td>
                                            <td>{{ ($userCard->device) ? $userCard->device->device_dept : '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <a class="btn btn-primary btn-round" href="/dashboard/user-card">Kembali</a>
                                {{-- <a class="btn btn-warning btn-round ml-auto" href="/dashboard/user-info/{{ $userInfo->id }}/edit">Perbarui</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
@include('/dashboard/partials/deleteModal')
@endsection

@push('title')
    <title>Informasi Kartu</title>
@endpush

@push('scripts')
<script src="{{ asset('vendor/template/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#add-row').DataTable({
            "pageLength": 5,
        });
    });
</script>
@endpush