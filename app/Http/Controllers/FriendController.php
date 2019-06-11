<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
        //
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


    public  function addFriend(Request  $request){

        $userID = $request->get('userId');
        $friendId = $request->get('friendId');
        $status = $request->get('status');

        $friend = new Friend();

        $friend->user_id =  $userID;
        $friend->friend_id = $friendId;
        $friend->status =  $status;

        $success =  $friend->save();

        if ($success){

            echo  true;
        }
        else {
            echo  false;
        }


    }


    public  function cancelRequest(Request $request){

        $userID = $request->get('userId');
        $friendId = $request->get('friendId');


        $success =DB::table('friends')->where(['user_id'=>$userID,'friend_id'=>$friendId])->delete();


        if ($success){

            echo true;
        }

        else {

            echo false;
        }


    }



    public static function getAllFriend(){

        $userId  = auth()->user()->id;

        $friends  =  DB::select(DB::raw("select id,name from users where id 
                    IN (SELECT user_id FROM friends WHERE friend_id =:userId AND STATUS=2 ) or 
                     id IN (SELECT friend_id FROM friends WHERE user_id =:userId AND STATUS=2) "),array('userId'=>$userId));

        return $friends;

    }

    public static function getAllFriendsId(){

        $result[] = "";
        $userId  = auth()->user()->id;

        $friends  =  DB::select(DB::raw("select id from users where id 
                    IN (SELECT user_id FROM friends WHERE friend_id =:userId AND STATUS=2 ) or 
                     id IN (SELECT friend_id FROM friends WHERE user_id =:userId2 AND STATUS=2) "),array('userId'=>$userId,'userId2'=>$userId));



        if (!empty($friends)){

            foreach ($friends as $key => $value) {
                $result[] = $value->id;
            }
            return $result;

        }

    }
    public static function getAllFriendsPendingId(){

        $userId  = auth()->user()->id;
        $result[] = "";
        $friends  =  DB::select(DB::raw("select id from users where id 
                    IN (SELECT user_id FROM friends WHERE friend_id =:userId AND STATUS=0) or 
                     id IN (SELECT friend_id FROM friends WHERE user_id =:userId2 AND STATUS=0) "),array('userId'=>$userId,'userId2'=>$userId));

        foreach ($friends as $key => $value) {
            $result[] = $value->id;
        }
        return $result;

    }

    public function  unFriend(Request $request){

        $userID = $request->get('userId');
        $friendId = $request->get('friendId');

        $success =DB::table('friends')->where(['user_id'=>$userID,'friend_id'=>$friendId])->delete();


        if ($success){

            echo true;
        }

        else {

            echo false;
        }

    }


    public  static function checkFriend($friendId){


        $userId=   auth()->user()->id ;

        $check = DB::table('friends')->select('status')->where(['user_id'=>$userId,'friend_id'=>$friendId])->first();

       if ($check){

           return $check->status;
       } else {

           return -1;
       }

    }

    public  static function checkFriendRequest($friendId){


        $userId=   auth()->user()->id ;

        $check = DB::table('friends')->select('user_id')->where(['user_id'=>$friendId,'friend_id'=>$userId,'status'=>0])->first();

        if ($check){

            return 1;

        } else {

            return -1;
        }

    }



    public static function getFriends(){

        $userId =  auth()->user()->id;

        $friends =  DB::select(DB::raw("select f.friend_id,f.id,u.name,u.image_path,u.last_login,u.login_status from friends as f 
                    inner JOIN  users as u on u.id =  f.friend_id where f.user_id =:userId and f.status = 1"),array('userId'=>$userId));

        return $friends;
    }

    public  function acceptRequest(Request $request){

        $userID = $request->get('userId');
        $friendId = $request->get('friendId');

       $success =  DB::table('friends')
                    ->where(['user_id'=>$userID,'friend_id'=>$friendId])
                    ->update(['status' => 1]);


        if ($success){

            echo true;
        }

        else {

            echo false;
        }

    }
}
