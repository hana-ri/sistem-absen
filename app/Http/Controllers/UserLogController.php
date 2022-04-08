<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLog;

use Carbon\Carbon;
use App\Exports\UserLogView;
use Maatwebsite\Excel\Facades\Excel;

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
        if (request('start_date') && request('end_date')) {
            if(request('user_card_uid')) {
                return view('/dashboard/userlog/index', [
                    'userlogs' => UserLog::where('user_card_uid', '=' ,request('user_card_uid'))->whereBetween('check_in_date', [request('start_date'), request('end_date') ])->get(),
                ]);       
            }
            return view('/dashboard/userlog/index', [
                'userlogs' => UserLog::whereBetween('check_in_date', [request('start_date'), request('end_date') ])->get(),
            ]);            
        }

        if (request('user_card_uid')) {
            return view('/dashboard/userlog/index', [
                'userlogs' => UserLog::where('user_card_uid', '=', request('user_card_uid'))->get(),
            ]);            
        }
        return view('/dashboard/userlog/index', [
            'userlogs' => UserLog::all(),
        ]);
    }

    public function export()
    {
        return Excel::download(new UserLogView, 'UserLog.xlsx');
    }
}