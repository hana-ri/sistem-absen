@extends('dashboard\layouts\main')

@section('container')


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Histori Absensi</h4>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
                                    Filter
                                </button>
                                {{-- <a class="btn btn-primary btn-round ml-auto" href="/dashboard/user-info/create"><i class="fa fa-plus"> </i>Tambah Data</a> --}}
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
                                            <td>{{ $userlog->user_card_uid }}</td>
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
<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/userlog" method="GET" id="myForm">
                <div class="form-group">
                    <label for="idUniqueIdentity">Unik Identitas</label>
                    <input type="text" name="user_card_uid" class="form-control" id="idUniqueIdentity">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="idStartDate">Tanggal Awal</label>
                            <input type="date" name="start_date" class="form-control" id="idStartDate">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="idEndDate">Tanggal Akhir</label>
                            <input type="date" name="end_date" class="form-control" id="idEndDate">
                        </div>    
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="searchBtn">Cari</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
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

    $(document).ready(function(){
            $("#searchBtn").click(function(){        
                $("#myForm").submit(); 
            });
    });
</script>
@endpush