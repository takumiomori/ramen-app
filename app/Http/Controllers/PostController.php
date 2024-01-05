<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Shop;
use App\Models\Guest;

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

    public function addresult(Request $request):View{
        $msg = session('msg');
        return view('post.addresult',['msg'=>$msg]);
    }

    public function create(Request $request){
        $this->validate($request,Post::$rules);

        $shop_id = $request->shop_id;
        $newStarValue = $request->star;
        
        $post = new Post;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();

        $post->shop()->attach($shop_id);
        $postsData = Post::whereHas('shop', function ($query) use ($shop_id) {
            $query->where('shop_id', $shop_id);
        })->get();

        $averageStar = $postsData->avg('star');
        $averageStar = bcmul($averageStar, $count = $postsData->count(), 2);
        $newStarValue = bcmul($newStarValue, 1, 2);

        $totalStar = bcadd($averageStar, $newStarValue, 2);
        $count = bcadd($count, 1);
        $newAvgStar = bcdiv($totalStar, $count, 2);
        Shop::find($shop_id)->update(['star' => $newAvgStar]);

        $postsCount = Post::where('guest_id', '=', $request->guest_id)->count();
        $newPostsCount = $postsCount + 1;
        $updateGuest = Guest::find($request->guest_id);
        if($newPostsCount >= 10 && $newPostsCount < 30){
            $updateGuest->update(['status' => 'ブロンズ']);
        }elseif ($newPostsCount >= 30 && $newPostsCount < 50) {
            $updateGuest->update(['status' => 'シルバー']);
        }elseif ($newPostsCount >= 50) {
            $updateGuest->update(['status' => 'ゴールド']);
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
