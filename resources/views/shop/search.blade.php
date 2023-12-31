@extends('layouts.ramen')

@section('title','投稿一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
@if(isset($result))
<div class="alert alert-primary" role="alert">{{$result}}件お店が見つかりました。</div>
@endif
<table class="table">
    <thead class="thead-dark">
      <tr>
      <th scope="col">店舗ID</th>
        <th scope="col">店舗名</th>
        <th scope="col">画像</th>
        <th scope="col">カテゴリー</th>
        <th scope="col">所在地</th>
        <th scope="col">定休日</th>
        <th scope="col">電話番号</th>
        <th scope="col">住所</th>
        <th scope="col">営業時間</th>
        <th scope="col">メニュー</th>
        <th scope="col">店舗ページ</th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
        <td scope="row">{{$item->name}}</td>
        <td scope="row"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="icon"></td>
        <td scope="row">@foreach($item->shopcategory as $obj){{$obj->name}}@endforeach</td>
        <td scope="row">{{$item->place->name}}</td>
        <td scope="row">{{$item->holiday}}</td>
        <td scope="row">{{$item->tel}}</td>
        <td scope="row">{{$item->address}}</td>
        <td scope="row">{{$item->open_time}}</td>
        <td scope="row">{{$item->menu}}</td>
        <td scope="row"><button><a href="/shop/shoppage?id={{$item->id}}">店舗ページ</a></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection