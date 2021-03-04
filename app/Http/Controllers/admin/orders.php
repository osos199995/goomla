<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Mandob;
use App\Product;
use Auth;
use File;
use Illuminate\Support\Facades\DB;

class orders extends Controller
{
    public function index()
    {
        $orders=Order::distinct()->groupBy('order_id')->get();
        $products=Product::all();
        return view('admin.orders.index',compact('orders','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders=Order::all();
        $products=Product::all();
        return view('admin.orders.create',compact('orders','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders = new Order();
        $orders->product_id = $request->product_id;
        $products=Product::where('id', $orders->product_id)->first();

        $orders->user_id = Auth::id();
        $orders->quantity = $request->quantity;
        $orders->complete_id = $request->complete_id;
        $orders->stage_id = $request->stage_id;
        $orders->quantity_unit = $request->quantity_unit;
        $orders->discount = $products->discount * $request->quantity;
        $orders->price = $products->price * $request->quantity - $orders->discount;
        $orders->price_unit = $products->price_unit * $request->quantity_unit;

        $orders->save();
        return redirect('admin/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($user_id, $order_id)
    {
        $orders=Order::where('user_id',$user_id)
        ->where('order_id',$order_id)->get();
        $first=Order::where('user_id',$user_id)
        ->where('order_id',$order_id)->first();

        $products=Product::all();
        return view('admin.orders.show',compact('orders','products','first'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::find($id);
        $products=Product::all();

        return view('admin.orders.edit',compact('orders','products'));
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
        $orders = Order::find($id);
        $orders->product_id = $request->product_id;
        $products=Product::where('id', $orders->product_id)->first();

        $orders->user_id = Auth::id();
        $orders->quantity = $request->quantity;
        $orders->complete_id = $request->complete_id;
        $orders->stage_id = $request->stage_id;
        $orders->quantity_unit = $request->quantity_unit;
        $orders->discount = $products->discount * $request->quantity;
        $orders->price = $products->price * $request->quantity - $orders->discount;
        $orders->price_unit = $products->price_unit * $request->quantity_unit;
        $orders->save();

        return redirect('admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::destroy($id);
        return back(); //
    }
    public function tracks($id)
    {
        $orders = Order::find($id);
        return view('admin.orders.track',compact('orders'));
    }
    public function track(Request $request, $id ,$user_id)
    {
        $orders = Order::find($id);
        $distinct=Order::select('order_id')->distinct()->get();
        $order = Order::where('order_id' , $id)->where('user_id' , $user_id)->get();
        foreach($order as $orde){
        $orde->stage_id = $request->stage_id;

        $orde->save();
        }
        return redirect('admin/orders');
    }
    public function mandobs($id)
    {

        $orders = Order::find($id);
        $mandobs = Mandob::all();
        return view('admin.orders.mandobs',compact('orders','mandobs'));
    }
    public function mandob(Request $request, $id ,$user_id)
    {

        $orders = Order::find($id);
        $distinct=Order::select('order_id')->distinct()->get();
        $order = Order::where('order_id' , $id)->where('user_id' , $user_id)->get();
        foreach($order as $orde){
        $orde->mandob_id = $request->mandob_id;
        $orde->save();
        }
        return redirect('admin/orders');
    }
}
