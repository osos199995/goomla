<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Store;
use App\Subcategory;
use App\Company;
use App\Product;
use File;
class products extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $companies=Company::all();
        $products=Product::all();
        return view('admin.products.index',compact('products','companies','subcategories','categories'));

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
        $products=Product::all();
        $companies=Company::all();
        $stores=Store::all();
        return view('admin.products.create',compact('products','categories','companies','subcategories','stores'));

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
        'name' => 'required|min:3|max:255',
        'price_unit' => 'required',
        'quantity_status' => 'required',
        'price' => 'required',
        'max_quantity' => 'required',
        'status' => 'required',
        'waiting_status' => 'required',
        'subunit_type' => 'required',
        ]);
        $products = new Product();
        $products->name = $request->name;
        $products->company_id = $request->company_id;
        $products->category_id = $request->category_id;
        $products->subcategory_id = $request->subcategory_id;
        $products->price = $request->price;
        $products->price_unit = $request->price_unit;
        $products->quantity = $request->quantity;
        $products->quantity_unit = $request->quantity_unit;
        $products->unit_type = $request->unit_type;
        $products->discount = $request->discount;
        $products->description = $request->description;
        $products->store_id = $request->store_id;
        $products->waiting_status = $request->waiting_status;
        $products->status = $request->status;
        if($request->quantity_status)
        {
            $products->quantity_status = $request->quantity_status;

        }
        else{
        $products->quantity_status = 0;

        }

        if($request->max_quantity)
        {
            $products->max_quantity = $request->max_quantity;

        }
        else{
        $products->max_quantity = 0;

        }
        $products->subunit_type = $request->subunit_type;

        $products->save();

        $id= $products->id;

        if($image = $request->file('image')){
                $destinationPath = 'uploads/products';
                $extension = $image->getClientOriginalExtension();
                $fileName = $id.'_image'.'.'.$extension;

                $image->move($destinationPath, $fileName);

                Product::where('id',$id)->update(['image' => $fileName]);
            }

        return redirect('admin/products');
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
        $products = Product::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $companies = Company::all();
        $stores = Store::all();

        return view('admin.products.edit',compact('products','subcategories','companies','categories','stores'));
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
        'name' => 'required|min:3|max:255',
        'price_unit' => 'required',
        'quantity_status' => 'required',
        'price' => 'required',
        'max_quantity' => 'required',
        'status' => 'required',
        'waiting_status' => 'required',
        'subunit_type' => 'required',
        ]);
        $products = Product::find($id);
        $products->name = $request->name;
        $products->company_id = $request->company_id;
        $products->category_id = $request->category_id;
        $products->subcategory_id = $request->subcategory_id;
        $products->price_unit = $request->price_unit;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->discount = $request->discount;
        $products->quantity_unit = $request->quantity_unit;
        $products->unit_type = $request->unit_type;
        $products->description = $request->description;
        $products->quantity_status = $request->quantity_status;
        $products->max_quantity = $request->max_quantity;
        $products->subunit_type = $request->subunit_type;
        $products->store_id = $request->store_id;
        $products->waiting_status = $request->waiting_status;
        $products->status = $request->status;
        $products->save();

        $id= $products->id;

        if($image = $request->file('image')){
                $destinationPath = 'uploads/products';
                $extension = $image->getClientOriginalExtension();
                $fileName = $id.'_image'.'.'.$extension;

                $image->move($destinationPath, $fileName);

                Product::where('id',$id)->update(['image' => $fileName]);
            }

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $products = Product::findOrFail($id);
        $destinationPath = 'uploads/products/'.$products->image;
        if(File::exists($destinationPath)){
          File::delete($destinationPath);
              }
         $products = Product::destroy($id);
        return back(); //
    }
}
