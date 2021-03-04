<?php

namespace App\Http\Controllers\admin;

use App\Areas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;

class stores extends Controller
{
    public function index()
    {
        $stores=Store::all();
        return view('admin.stores.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores= Store::all();
        $areas=Areas::all();
        return view('admin.stores.create',compact('stores','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stores = new Store();
        $stores->name = $request->name;
        $stores->section = $request->area_id;
        $stores->address = $request->address;
        $stores->save();

        return redirect('admin/stores');
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
        $areas=Areas::all();
        $stores= Store::find($id);
        return view('admin.stores.edit',compact('stores','areas'));
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
        $stores = Store::find($id);
        $stores->name = $request->name;
        $stores->section = $request->area_id;
        $stores->address = $request->address;
        $stores->save();
        return redirect('admin/stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores = Store::destroy($id);
        return back();
    }
}
