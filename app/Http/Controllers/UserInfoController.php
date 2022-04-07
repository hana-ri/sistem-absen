<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use App\Models\UserCard;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/dashboard/userinfo/index', [
            'userinfos' => UserInfo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/dashboard/userinfo/create', [
            'userCards' => UserCard::where('card_status', '!=', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'unique_identity' => 'required',
            'DOB' => 'required',
            'user_card_uid' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'role' => 'required',
            'address' => 'required',
        ]);

        
        // dd($result->user_card_uid);
        $result = UserInfo::create($validatedData);
        if ($result->user_card_uid != null) {
            UserCard::where('uid', $result->user_card_uid)->update(['card_status' => true]);
        }

        if (!$result) {
            return 'Create user information failed';
        }

        return redirect('/dashboard/user-info');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show(UserInfo $userInfo)
    {
        return view('/dashboard/userinfo/show', [
            'userInfo' => $userInfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(UserInfo $userInfo)
    {
        // dd(UserCard::all());
        return view('/dashboard/userinfo/edit', [
            'userInfo' => $userInfo,
            'userCards' => UserCard::where('card_status', '!=', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInfo $userInfo)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'unique_identity' => 'required',
            'DOB' => 'required',
            'user_card_uid' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'role' => 'required',
            'address' => 'required',
        ]);

        // dd($validatedData);
        $result = UserInfo::where('id', $userInfo->id)->update($validatedData);
        
        if (!$result) {
            return 'update user information failed';
        }

        return redirect('/dashboard/user-info');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userInfo)
    {
        $userInfo->delete();

        return redirect('/dashboard/user-info');
    }
}
