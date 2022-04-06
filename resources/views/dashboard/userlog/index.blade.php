@extends('dashboard\layouts\main')

@section('container')s
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Perangkat</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Card UID</th>
                                            <th>Check in date</th>
                                            <th>Time in</th>
                                            <th>Time out</th>
                                            <th>Complite</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$userlogs)
                                            
                                        @else
                                        @foreach ($userlogs as $userlog)
                                        <tr>
                                            <td>{{ $userlog->card_uid }}</td>
                                            <td>{{ $userlog->check_in_date }}</td>
                                            <td>{{ $userlog->time_in }}</td>
                                            <td>{{ $userlog->time_out }}</td>
                                            <td>{{ $userlog->card_out }}</td>
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
    <title>Device</title>
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