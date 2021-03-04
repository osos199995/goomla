<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class products extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (true) {
            return Product::all();
        }
    }

 public function store(Request $request)
    {
        return Product::create([
           
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'company_id' => $request['company_id'],
            'subcategory_d' => $request['subcategory_d'],
            'price' => $request['price'],
            'price_unit' => $request['price_unit'],
            'unit_type' => $request['unit_type'],
            'quantity_unit' => $request['quantity_unit'],
            'description' => $request['description'],
            'quantity' => $request['quantity'],
            'discount' => $request['discount'],
            'quantity_status' => $request['quantity_status'],
            'max_quantity' => $request['max_quantity'],
            'subunit_type' => $request['subunit_type'],
            'image' => $request['image'],
            'store_id' => $request['store_id'],
            'status' => $request['status'],
            'waiting_status' => $request['waiting_status'],
        ]);
    }
        public function show($id)
    {
        // if (true) {
            return Product::find($id);
        // }
    }
 
    public function update(Request $request )
    {
        $products = Product::findOrFail($request->id);
        $products->name = $request->name;
        $products->category_id = $request->category_id;
        $products->company_id = $request->company_id;
        $products->subcategory_id = $request->subcategory_id;
        $products->discount = $request->discount;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->price_unit = $request->price_unit;
        $products->unit_type = $request->unit_type;
        $products->quantity_unit = $request->quantity_unit;
        $products->description = $request->description;
        $products->image = $request->image;
        $products->quantity_status = $request->quantity_status;
        $products->subunit_type = $request->subunit_type;
        $products->max_quantity = $request->max_quantity;
        $products->store_id = $request->store_id;
        $products->status = $request->status;
        $products->waiting_status = $request->waiting_status;
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
    public function offers()
    {
        return Product::where('discount' , '!=' ,null)->get();

    }
}
