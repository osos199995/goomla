<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mandob;

class mandobs extends Controller
{
   use ApiResponceTrait ;

    public function index()
    {

           $mandob = Mandob::all();
      return $this->ApiResponce($mandob);
    }

    public function store(Request $request)
    {
        return Mandob::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'section' => $request['section'],

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

    }
    public function update(Request $request )
    {

    }



    public function destroy($id)
    {

    }
}
