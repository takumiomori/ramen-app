@extends('layouts.ramen')

@section('title','お店ページ')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">店舗名</th>
        <th scope="col">星評価</th>
        <th scope="col">画像</th>
        <th scope="col">お気に入り登録数</th>
        <th scope="col">カテゴリー</th>
        <th scope="col">定休日</th>
        <th scope="col">電話番号</th>
        <th scope="col">住所</th>
        <th scope="col">営業時間</th>
        <th scope="col">メニュー</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td scope="row">{{$item->name}}</td>
        <td scope="row">{{$item->star}}</td>
        <td scope="row"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="shop_image"></td>
        <td scope="row">{{$favoritesCount}}</td>
        <td scope="row">@foreach($item->shopcategory as $obj){{$obj->name}}@endforeach</td>
        <td scope="row">{{$item->holiday}}</td>
        <td scope="row">{{$item->tel}}</td>
        <td scope="row">{{$item->address}}</td>
        <td scope="row">{{$item->open_time}}</td>
        <td scope="row">{{$item->menu}}</td>
      </tr>

    </tbody>
  </table>

  <a href="/post/add?shop_id={{$item->id}}"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">口コミを書く</button></div></a>

  <form action="/shop/shoppage" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control form-control-lg" type="hidden" name="guest_id" value=""><br>
    <input class="form-control form-control-lg" type="hidden" name="shop_id" value="{{$item->id}}"><br>
    <input class="btn" type="submit" value="お気に入り登録">
  </form>

    <div class="label_front">お店の口コミ</div>
    <div class="card_group">
      @foreach($posts as $post)
      <div class="card" style="width: 40rem;">
        <div class="card_userimg"><img src="{{ url('storage', ['images', 'icon', $post->guest->icon]) }}" alt="" class="icon"></div>
        <div class="card-body">
          <div class="user_name">{{$post->guest->guest_name}}</div>
          <p class="card-text">
            <div class="star_space"><div class="card-label">星評価：</div><div class="star">{{$post->star}}</div><br>
          </p></div>
            <br>
            <div class="post_content">{{$post->post_text}}</div>
          </a>
        </div>
      </div>
    @endforeach
    <table>
        <tr><th></th><th>ユーザー名</th><th>星評価</th><th>口コミ</th></tr>
        @foreach($posts as $post)
        <tr><td></td><td>{{$post->guest->guest_name}}</td><td>{{$post->star}}</td><td>{{$post->post_text}}</td></tr>
        @endforeach
    </table>
    
@endsection

@section('footer')
copyright 2023 Omori.
@endsection