<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users =  $this->loadUsers();


        $friends =  FriendController::getFriends();

        return view('chat',compact('friends'));
    }


    public function  loadUsers(){

        $user  =  User::all()->toArray();

        return $user;

    }


}
