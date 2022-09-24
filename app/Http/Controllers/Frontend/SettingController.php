<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::latest()->get();
        return view('admin.pages.setting.index', [
            'form_type' => 'create',
            'settings' => $settings,
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
        $this->validate($request, [
            'email' =>  'required',
            'phone'  =>  'required',
            'fax' =>  'required',
            'address' =>  'required',
            'map' =>  'required',
            'copyright' =>  'required',
        ]);


        $opens = [];
        if (count($request->week) > 0) {
            for ($i = 0; $i < count($request->week); $i++) {
                array_push($opens, [
                    'week' => $request->week[$i],
                    'time' => $request->time[$i],
                ]);
            }
        }

        Setting::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'google' => $request->google,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'address' => $request->address,
            'map' => $request->map,
            'copyright' => $request->copyright,            
            'open' => json_encode($opens),
        ]);


        return back()->with('success', 'Setting change successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit= Setting::findOrFail($id);
        $settings= Setting::get();
        return view('admin.pages.setting.index',[
            'form_type' =>'edit',
            'settings' => $settings,
            'edit' => $edit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_date = Setting::findOrFail($id);


        $opens = [];
        if (count($request->week) > 0) {
            for ($i = 0; $i < count($request->week); $i++) {
                array_push($opens, [
                    'week' => $request->week[$i],
                    'time' => $request->time[$i],
                ]);
            }
        }
        
        $update_date->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'google' => $request->google,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'address' => $request->address,
            'map' => $request->map,
            'copyright' => $request->copyright,            
            'open' => json_encode($opens),
        ]);


        return back()->with('success', 'Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data= Setting::findOrFail($id);       
        $delete_data->delete();

        return back() ->with('success-main','Setting deleted successfully');
    }
}
