@extends('dashboard/layouts/main')


@section('container')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Tambah Informasi Pengguna</h4>
                </div>
            </div>
            <div class="card-body">
                <form id="userInfoForm" action="/dashboard/user-info" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="idName">Name</label>
                                <input type="text" name="name" class="form-control" id="idName" aria-describedby="emailHelp" placeholder="Name...">
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">No. Unik</label>
                                <input type="text" name="unique_identity" class="form-control" id="exampleInputPassword1" placeholder="No. Unik...">
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                <input type="date" name="DOB" class="form-control" id="exampleInputPassword1" placeholder="No. Unik...">
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="idAddress">UID Kartu</label>
                                <select class="custom-select selectpicker" name="user_card_uid" data-show-subtext="true" data-live-search="true">                                    
                                    @if (!$userCards->count())
                                        <option value="null" selected>Tidak ada kartu UID yang terdaftar</option>
                                    @else
                                        @foreach ($userCards as $userCard)
                                            <option value="{{ $userCard->uid }}">{{ $userCard->uid }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="idAddress" name="gender">Gender</label>
                                <select class="custom-select" name="gender">
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idAddress">Status</label>
                                <select class="custom-select" name="status">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idAddress">Role</label>
                                <select class="custom-select" name="role">
                                    <option value="Pelajar">Pelajar</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Staff">Staff</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="idAddress">Address</label>
                                <textarea class="form-control" id="idAddress" rows="2" name="address"></textarea>
                            </div>
                        </div>
                    </div>
                  </form>
            </div>
            <div class="card-footer">
                <div class="d-flex align-items-center">
                    <a class="btn btn-primary btn-round" href="/dashboard/user-info">Kembali</a>
                    <button type="button" class="btn btn-success btn-round ml-auto" id="submitButton">simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
$(document).ready(function(){
    $("#submitButton").click(function(){        
        $("#userInfoForm").submit(); 
    });
});
</script>
@endpush