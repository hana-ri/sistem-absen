
<table id="add-row" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Peran</th>
                <th>UID Kartu</th>
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
            @foreach ($userlogs as $userlog)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ ($userlog->user_card_uid) ? ($userlog->userCard->userInfo) ? $userlog->userCard->userInfo->name : 'Tidak terkait' : 'Tidak terkait' }}</td>
                <td>{{ ($userlog->user_card_uid) ? ($userlog->userCard->userInfo) ? $userlog->userCard->userInfo->role : 'Tidak terkait' : 'Tidak terkait' }}</td>
                <td>{{ $userlog->user_card_uid }}</td>
                <td>{{ ($userlog->user_card_uid) ? ($userlog->userCard->userInfo) ? $userlog->UserCard->userInfo->unique_identity : 'Tidak terkait' : 'Tidak terkait'}}</td>
                <td>{{ $userlog->check_in_date }}</td>
                <td>{{ $userlog->time_in }}</td>
                <td>{{ $userlog->time_out }}</td>
                <td>{{ ($userlog->user_card_uid) ? ($userlog->userCard->userInfo) ? $userlog->userCard->device->device_dept : 'Tidak terkait' : 'Tidak terkait' }}</td>
                <td>{{ ($userlog->user_card_uid) ? ($userlog->userCard->userInfo) ? $userlog->userCard->device->device_name : 'Tidak terkait' : 'Tidak terkait' }}</td>
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
        </tbody>
    </table>