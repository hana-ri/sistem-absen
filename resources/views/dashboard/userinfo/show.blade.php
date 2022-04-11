@extends('/dashboard/layouts/main')

@section('container')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Ubah Perangkat</h4>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="idName">Name</label>
                                <input type="text" name="name" class="form-control" id="idName" aria-describedby="emailHelp" placeholder="Name..." value="{{ $userInfo->name }}" readonly>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">No. Unik</label>
                                <input type="text" name="unique_identity" class="form-control" id="exampleInputPassword1" placeholder="No. Unik..." value="{{ $userInfo->unique_identity }}" readonly>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                <input type="text" name="DOB" class="form-control" id="exampleInputPassword1" placeholder="No. Unik..." value="{{ $userInfo->DOB }}" readonly>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="idAddress">UID Kartu</label>
                                <input type="text" class="form-control" value="{{ $userInfo->user_card_uid }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="idAddress" name="gender">Gender</label>
                                <input type="text" class="form-control" value="{{ $userInfo->gender }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idAddress">Status</label>
                                <input type="text" class="form-control" value="{{ ($userInfo->uid) ? 'Aktif' : 'Pasif' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idAddress">Peran</label>
                                <input type="text" class="form-control" value="{{ $userInfo->role }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="idAddress">Alamat</label>
                                <textarea class="form-control" id="idAddress" rows="2" name="address" readonly>{{ $userInfo->address }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Nama Perangkat</th>
                                        <th>Departemen Perangkat</th>
                                        <th>UID Kartu</th>
                                        <th>Status Kartu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ ($userInfo->userCard) ? $userInfo->userCard->device->device_name : 'Belum ditautkan'}}</td>
                                        <td>{{ ($userInfo->userCard) ? $userInfo->userCard->device->device_dept : 'Belum ditautkan' }}</td>
                                        <td>{{ ($userInfo->userCard) ? $userInfo->userCard->uid : 'Belum ditautkan' }}</td>
                                        <td>{{ ($userInfo->userCard) ? ($userInfo->userCard->card_status) ? 'Aktif' : 'Pasif' : 'Belum ditautkan'}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            @can('isAdmin')
            <div class="card-footer">
                <div class="d-flex align-items-center">
                    <a class="btn btn-primary btn-round" href="/dashboard/user-info">Kembali</a>
                    <a class="btn btn-warning btn-round ml-auto" href="/dashboard/user-info/{{ $userInfo->id }}/edit">Perbarui</a>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection

@push('title')
    <title>Informasi User</title>
@endpush