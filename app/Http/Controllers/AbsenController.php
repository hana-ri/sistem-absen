<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Device;
use App\Models\UserCard;
use App\Models\UserLog;

class AbsenController extends Controller
{
	public function absen()
	{
		$dt = Carbon::now();
		$dt->setTimezone('Asia/Jakarta');

		// Cek apakah kedua request terpenuhi/tidak
		if (request('card_uid') && request('device_token')) {
			// Cek apakah device_uid tersebut terdaftar/tidak
			if (!Device::where('uid', request('device_token'))->exists()) {
				return "[Server] : UID Perangkat tidak terdaftar";
			} else {
				$dataDevice = Device::firstWhere('uid', request('device_token'));
				// Cek apakah device_mode berada pada attandance (1)/enrollment (0)
				if ($dataDevice->device_mode) {
					if (!UserCard::where('uid', request('card_uid'))->exists()) {
						return '[Server] : Kartu tidak dikenal';
					} else {
						$dataUserCard = UserCard::firstWhere('uid', request('card_uid'));
						// Cek apakah card_status sudah aktif atau belum
						if ($dataUserCard->card_status) {
							// Cek apakah data card_uid sama dengan yang ada pada DB atau 0
							if ($dataUserCard->uid == request('card_uid') || $dataUserCard->uid == 0) {
								// Cek apakah sudah melakukan absen sudah absen hari ini
								if (UserLog::firstWhere(['user_card_uid' => $dataUserCard->uid, 'check_in_date' => $dt->toDateString(), 'card_out' => 1])) {
									return '[Server] : Anda sudah melakukan absen hari ini!';
								} else {
									// Cek apakah sudah melakukan time in/sudah
									if (!UserLog::firstWhere(['user_card_uid' => $dataUserCard->uid, 'check_in_date' => $dt->toDateString(), 'card_out' => 0])) {
										// Melakukan Time in
											$result = UserLog::create([
												'user_card_uid' => $dataUserCard->uid,
												'check_in_date' => $dt->toDateString(),
												'time_in' => $dt->toTimeString(),
												'time_out' => "00:00:00",
											]);
											if (!$result) {
												abort(500, '[Server] : Gagal melakukan time in');
											}
										return '[Server] :  Absen masuk';
									} else {
										// Melakukan Time out
										$result = UserLog::where([
											'user_card_uid' => $dataUserCard->uid,
											'card_out' => 0,
											'check_in_date' => $dt->toDateString(),
										])->update([
											'time_out' => $dt->toTimeString(),
											'card_out' => true
										]);
										if (!$result) {
											abort(500, '[Server] : Gagal melakukan time out');
										}
										return '[Server] :  Absen keluar';
									}
								}
							} else {
								return '[Server] : Not Allowed!';
							}
						} else {
							return '[Server] : Kartu belum aktif';
						}
					}
				} else {
					// Cek apakah user_card_uid sudah pernah ditambahkan/tidak
					if (UserCard::where('uid', request('card_uid'))->exists()) {
						return '[Server] : Kartu sudah pernah ditambahkan';
					} else {
						$newCard = [
                            'uid' => request('card_uid'),
                            'device_uid' => request('device_token'),
                        ];

						$result = UserCard::create($newCard);
						if (!$result) {
							abort(500, '[Server] : failed add new card');
						}
						return '[Server] : Kartu baru ditambahkan';
					}
				}
			}
		} else {
			return;
			// return redirect('/');
		}
	}
}
