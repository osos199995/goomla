<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class users extends Controller
{
    public function index()
    {
        $users=User::where('role' ,'!=', 'admin')->paginate(15);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users= User::find($id);
        return view('admin.users.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

  
    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        $users = User::destroy($id);
        return back(); 
    }

    public function status($id)
    {
        $users = User::findOrFail($id);
        $users->status =1;
        $users->save();
        return redirect('admin/users');
    }

    public function block($id)
    {
        $users = User::findOrFail($id);
        $users->status =2;
        $users->save();
        return redirect('admin/users');
    }
}
