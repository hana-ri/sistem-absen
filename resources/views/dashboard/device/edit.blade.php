@extends('/dashboard/layouts/main')

@section('container')
<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Ubah Perangkat</h4>
                </div>
            </div>
            <div class="card-body">
                <form id="deleteForm" action="/dashboard/device/{{ $device->device_uid }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="idDevice_uid">UID Perangkat</label>
                        <input type="text" class="form-control" id="idDevice_uid" placeholder="{{ $device->device_uid }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="idDeviceName">Nama Perangkat</label>
                      <input type="text" class="form-control" id="idDeviceName" placeholder="Masukan nama perangkat..." name="device_name" value="{{ old('device_name', $device->device_name) }}">
                    </div>
                    <div class="form-group">
                        <label for="idDeviceDept">Nama Departement</label>
                        <input type="text" class="form-control" id="idDeviceDept" placeholder="Masukan nama departemen..." name="device_dept" value="{{ old('device_dept', $device->device_dept) }}">
                     </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex align-items-center">
                    <a class="btn btn-secondary btn-round" href="/dashboard/device">Kembali</a>
                    <button type="button" id="deleteButton" class="btn btn-primary btn-round ml-auto">Ubah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
  </div>
@endsection
@push('scripts')
<script>   

        $(document).ready(function(){
            $("#deleteButton").click(function(){        
                $("#deleteForm").submit(); 
            });
        });
</script>
@endpush