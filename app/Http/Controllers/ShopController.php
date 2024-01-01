<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Place;
use App\Models\Shopcategory;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(Request $request):View{
        $items = Shop::all();
        $places = Place::all();
        $categories = Shopcategory::all();
        $msg = session('msg');
        return view('shop.index',['items' => $items,'msg'=>$msg,'places' => $places,'categories' => $categories]);
    }

    public function create(Request $request){
        $this->validate($request,Shop::$rules);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $uploadedFile = $request->file('image');
        if($uploadedFile){
            $fileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs('public/images/shop',$fileName,);
        }else{
            $fileName = 'shop_default.png';
        }
        
        $shopData = [
            'name' => $request->input('name'), 
            'image' => $fileName,
            'place_id' => $request->input('place_id'), 
            'holiday' => $request->input('holiday'), 
            'tel' => $request->input('tel'), 
            'address' => $request->input('address'), 
            'open_time' => $request->input('open_time'), 
            'menu' => $request->input('menu'), 
            'star' => 0.00,
        ];

        $selectedCategories = $request->input('shopcategory_id',[]);


        DB::transaction(function () use ($shopData, $selectedCategories) {
            $shop = Shop::create($shopData);

            foreach ($selectedCategories as $value) {
                $shop->shopcategory()->attach($value);
            }
        });
        
        return redirect('/shop/index')->with(['msg'=>'登録が完了しました']);

    }

    public function delete(Request $request){
        $shop=Shop::find($request->id);
        return view('shop.del',['form'=>$shop]);
    }

    public function remove(Request $request){
        Shop::find($request->id)->delete();
        return  redirect('/shop/index')->with(['msg'=>'削除が完了しました']);
    }

    public function edit(Request $request){
        $shop=Shop::find($request->id);
        $places = Place::all();
        $categories = Shopcategory::all();
        return view('shop.edit',['form'=>$shop,'places' => $places,'categories' => $categories]);
    }

    public function update(Request $request){
        $this->validate($request,Shop::$rules);

        $id = $request->id;
        $shop = Shop::find($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $uploadedFile = $request->file('image');
        if($uploadedFile){
            $fileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs('public/images/shop',$fileName,);
        }else{
            $fileName = $shop->image;
        }

        $starValue = $shop->star;

        $shopData = [
            'name' => $request->input('name'), 
            'image' => $fileName,
            'place_id' => $request->input('place_id'), 
            'holiday' => $request->input('holiday'), 
            'tel' => $request->input('tel'), 
            'address' => $request->input('address'), 
            'open_time' => $request->input('open_time'), 
            'menu' => $request->input('menu'), 
            'star' => $starValue,
        ];

        $selectedCategories = $request->input('shopcategory_id',[]);

        DB::transaction(function () use ($id, $shopData, $shop, $selectedCategories) {

            $shop->fill($shopData)->save();
            $shop->shopcategory()->detach();

            foreach ($selectedCategories as $value) {
                $shop->shopcategory()->attach($value);
            }
        });

        return redirect('/shop/index')->with(['msg'=>'更新が完了しました']);
    }

    public function findplace(Request $request){
        $places = Place::all();
        return view('shop.findplace',['input'=>'','places'=>$places]);
    }

    public function findcategory(Request $request){
        $categories = Shopcategory::all();
        return view('shop.findcategory',['input'=>'','categories'=>$categories]);
    }

    public function findcomplex(Request $request){
        $msg = session('msg');
        $places = Place::all();
        $categories = Shopcategory::all();
        return view('shop.findcomplex',['input'=>'','categories'=>$categories,'places'=>$places,'msg'=>$msg]);
    }

    public function search(Request $request){
        $items = session('items');
        $result = session('result');
        return view('shop.search',['items'=>$items,'result'=>$result]);
    }

      public function searchplace(Request $request){
        $place = $request->place_id;
        $items = Shop::matchPlace($place)->get();
        $result = $items->count();

        return redirect('/shop/search')->with(['items'=>$items,'result'=>$result]);
    }

    public function searchcategory(Request $request){
        $category = $request->shopcategory_id;
        $items = Shop::matchCategory($category)->get();
        $result = $items->count();

        return redirect('/shop/search')->with(['items'=>$items,'result'=>$result]);
    }

    public function searchcomplex(Request $request){
        $category = $request->shopcategory_id;
        $place = $request->place_id;
        $items = Shop::matchCategory($category)->matchPlace($place)->get();
        $result = $items->count();

        if($result > 0){
            return redirect('/shop/search')->with(['items'=>$items,'result'=>$result]);
        }else{
            return redirect('/shop/findcomplex')->with(['msg'=>'検索条件に該当するお店は見つかりませんでした']);
        }

    }

    public function show(Request $request){
        $msg = session('msg');
        $shop_id = $request->id;
        $shop = Shop::find($shop_id);
        $posts = Post::whereHas('shop', function ($query) use ($shop_id) {
            $query->where('shop_id', $shop_id);
        })->get();
        return view('shop.shoppage',['item'=>$shop,'posts'=>$posts,'msg'=>$msg]);
    }


}
