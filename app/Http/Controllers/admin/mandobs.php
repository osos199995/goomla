<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mandob;

class mandobs extends Controller
{

    public function index()
    {
        $mandobs=Mandob::all();
        return view('admin.mandobs.index',compact('mandobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mandobs= Mandob::all();
        return view('admin.mandobs.create',compact('mandobs'));
    }

    /**
     * Mandob a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mandobs = new Mandob();
        $mandobs->name = $request->name;
        $mandobs->phone = $request->phone;
        $mandobs->section = $request->section;
        $mandobs->address = $request->address;
        $mandobs->save();
        return redirect('admin/mandobs');
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
        $mandobs= Mandob::find($id);
        return view('admin.mandobs.edit',compact('mandobs'));
    }
    public function status($id)
    {

        $mandob = Mandob::findOrFail($id);
        $mandob->status =1;
        $mandob->save();
        return redirect('admin/mandoobs');
    }

    public function block($id)
    {
        $mandob = Mandob::findOrFail($id);
        $mandob->status =0;
        $mandob->save();
        return redirect('admin/mandoobs');
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
        $mandobs = Mandob::find($id);
        $mandobs->name = $request->name;
        $mandobs->phone = $request->phone;
        $mandobs->section = $request->section;
        $mandobs->address = $request->address;
        $mandobs->save();
        return redirect('admin/mandobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mandobs = Mandob::destroy($id);
        return back();
    }
}
