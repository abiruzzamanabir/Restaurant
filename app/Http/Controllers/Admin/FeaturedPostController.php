<?php

namespace App\Http\Controllers\Admin;

use App\Models\FeaturedPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class FeaturedPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured= FeaturedPost::orderBy("title", "asc")->get();
        return view('admin.pages.featuredPost.index',[
            'form_type' =>'create',
            'featured' => $featured,
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
        $this->validate($request,[
            'title' =>'required|unique:featured_posts',
            'desc' =>'required',
            'photo' =>'required',
        ]);

        if ($request->hasFile('photo')) {
            $img = $request->file('photo');
            $file_name = md5(time() . rand()) . '.' . $img->clientExtension();
            $inter = Image::make($img->getRealPath());
            $inter->filesize();
            $inter->save(storage_path('app/public/featured/') . $file_name);
        }
        FeaturedPost::create([
            'title' => $request->title,
            'desc' =>$request->desc,
            'photo' => $file_name,
        ]);


        return back() ->with('success','Featured Post added successfully');
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
        $edit= FeaturedPost::findOrFail($id);
        $featured= FeaturedPost::orderBy("title", "asc")->get();
        return view('admin.pages.featuredPost.index',[
            'form_type' =>'edit',
            'edit' => $edit,
            'featured' => $featured,
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
        $update_date = FeaturedPost::findOrFail($id);

        if ($request->hasFile('new_photo')) {
            $img = $request->file('new_photo');
            $file_name = md5(time() . rand()) . '.' . $img->clientExtension();
            $inter = Image::make($img->getRealPath());
            $inter->filesize();
            $inter->save(storage_path('app/public/featured/') . $file_name);
        }else{
            $file_name=$update_date->photo;
        }

        
        $update_date->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'photo' => $file_name,
        ]);

        return back()->with('success', 'Featured Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data= FeaturedPost::findOrFail($id);
        unlink('storage/featured/' . $delete_data->photo);
        
        $delete_data->delete();

        return back() ->with('success-main','Featured Post deleted successfully');
    }
    public function updateStatus($id)
    {
        $data = FeaturedPost::findOrFail($id);


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
