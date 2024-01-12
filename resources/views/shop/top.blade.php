@extends('layouts.ramen')

@section('title','お店ページ')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<div class="label_front">お店を探す</div>
    <a href="/shop/findcategory"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">カテゴリー検索</button></div></a>
    <a href="/shop/findplace"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">市町村検索</button></div></a>
    <a href="/shop/findcomplex"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">複合検索</button></div></a>

<div class="label_front">星評価ランキングTOP5</div>
@foreach($items as $item)
<div class="ranking_space">
  <div class="rank"><div class="rank_num">{{++$i}}<div class="rank_txt">位</div></div></div>
  <div class="rank_img"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="rankshop_image"></div>
  <div class="rank_info">
    <div class="shop_name">{{$item->name}}</div>
    <div class="place">{{$item->place->name}}</div>
    <div class="category_space">@foreach($item->shopcategory as $obj)<div class="category">{{$obj->name}}</div>@endforeach
    </div>
    <div class="star_space">
      <div class="card-label">星評価：
        </div><div class="star">{{$item->star}}</div>
    </div>
    <a href="/shop/shoppage?id={{$item->id}}" class="btn ">店舗ページ</a>
  </div>
  @endforeach
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection