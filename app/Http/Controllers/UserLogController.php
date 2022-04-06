<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLog;

class UserLogController extends Controller
{
    public function index()
    {
        return view('/dashboard/userlog/index', [
            'userlogs' => UserLog::all(),
        ]);
    }
}
