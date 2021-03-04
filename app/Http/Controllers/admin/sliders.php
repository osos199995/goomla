<?php

namespace App\Http\Controllers\admin;

use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Slider;
use App\Category;
class sliders extends Controller
{
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::all();
        $sliders=Slider::all();
        $categories=Category::all();
        return view('admin.sliders.create',compact('sliders','categories','packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required',
//            'category_id' => 'required',
            'package_id' => 'required',
            ]);
        $sliders = new Slider();
        $sliders->package_id = $request->package_id;
        $sliders->save();
        $id= $sliders->id;
        if($image = $request->file('image')){
            $destinationPath = 'uploads/sliders';
            $extension = $image->getClientOriginalExtension();
            $fileName = $id.'_image'.'.'.$extension;

            $image->move($destinationPath, $fileName);

            Slider::where('id',$id)->update(['image' => $fileName]);
        }
        return redirect('admin/sliders');
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
        $sliders= Slider::find($id);
        $packages=Package::all();
        $categories=Category::all();
        return view('admin.sliders.edit',compact('sliders','categories','packages'));
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
        $data = $request->validate([
//            'image' => 'required',
//            'category_id' => 'required',
            ]);
        $sliders = Slider::find($id);
        $sliders->package_id = $request->package_id;

        $sliders->save();
        $id= $sliders->id;

        if(!empty($image = $request->file('image'))){
            $destinationPath = 'uploads/sliders';
            $extension = $image->getClientOriginalExtension();
            $fileName = $id.'_image'.'.'.$extension;

            $image->move($destinationPath, $fileName);

            Slider::where('id',$id)->update(['image' => $fileName]);
        }
        return redirect('admin/sliders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slider::findOrFail($id);
        $destinationPath = 'uploads/sliders/'.$sliders->image;
        if(File::exists($destinationPath)){
          File::delete($destinationPath);
              }
         $sliders = Slider::destroy($id);
        return back(); //
    }
}
