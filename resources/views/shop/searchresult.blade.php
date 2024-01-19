@extends('layouts.ramen')

@section('title','店舗一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

@if(isset($name))
<div class="label_front">{{$name}}の検索結果</div>
@endif

<table class="table">
    <thead class="table-dark">
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
        <th scope="col">星評価</th>
        <th scope="col">店舗ページ</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <td scope="row">{{$item->id}}</td>
        <td scope="row">{{$item->name}}</td>
        <td scope="row"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="shop_image"></td>
        <td scope="row">@foreach($item->shopcategory as $obj){{$obj->name}}@endforeach</td>
        <td scope="row">{{$item->place->name}}</td>
        <td scope="row">{{$item->holiday}}</td>
        <td scope="row">{{$item->tel}}</td>
        <td scope="row">{{$item->address}}</td>
        <td scope="row">{{$item->open_time}}</td>
        <td scope="row">{{$item->menu}}</td>
        <td scope="row">{{$item->star}}</td>
        <td scope="row"><a href="/shop/shoppage?id={{$item->id}}"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">店舗ページ</button></a></td>
        <td scope="row"><a href="/shop/del?id={{$item->id}}"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">削除</button></div></a></td>
        <td scope="row"><a href="/shop/edit?id={{$item->id}}"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">更新</button></div></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection