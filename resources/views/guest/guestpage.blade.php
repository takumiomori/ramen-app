@extends('layouts.ramen')

@section('title','ユーザページ')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ユーザID</th>
        <th scope="col">ユーザ名</th>
        <th scope="col">アイコン</th>
        <th scope="col">ユーザステータス</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <th scope="row">{{$item->id}}</th>
        <td scope="row">{{$item->name}}</td>
        <td scope="row"><img src="{{ url('storage', ['images','icon', $item->icon]) }}" alt="" class="icon"></td>
        <td scope="row">{{$item->status}}</td>
      </tr>

    </tbody>
  </table>

  <button><a href="/guest/edit?id={{$item->id}}">ユーザ登録情報を変更</a></button>

  <div>お気に入り店舗一覧</div>
    <table>
        <tr><th>店舗名</th><th>店舗画像</th><th>星評価</th><th>店舗ページ</th></tr>
        @foreach($favorites as $favorite)
        <tr><td>{{$favorite->shop->first()->name}}</td><td><img src="{{ url('storage', ['images', 'shop', $favorite->shop->first()->image]) }}" alt="" class="icon"></td><td>{{$favorite->shop->first()->star}}</td><td><button><a href="/shop/shoppage?id={{$favorite->shop->first()->id}}">店舗ページ</a></button></td></tr>
        @endforeach
    </table>

    <div>投稿した口コミ</div>
    <table>
        <tr><th>店舗名</th><th>星評価</th><th>投稿内容</th></tr>
        @foreach($posts as $post)
        <tr><td>{{$post->shop->first()->name}}</td><td>{{$post->star}}</td><td>{{$post->post_text}}</td></tr>
        @endforeach
    </table>
    
@endsection

@section('footer')
copyright 2023 Omori.
@endsection