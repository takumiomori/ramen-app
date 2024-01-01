@extends('layouts.ramen')

@section('title','お店ページ')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">店舗名</th>
        <th scope="col">星評価</th>
        <th scope="col">画像</th>
        <th scope="col">カテゴリー</th>
        <th scope="col">所在地</th>
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
        <td scope="row"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="icon"></td>
        <td scope="row">@foreach($item->shopcategory as $obj){{$obj->name}}@endforeach</td>
        <td scope="row">{{$item->place->name}}</td>
        <td scope="row">{{$item->holiday}}</td>
        <td scope="row">{{$item->tel}}</td>
        <td scope="row">{{$item->address}}</td>
        <td scope="row">{{$item->open_time}}</td>
        <td scope="row">{{$item->menu}}</td>
      </tr>

    </tbody>
  </table>

  <button><a href="/post/add?shop_id={{$item->id}}">口コミを書く</a></button>

  <form action="/shop/shoppage" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control form-control-lg" type="hidden" name="guest_id" value=""><br>
    <input class="form-control form-control-lg" type="hidden" name="shop_id" value="{{$item->id}}"><br>
    <input class="submit_btn" type="submit" value="お気に入り登録">


    <div>お店の口コミ</div>
    <table>
        <tr><th></th><th>ユーザー名</th><th>星評価</th><th>口コミ</th></tr>
        @foreach($posts as $post)
        <tr><td><img src="{{ url('storage', ['images', $post->guest->icon]) }}" alt="" class="icon"></td><td>{{$post->guest->guest_name}}</td><td>{{$post->star}}</td><td>{{$post->post_text}}</td></tr>
        @endforeach
    </table>
    
@endsection

@section('footer')
copyright 2023 Omori.
@endsection