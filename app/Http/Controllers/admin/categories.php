<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;
class categories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->name;

        $categories->save();

        $id= $categories->id;

        if($image = $request->file('image')){
                $destinationPath = 'uploads/categories';
                $extension = $image->getClientOriginalExtension();
                $fileName = $id.'_image'.'.'.$extension;

                $image->move($destinationPath, $fileName);

                Category::where('id',$id)->update(['image' => $fileName]);
            }

        return redirect('admin/categories');
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
        $categories= Category::find($id);
        return view('admin.categories.edit',compact('categories'));
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
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        $id= $categories->id;

        if($image = $request->file('image')){
                $destinationPath = 'uploads/categories';
                $extension = $image->getClientOriginalExtension();
                $fileName = $id.'_image'.'.'.$extension;

                $image->move($destinationPath, $fileName);

                Category::where('id',$id)->update(['image' => $fileName]);
            }

        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $destinationPath = 'uploads/categories/'.$categories->image;
        if(File::exists($destinationPath)){
          File::delete($destinationPath);
              }
         $categories = Category::destroy($id);
        return back(); //
    }
}
