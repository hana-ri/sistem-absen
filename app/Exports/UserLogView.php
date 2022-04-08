<?php

namespace App\Exports;

use App\Models\UserLog;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserLogView implements FromView
{
    public function view(): View
    {
        if (request('start_date') && request('end_date')) {
            if(request('user_card_uid')) {
                return view('/dashboard/userlog/table', [
                    'userlogs' => UserLog::where('user_card_uid', '=' ,request('user_card_uid'))->whereBetween('check_in_date', [request('start_date'), request('end_date') ])->get(),
                ]);       
            }
            return view('/dashboard/userlog/table', [
                'userlogs' => UserLog::whereBetween('check_in_date', [request('start_date'), request('end_date') ])->get(),
            ]);            
        }

        if (request('user_card_uid')) {
            return view('/dashboard/userlog/table', [
                'userlogs' => UserLog::where('user_card_uid', '=' ,request('user_card_uid'))->get(),
            ]);            
        }
        return view('/dashboard/userlog/table', [
            'userlogs' => UserLog::all()
        ]);
    }
}