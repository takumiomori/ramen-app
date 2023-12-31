<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request):View{
        $items = Post::all();
        return view('post.index',['items' => $items]);
    }

    public function add(Request $request):View{
        $items = session('items');
        $msg = session('msg');
        $shop_id = $request->shop_id;
        return view('post.add',['items' => $items,'msg'=>$msg,'shop_id'=>$shop_id]);
    }

    public function create(Request $request){
        $this->validate($request,Post::$rules);
        
        $reservation = new Post;
        $form = $request->all();
        unset($form['_token']);
        $reservation->fill($form)->save();

        $reservation->shop()->attach($shop_id);
        return view('post.add',['msg'=>'投稿しました']);

    }

    public function delete(Request $request){
        $guest=Post::find($request->id);
        return view('post.del',['form'=>$guest]);
    }

    public function remove(Request $request){
        Post::find($request->id)->delete();
        return  redirect('/post/index')->with(['msg'=>'削除が完了しました']);
    }
}
