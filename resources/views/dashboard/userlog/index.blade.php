@extends('dashboard\layouts\main')

@section('container')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Histori Absensi</h4>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#filterModal">
                                    Filter
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @include('/dashboard/userlog/table')
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exportModal">
                                Export
                            </button>
                        </div>
                    </div>
                </div>
            </div>
@include('/dashboard/partials/deleteModal')
<!-- Modal Filter -->
  <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filterModalLabel">Filter Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/userlog" method="GET" id="filterForm">
                <div class="form-group">
                    <label for="idUniqueIdentity">UID Kartu</label>
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

  <!-- Modal Export -->
  <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exportModalLabel">Export Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p class="text-center">Rentang Data</p>
            <form action="/dashboard/userlog/export" method="GET" id="exportForm">
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
            <button type="button" class="btn btn-primary" id="exportBtn">Download</button>
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
            "pageLength": 10,
        });
    });

    $(document).ready(function(){
            $("#searchBtn").click(function(){        
                $("#filterForm").submit(); 
            });
    });

    $(document).ready(function(){
            $("#exportBtn").click(function(){        
                $("#exportForm").submit(); 
            });
    });
</script>
@endpush