<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mostproduct;

class mostproducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (true) {
            return Mostproduct::all();
        }
    }


    public function store(Request $request)
    {
        return Mostproduct::create([
            'product_id' => $request['product_id'],
//            'counter' => $request['counter'],
        ]);
    }


    public function update(Request $request)
    {
        $products = Mostproduct::findOrFail($request->id);
        $products->product_id = $request->product_id;
//        $products->counter = $request->counter;
        $products->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
