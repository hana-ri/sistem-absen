@extends('dashboard\layouts\main')

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
                <form id="userInfoForm" action="/dashboard/user-info" method="POST">
                    @csrf
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
                                <input type="text" name="card_uid" class="form-control" value="{{ $userInfo->card_uid }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="idAddress" name="gender">Gender</label>
                                <input type="text" name="card_uid" class="form-control" value="{{ $userInfo->gender }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idAddress">Status</label>
                                <input type="text" name="card_uid" class="form-control" value="{{ ($userInfo->card_uid) ? 'Aktif' : 'Pasif' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idAddress">Role</label>
                                <input type="text" name="card_uid" class="form-control" value="{{ $userInfo->Role }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="idAddress">Address</label>
                                <textarea class="form-control" id="idAddress" rows="2" name="address" readonly>{{ $userInfo->address }}</textarea>
                            </div>
                        </div>
                    </div>
                  </form>
            </div>
            <div class="card-footer">
                <div class="d-flex align-items-center">
                    <a class="btn btn-secondary btn-round" href="/dashboard/user-info">Kembali</a>
                    <a class="btn btn-warning btn-round ml-auto" href="/dashboard/user-info/{{ $userInfo->id }}/edit">Update</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('title')
    <title>Informasi User</title>
@endpush