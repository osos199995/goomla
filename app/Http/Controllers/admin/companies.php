<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use File;

class companies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::all();
        return view('admin.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies= Company::all();
        return view('admin.companies.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companies = new Company();
        $companies->name = $request->name;
        
        $companies->save();

        $id= $companies->id;

        if($image = $request->file('image')){
                $destinationPath = 'uploads/companies'; 
                $extension = $image->getClientOriginalExtension(); 
                $fileName = $id.'_image'.'.'.$extension; 
                
                $image->move($destinationPath, $fileName); 
                
                Company::where('id',$id)->update(['image' => $fileName]); 
            }

        return redirect('admin/companies');
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
        $companies= Company::find($id);
        return view('admin.companies.edit',compact('companies'));
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
        $companies = Company::find($id);
        $companies->name = $request->name;
        $companies->save();
        $id= $companies->id;

        if($image = $request->file('image')){
                $destinationPath = 'uploads/companies'; 
                $extension = $image->getClientOriginalExtension(); 
                $fileName = $id.'_image'.'.'.$extension; 
                
                $image->move($destinationPath, $fileName); 
                
                Company::where('id',$id)->update(['image' => $fileName]); 
            }

        return redirect('admin/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Company::findOrFail($id);
        $destinationPath = 'uploads/companies/'.$companies->image;
        if(File::exists($destinationPath)){
          File::delete($destinationPath);
              }
         $companies = Company::destroy($id);
        return back(); //
    }
}
