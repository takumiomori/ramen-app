<?php

namespace App\Http\Controllers;

use App\Models\Place;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['place.index','place.del']);
    }

    public function index(Request $request):View{
        $items = Place::all();
        $msg = session('msg');
        return view('place.index',['items' => $items,'msg'=>$msg,]);
    }

    public function create(Request $request){
        $this->validate($request,Place::$rules);
        
        $guest = new Place;
        $form = $request->all();
        unset($form['_token']);
        $guest->fill($form)->save();

        return redirect('/place/index')->with(['msg'=>'登録が完了しました']);

    }

    public function delete(Request $request){
        $guest=Place::find($request->id);
        return view('place.del',['form'=>$guest]);
    }

    public function remove(Request $request){
        Place::find($request->id)->delete();
        return  redirect('/place/index')->with(['msg'=>'削除が完了しました']);
    }
}
