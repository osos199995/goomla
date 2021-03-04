<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class orders extends Controller
{
use ApiResponceTrait ;

    public function index()
    {
        if (true) {
            return Order::all();
        }
    }

    public function store(Request $request)
    {
        return Order::create([
            'user_id' => $request['user_id'],
            'product_id' => $request['product_id'],
            'price' => $request['price'],
            'complete_id' => $request['complete_id'],
            'stage_id' => 0,
            'price_unit' => $request['price_unit'],
            'quantity_unit' => $request['quantity_unit'],
            'order_id' => $request['order_id'],
            'date' => $request['date'],
            'quantity' => $request['quantity'],
            'discount' => $request['discount'],
            'waiting_status' => $request['waiting_status'],
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if (true) {
            return Order::find($id);
        // }
    }
    public function update(Request $request )
    {
        $order = Order::findOrFail($request->id);
        $order->user_id = $request->user_id;
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->discount = $request->discount;
        $order->price = $request->price;
         $order->order_id = $request->order_id;
        $order->date = $request->date;
        if($request->complete_id){
        $order->complete_id = $request->complete_id;
         }
        else{
            $order->complete_id = 0;
        }
        if($request->stage_id){
            $order->stage_id = $request->stage_id;
             }
            else{
                $order->stage_id = 0;

            }
        $order->price_unit = $request->price_unit;
        $order->quantity_unit = $request->quantity_unit;
        $order->waiting_status = $request->waiting_status;
        $order->save();
    }



    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return ['message' => 'order Deleted'];
    }


    public function mandobOrderStatus(Request $request,$id){
        $order = Order::find($id);
        $order = Order::where('order_id' , $id)->get();
        foreach($order as $orde){
            $orde->mandob_stage = $request->mandob_stage;
            $orde->mandob_date = $request->mandob_date;
            $orde->save();
        }
        return  $this->ApiResponce($orde);
    }
}
