<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subcategory;
use App\Company;
use File;
class subcategories extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $companies=Company::all();
        return view('admin.subcategories.index',compact('companies','subcategories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories=Subcategory::all();
        $categories=Category::all();
        $companies=Company::all();
        return view('admin.subcategories.create',compact('categories','companies','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategories = new Subcategory();
        $subcategories->name = $request->name;
        $subcategories->category_id = $request->category_id;
        // $subcategories->company_id = $request->company_id;

        $subcategories->save();
        $subcategories->companys()->attach($request->company);

        $id= $subcategories->id;

        if($image = $request->file('image')){
                $destinationPath = 'uploads/subcategories'; 
                $extension = $image->getClientOriginalExtension(); 
                $fileName = $id.'_image'.'.'.$extension; 
                
                $image->move($destinationPath, $fileName); 
                
                Subcategory::where('id',$id)->update(['image' => $fileName]); 
            }

        return redirect('admin/subcategories');
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
        $subcategories = Subcategory::find($id);
        $categories = Category::all();
        $companies = Company::all();

        return view('admin.subcategories.edit',compact('subcategories','companies','categories'));
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
        $subcategories = Subcategory::find($id);
        $subcategories->name = $request->name;
        // $subcategories->company_id = $request->company_id;
        $subcategories->category_id = $request->category_id;
        $subcategories->save();
        if($request->companys)
        {
         $subcategories->companys()->sync($request->companys);
        }

        $id= $subcategories->id;

        if($image = $request->file('image')){
                $destinationPath = 'uploads/subcategories'; 
                $extension = $image->getClientOriginalExtension(); 
                $fileName = $id.'_image'.'.'.$extension; 
                
                $image->move($destinationPath, $fileName); 
                
                Subcategory::where('id',$id)->update(['image' => $fileName]); 
            }

        return redirect('admin/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategories = Subcategory::findOrFail($id);
        $destinationPath = 'uploads/subcategories/'.$subcategories->image;
        if(File::exists($destinationPath)){
          File::delete($destinationPath);
              }
         $subcategories = Subcategory::destroy($id);
        return back(); //ck();
    }
}
