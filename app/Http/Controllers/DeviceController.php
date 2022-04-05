<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/device/index',[
            'devices' => Device::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid = Uuid::uuid4()->getHex();

        $rules = [
            'device_name' => 'required|max:32',
            'device_dept' => 'required|max:32',
        ];
        
        $validatedData = $request->validate($rules);
        $validatedData["device_uid"] = $uuid;

        // dd($request->all());

        $result = Device::create($validatedData);

        if (!$result) {
            return 'error';
        }

        return redirect('/dashboard/device');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('dashboard/device/edit',[
            'device' => $device,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $rules = [
            'device_name' => 'required|max:32',
            'device_dept' => 'required|max:32',
        ];
        
        $validatedData = $request->validate($rules);

        $result = Device::where('device_uid', $device->device_uid)->update($validatedData);

        if (!$result) {
            return 'error';
        }
        return redirect('/dashboard/device');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        Device::destroy($device->device_uid);
        return redirect('/dashboard/device');
    }
}
