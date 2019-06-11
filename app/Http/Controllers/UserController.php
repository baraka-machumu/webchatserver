<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('search_friends_result');

    }


    public function  searchUsers(){

        $friend_name= Input::get('friend');
        $friendResult=  User::where('name','like','%'.$friend_name.'%')->get();


        return view('search_friends',compact('friendResult'));

    }


    public function  loadUsers(){

        $user  =  User::all()->toArray();

        return $user;

    }

}
