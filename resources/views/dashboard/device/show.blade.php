@extends('dashboard/layouts/main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Daftar Katru Pada Perangkat di Departemen {{ $device->device_dept }}
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="idDeviceName">Nama Perangkat</label>
                                <input type="text" value="{{ $device->device_name }}" class="form-control"
                                    id="idDeviceName" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="idDeviceDept">Departemen Perangkat</label>
                                <input type="text" value="{{ $device->device_dept }}" class="form-control"
                                    id="idDeviceDept" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="idDeviceMode">Status Perangkat</label>
                                <input type="text" value="{{ $device->device_mode ? 'Aktif' : 'Pasif' }}"
                                    class="form-control" id="idDeviceMode" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="idDeviceUID">UID Perangkat</label>
                                <input type="text" value="{{ $device->uid }}" class="form-control" id="idDeviceUID"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kartu UID</th>
                                    <th>Status Kartu</th>
                                    <th>Nama</th>
                                    <th>Status Pengguna</th>
                                    {{-- <th style="width: 10%">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userCards as $userCard)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $userCard->uid }}</td>
                                        <td>{{ $userCard->card_status ? 'Aktif' : 'Pasif' }}</td>
                                        <td>{{ $userCard->userInfo ? $userCard->userInfo->name : '' }}</td>
                                        <td>{{ $userCard->userInfo ? ($userCard->userInfo->status ? 'Aktif' : 'Pasif') : '' }}
                                        </td>
                                        {{-- <td>{{ ($userCard->userInfo->status ? 'Aktif' : 'Pasif') }}</td> --}}
                                        {{-- <td>
                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-secondary btn-lg" href="/dashboard/user-card/{{ $userCard->uid }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-primary btn-round" href="/dashboard/user-card">Kembali</a>
                        <a class="btn btn-warning btn-round ml-auto"
                            href="/dashboard/device/{{ $device->uid }}/edit">Perbarui</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('/dashboard/partials/deleteModal')
@endsection

@push('title')
    <title>Device</title>
@endpush

@push('scripts')
    <script src="{{ asset('/vendor/template/js/plugin/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#add-row').DataTable({
                "pageLength": 5,
            });
        });
    </script>
@endpush
