@extends('toppage')

@section('title','お店ページ')

@section('content')
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    お気に入り登録はログインが必要です
</div>
@endif
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
  <a href="/favorite/add?shop_id={{$item->id}}"><button type="button" class="btn post_btn">お気に入り登録</button></a>
</div>
  </div>
</div>




<div class="label_front">メニュー</div>
<div class="menu_area">{{$item->menu}}</div>

    <div class="label_front">お店の口コミ</div>
    <div class="card_group">
      @foreach($posts as $post)
      <div class="card card_wrap" style="width: 30rem;">
        <div class="card_userimg"><img src="{{ url('storage', ['images', 'icon', $post->user->icon]) }}" alt="" class="user_icon"></div>
        <div class="card-body card_rightcontent">
          <div class="post_user">{{$post->user->guest_name}}</div>
          <p class="card-text">
            <div class="star_space"><div class="card-label">星評価：</div><div class="star">{{$post->star}}</div>
          </p></div>
            <div class="post_content">{{$post->post_text}}</div>
          </a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection