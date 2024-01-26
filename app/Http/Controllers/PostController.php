<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Shop;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['post.index','post.del']);

        $this->middleware('auth')->only(['post.add', 'post.addresult']);
        $this->middleware('user')->only(['post.add', 'post.addresult']);
    }

    public function index(Request $request):View{
        $items = Post::all();
        return view('post.index',['items' => $items]);
    }

    public function add(Request $request):View{
        $items = session('items');
        $msg = session('msg');
        $shop =Shop::find($request->shop_id);
        $shop_id = $request->shop_id;
        return view('post.add',['items' => $items,'msg'=>$msg,'shop_id'=>$shop_id,'shop'=>$shop]);
    }

    public function addresult(Request $request):View{
        $msg = session('msg');
        return view('post.addresult',['msg'=>$msg]);
    }

    public function create(Request $request){
        $this->validate($request,Post::$rules);

        $shop_id = $request->shop_id;
        $user_id = $request->user_id;

        $post = new Post;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();

        $post->shop()->attach($shop_id);
        $postsData = Post::whereHas('shop', function ($query) use ($shop_id) {
            $query->where('shop_id', $shop_id);
        })->get();

        $count = $postsData->count();
        $totalStar = $postsData->sum('star');

        $newAvgStar = round($totalStar / $count, 2);

        Shop::find($shop_id)->update(['star' => $newAvgStar]);

        $postCount = Post::where('user_id', $user_id)->count();
        $user = User::find($user_id);

            if ($postCount >= 50) {
                $user->update(['status' => 'ゴールド', 'status_style' => 'gold_style']);
            }elseif (($postCount >= 30) && ($postCount < 50)){
                $user->update(['status' => 'シルバー', 'status_style' => 'silver_style']);
            }elseif (($postCount >= 10) && ($postCount < 30)){
                $user->update(['status' => 'ブロンズ', 'status_style' => 'bronze_style']);
            }

        return  redirect('/post/addresult')->with(['msg'=>'投稿が完了しました']);

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
