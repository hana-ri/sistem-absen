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
			if (!Device::where('device_uid', request('device_token'))->exists()) {
				return "Device tidak terdaftar";
			} else {
				$dataDevice = Device::firstWhere('device_uid', request('device_token'));
				// Cek apakah device_mode berada pada attandance (1)/enrollment (0)
				if ($dataDevice->device_mode) {
					if (!UserCard::where('card_uid', request('card_uid'))->exists()) {
						return 'kartu UID tidak dikenal';
					} else {
						$dataUserCard = UserCard::firstWhere('card_uid', request('card_uid'));
						// Cek apakah card_status sudah aktif atau belum
						if ($dataUserCard->card_status) {
							// Cek apakah data card_uid sama dengan yang ada pada DB atau 0
							if ($dataUserCard->card_uid == request('card_uid') || $dataUserCard->card_uid == 0) {
								// Cek apakah sudah melakukan time in/sudah
								if (!UserLog::firstWhere(['card_uid' => $dataUserCard->card_uid, 'check_in_date' => $dt->toDateString(), 'card_out' => 0])) {
									// Melakukan Time in
                                        $result = UserLog::create([
                                            'card_uid' => $dataUserCard->card_uid,
                                            'check_in_date' => $dt->toDateString(),
                                            'time_in' => $dt->toTimeString(),
                                            'time_out' => "00:00:00",
                                        ]);
                                        if (!$result) {
                                            abort(500, 'Gagal melakukan time in');
                                        }
									return 'Time in';
								} else {
									// Melakukan Time out
									$result = UserLog::where([
										'card_uid' => $dataUserCard->card_uid,
										'card_out' => 0,
										'check_in_date' => $dt->toDateString(),
									])->update([
										'time_out' => $dt->toTimeString(),
										'card_out' => true
									]);
									if (!$result) {
										abort(500, 'Gagal melakukan time out');
									}
									return 'Time out';
								}
							} else {
								return 'Not Allowed!';
							}
						} else {
							return 'Kartu belum aktif';
						}
					}
				} else {
					// Cek apakah card_uid sudah pernah ditambahkan/tidak
					if (UserCard::where('card_uid', request('card_uid'))->exists()) {
						return 'Kartu sudah pernah ditambahkan';
					} else {
						$newCard = [
                            'card_uid' => request('card_uid'),
                            'device_uid' => request('device_token'),
                        ];
                        // dd($newCard);
						// $newCard += ['card_select' => 1];

						$result = UserCard::create($newCard);
						if (!$result) {
							abort(500, 'failed add new card');
						}
						return 'kartu baru ditambahkan';
					}
				}
			}
		} else {
			return redirect('/');
		}
	}
}