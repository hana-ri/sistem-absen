<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLog;

use Carbon\Carbon;

class UserLogController extends Controller
{
    public function dashboard()
    {
        $dt = Carbon::now();
        $dt->setTimezone('Asia/Jakarta');

        return view('/dashboard/index', [
            'userlogs' => UserLog::where('check_in_date', $dt->toDateString())->get(),
        ]);
    }

    public function index()
    {
        return view('/dashboard/userlog/index', [
            'userlogs' => UserLog::all(),
        ]);
    }
}
