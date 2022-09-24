<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy("name", "asc")->get();
        return view('admin.pages.menu.index', [
            'form_type' => 'create',
            'menus' => $menus,
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
            'name' => 'required',
        ]);


        $menus = [];
        
        $image = [];

        
        if(isset($request->menu_title)){
            
            if ($request->hasFile('images')) {
                $gallery = $request->file('images');
                foreach ($gallery as $gal) {
                    $gall_name = md5(time() . rand()) . '.' . $gal->clientExtension();
                    $inter = Image::make($gal->getRealPath());
                    $inter->filesize();
                    $inter->save(storage_path('app/public/menus/') . $gall_name);
                    array_push($image, $gall_name);
                }
            }
            for ($i = 0; $i < count($request->menu_title); $i++) {
                array_push($menus, [
                    'menu_title' => $request->menu_title[$i],
                    'menu_price' => $request->menu_price[$i],
                    'menu_photo' => $image[$i],
                ]);
                
            }
           
        }
        Menu::create([
            'name' => $request->name,
            'items' => json_encode($menus),
        ]);

        return back()->with('success', 'Menu added successfully');
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
        $menus = Menu::orderBy("name", "asc")->get();
        $item = Menu::findOrFail($id);
        return view('admin.pages.menu.index', [
            'form_type'  => 'edit',
            'edit'  => $item,
            'menus' => $menus,
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
        $update_date = Menu::findOrFail($id);


        $menus = [];
        
        $image = [];
        
        if ($request->hasFile('images')) {
            $gallery = $request->file('images');
            foreach ($gallery as $key=>$gal) {
                $gall_name = md5(time() . rand()) . '.' . $gallery[$key]->clientExtension();
                $inter = Image::make($gallery[$key]->getRealPath());
                $inter->filesize();
                $inter->save(storage_path('app/public/menus/') . $gall_name);
                $image[$key] = $gall_name;
            }
        }
        
        if(isset($request->menu_title)){
            
            
            for ($i = 0; $i < count($request->menu_title); $i++) {

                array_push($menus, [
                    'menu_title' => $request->menu_title[$i],
                    'menu_price' => $request->menu_price[$i],
                    'menu_photo' => !empty($image[$i]) ? $image[$i] : 
                    (isset(json_decode($update_date->items)[$i]->menu_photo) ? json_decode($update_date->items)[$i]->menu_photo : null),
                ]);
                
            }
            
        }

        $update_date->update([
            'name' => $request->name,
            'items' => json_encode($menus),
        ]);

        return back()->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_id = Menu::findOrFail($id);
        $delete_id->delete();

        return back()->with('success-main', 'Menu Deleted successfully');
    }
    public function updateStatus($id)
    {
        $data = Menu::findOrFail($id);


        if ($data->status) {
            $data->update([
                'status' => false,
            ]);
        } else {
            $data->update([
                'status' => true,
            ]);
        }
        return back()->with('success-main', 'Status updated successfully');
    }
    
}
