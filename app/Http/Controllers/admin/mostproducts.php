<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mostproduct;
use App\Product;

class mostproducts extends Controller
{
    public function index()
    {
        $mostproducts=Mostproduct::all();
        return view('admin.mostproducts.index',compact('mostproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mostproducts=Mostproduct::all();
        $products=Product::all();

        return view('admin.mostproducts.create',compact('products','mostproducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mostproducts = new Mostproduct();
        $mostproducts->product_id = $request->product_id;
//        $mostproducts->counter = $request->counter;
        $mostproducts->save();
        return redirect('admin/mostproducts');
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
        $mostproducts = Mostproduct::find($id);
        $products=Product::all();

        return view('admin.mostproducts.edit',compact('products','mostproducts'));
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
        $mostproducts = Mostproduct::find($id);
        $mostproducts->product_id = $request->product_id;
//        $mostproducts->counter = $request->counter;
        $mostproducts->save();

        return redirect('admin/mostproducts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $mostproducts = Mostproduct::destroy($id);
        return back(); //
    }
}
