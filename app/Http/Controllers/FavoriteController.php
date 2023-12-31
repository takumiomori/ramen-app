<?php

namespace App\Http\Controllers;

use App\Models\Favorite;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function index(Request $request):View{
        $items = Favorite::all();
        return view('favorite.index',['items' => $items]);
    }

    public function create(Request $request){
        $this->validate($request,Favorite::$rules);
        
        $reservation = new Favorite;
        $form = $request->all();
        unset($form['_token']);
        $reservation->fill($form)->save();
        
        $reservation->shop()->attach($shop_id);
        return  redirect('/shop/shoppage')->with(['msg'=>'お気に入り登録が完了しました']);

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
