<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistRequest;
use App\Category;
use App\Brewary;
use App\Beer;
use App\Cellar;
use Illuminate\Support\Facades\Auth;

class BeerController extends Controller
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


    public function new()
    {
        $categories = Category::all();
        $brewaries = Brewary::all();
        return view('registbeer')->with(['categories' => $categories,'brewaries' => $brewaries]);
    }

    public function regist(RegistRequest $request)
    {

        $beer =new Beer;
        $form = $request->all();
        unset($form['_token']);
        $beer->fill($form)->save();

        /* 画像を登録　*/
        if ($request->file('pic1')->isValid([])) {
            $path =$request->pic1->store('public');
            $beer->pic1 = $path;
            $beer->save();
        }else{
            return redirect()
            ->back()
            ->withInput()
            ->withErrors();
        }

        /*  カテゴリーとブルワリーが登録ない場合、DBに追加  */

        $category = Category::where('category',$request->category)->get();
        if($category === null){
            $category = new Category;
            $category->fill($request->category)->save();
        }
        return redirect('/home');
    }



    public function edit($id)
    {
        $beer = Beer::where('id',$id)->first();
        $categories = Category::all();
        $brewaries = Brewary::all();
        return view('editbeer',['beer'=> $beer,'categories' => $categories,'brewaries' => $brewaries]);
    }

    /*  ビール編集完了 */
    public function done($id,Request $request)
    {
        $beer = Beer::where('id',$id)->first();
        $form = $request->all();
        $beer->fill($form)->save();

        /* 画像を登録　*/
        if($request->file('pic1')){
        if ($request->file('pic1')->isValid([])) {
            $path =$request->pic1->store('public');
            $beer->pic1 = $path;
            $beer->save();
        }else{
            return redirect()
            ->back()
            ->withInput()
            ->withErrors();
        }
    }
        return redirect('/beers');
    }

    /*ビール一覧表示*/
    public function index(){

        $beers = Beer::all();
        return view('beers',['beers'=> $beers]);
    }


    /* ビール詳細表示 */
    public function detail($id){
        $beer = Beer::where('id',$id)->first();
        logger($beer->pic1);
        return view('beerdetail',['beer'=>$beer]);
    }



    public function mybeers(){

     $user_id = Auth::id();
     $mybeers = Cellar::where('user_id',$user_id)->get();

     return view('mybeers',['mybeers' => $mybeers]);


    }

    /* マイビールへの登録（ajax) */
    public function mybeer_regist($beer_id,Request $request){

        $cellar = Cellar::all();
        $user_id = Auth::id();
        $form = $request->all();

        /* 　todo->すでにユーザーとビールの同じ組み合わせがない時のみ処理！！　*/

            $cellar = new Cellar();
            $cellar->fill($form);
            $cellar->user_id = $user_id;
            $cellar->beer_id = $beer_id;
            $cellar->amount = 1;
            $cellar->save();

    }

    /* ビールを追加 */
     public function add($id,Request $request){
        $user_id = Auth::id();
        $mybeer = Cellar::where('user_id',$user_id)->where('beer_id',$id)->first();
        logger($mybeer);
        $amount =$mybeer->amount;
        $amount++;
        logger($amount);
        $mybeer->amount = $amount;
        $mybeer->save();

        $mybeers = Cellar::where('user_id',$user_id)->get();

        return view('mybeers',['mybeers' => $mybeers]);
    }
}
