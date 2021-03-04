<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class users extends Controller
{
    use ApiResponceTrait ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (true) {
            return User::all();
        }
    }



    public function store(Request $request)
    {

        return User::create([
            'id' => $request['id'],
            'secound_phone' => $request['secound_phone'],
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'role' => 'user',
            'password' => Hash::make($request['password']),
            'shop_name' => $request['shop_name'],
            'shop_type' => $request['shop_type'],
            'area' => $request['area'],
            'address' => $request['address'],
            'location' => $request['location'],

        ]);
    }





    public function show($id)
    {
        if (true) {
            return User::find($id);
        }
    }

    public function search(Request $request){

        if ($search = $request->name) {
            $users = User::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%");
            })->first();
        }else{
            $users = User::latest()->paginate(5);
        }

        return $users;

    }


    public function update(Request $request ,$id)
    {


        $user =User::find($id);
        if ($user){
            $user->update([
                'id' => $id,
                'secound_phone' => $request['secound_phone'],
                'name' => $request['name'],
                'email' => $request['email'],
                'image' => $request['image'],
                'role' => 'user',
                'password' => Hash::make($request['password']),
                'shop_name' => $request['shop_name'],
                'shop_type' => $request['shop_type'],
                'area' => $request['area'],
                'address' => $request['address'],
                'location' => $request['location'],
            ]);
            return $this->ApiResponce($user,['تم تحديث المستخدم بنجاح']);
        }
        return $this->ApiResponce(['هذا المستخدم غير موجود']);


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
