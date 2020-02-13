<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id){

        $userinfo = User::where('id',$id)->first();
        logger($userinfo);
        return view('profile',['userinfo'=>$userinfo]);



    }


    public function myprofile(){

        $myinfo = Auth::user();
        return view('myprofile',['myinfo' => $myinfo ]);

    }


    public function regist(Request $request){

        $user_id = Auth::id();
        logger($user_id);
        $target = User::find($user_id);
        logger($target);

        $target->name = $request->name;
        $target->birthday = $request->birthday;
        $target->sex = $request->sex;
        $target->detail = $request->detail;
        $target->save();


        /* 画像を登録 */
        if ($request->file('image')) {
            if ($request->file('image')->isValid([])) {
                $path =$request->image->store('public');
                $target->image = $path;
                $target->save();
            } else {
                return redirect()
            ->back()
            ->withInput()
            ->withErrors();
            }
        }


        return redirect('/');

    }
}
