<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cellar;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

        $user = User::where('id',Auth::id())->first();
        $user_id = Auth::id();
        $mybeers = Cellar::where('user_id',$user_id)->get();


        return view('home',['user'=>$user,'mybeers' => $mybeers]);
    }
}
