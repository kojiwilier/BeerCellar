<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use App\Cellar;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
public function showMyAction($id){

        $myActions = Action::where('user_id',$id)->get();
        return view('myactions',['myActions'=>$myActions]);

    }

    public function addAction($id,Request $request){

      $newAction = new Action;
      $newAction->user_id = Auth::id();
      $newAction->beer_id = $id;
      $newAction->save();

      $mybeer = Cellar::where('user_id',Auth::id())->where('beer_id',$id)->first();
      $amount =$mybeer->amount;
      $amount--;
      $mybeer->amount = $amount;
      $mybeer->save();

      $mybeers = Cellar::where('user_id', Auth::id() )->get();

      return view('mybeers',['mybeers' => $mybeers]);


    }
}
