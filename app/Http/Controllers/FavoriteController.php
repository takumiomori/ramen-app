<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Shop;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request):View{
        $items = Favorite::all();
        return view('favorite.index',['items' => $items]);
    }

    public function add(Request $request):View{
        $shop_id = $request->shop_id;
        $item = shop::find($shop_id);
        return view('favorite.add',['item' => $item]);
    }

    public function create(Request $request){
        $this->validate($request,Favorite::$rules);
        $shop_id = $request->shop_id;
        $user_id = Auth::id();
        $favorite = new Favorite;
        $form = $request->all();
        unset($form['_token']);
        $favorite->user_id = $user_id;
        $favorite->fill($form)->save();
        
        $favorite->shop()->attach($shop_id);
        return  redirect('/guest/guestpage')->with(['msg'=>'お気に入り登録が完了しました']);

    }

    public function delete(Request $request){
        $guest=Favorite::find($request->id);
        return view('favorite.del',['form'=>$guest]);
    }

    public function remove(Request $request){
        Favorite::find($request->id)->delete();
        return  redirect('/favorite/index')->with(['msg'=>'削除が完了しました']);
    }
}
