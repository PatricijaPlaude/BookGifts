<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users',['users'=>$users]);
    }
    public function update($id)
    {
        $req = User::findOrFail($id)->role;
        User::where('id','=',$id)->update(['role' => (3-$req)]);
        return redirect('users');
    }
}
