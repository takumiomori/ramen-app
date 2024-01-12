@extends('layouts.ramen')

@section('title','お店ページ')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
<div class="shop_space">
  <div class="shop_img"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="shoppage_top"></div>
  <div class="shop_side">
    <div class="shop_name">{{$item->name}}</div>
    <div class="star_favo_space mb">
      <div class="card-label">星評価：</div><div class="star mr">{{$item->star}}</div>
      <div class="card-label">お気に入り登録数：</div><div class="star">{{$favoritesCount}}</div>
    </div>
    <div class="category_space">@foreach($item->shopcategory as $obj)<div class="category">{{$obj->name}}</div>@endforeach
    <hr>
    <div class="info">住所：{{$item->address}}</div>
    <div class="info">電話番号：{{$item->tel}}</div>
    <div class="info">営業時間：{{$item->open_time}}</div>
    <div class="info">定休日：{{$item->holiday}}</div>
    <div class="btn_area">
  <a href="/post/add?shop_id={{$item->id}}"><button type="button" class="btn post_btn">口コミを書く</button></a>

<form action="/shop/shoppage" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control form-control-lg" type="hidden" name="shop_id" value="{{$item->id}}">
    <input class="btn favo_btn" type="submit" value="お気に入り登録">
  </form>
</div>
  </div>
</div>




<div class="label_front">メニュー</div>
<div class="menu_area">{{$item->menu}}</div>

    <div class="label_front">お店の口コミ</div>
    <div class="card_group">
      @foreach($posts as $post)
      <div class="card card_wrap" style="width: 30rem;">
        <div class="card_userimg"><img src="{{ url('storage', ['images', 'icon', $post->guest->icon]) }}" alt="" class="user_icon"></div>
        <div class="card-body card_rightcontent">
          <div class="post_user">{{$post->guest->guest_name}}</div>
          <p class="card-text">
            <div class="star_space"><div class="card-label">星評価：</div><div class="star">{{$post->star}}</div>
          </p></div>
            <div class="post_content">{{$post->post_text}}</div>
          </a>
        </div>
      </div>
    @endforeach
    
@endsection

@section('footer')
copyright 2023 Omori.
@endsection