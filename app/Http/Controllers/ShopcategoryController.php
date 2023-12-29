<?php

namespace App\Http\Controllers;

use App\Models\Shopcategory;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopcategoryController extends Controller
{
    public function index(Request $request):View{
        $items = Shopcategory::all();
        $msg = session('msg');
        return view('shopcategory.index',['items' => $items,'msg'=>$msg,]);
    }

    public function create(Request $request){
        $this->validate($request,Shopcategory::$rules);
        
        $guest = new Shopcategory;
        $form = $request->all();
        unset($form['_token']);
        $guest->fill($form)->save();

        return redirect('/shopcategory/index')->with(['msg'=>'登録が完了しました']);

    }

    public function delete(Request $request){
        $guest=Shopcategory::find($request->id);
        return view('shopcategory.del',['form'=>$guest]);
    }

    public function remove(Request $request){
        Shopcategory::find($request->id)->delete();
        return  redirect('/shopcategory/index')->with(['msg'=>'削除が完了しました']);
    }
}
