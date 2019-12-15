<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all())->save();
        $data = array(
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'image_path'=>$user->image_path,
            'city'=>$user->city,
            'address'=>$user->address,
            'birthday'=>$user->birthday
        );
        return $data;
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

    public function update_image(Request $request, $id) {
        $user = User::find($id);
        $image_path = explode('/', $request->file('file')->store('public'), 2);
        $image_path = 'storage/' . $image_path[1];
        $user->image_path = $image_path;
        $user->save();
        return response()->json(['status'=>'success']);
    }
}
