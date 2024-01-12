@extends('layouts.ramen')

@section('title','お店ページ')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<div>お店を探す</div>
    <a href="/shop/findcategory"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">カテゴリー検索</button></div></a>
    <a href="/shop/findplace"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">市町村検索</button></div></a>
    <a href="/shop/findcomplex"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">複合検索</button></div></a>

<div>星評価ランキングTOP5</div>
<table class="table">
    <thead class="table-dark">
      <tr>
        <th></th>
        <th scope="col">店舗名</th>
        <th scope="col">画像</th>
        <th scope="col">カテゴリー</th>
        <th scope="col">所在地</th>
        <th scope="col">星評価</th>
        <th scope="col">店舗ページ</th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <td scope="row">{{++$i}}位</td>
        <td scope="row">{{$item->name}}</td>
        <td scope="row"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="shop_image"></td>
        <td scope="row">@foreach($item->shopcategory as $obj){{$obj->name}}@endforeach</td>
        <td scope="row">{{$item->place->name}}</td>
        <td scope="row">{{$item->star}}</td>
        <td scope="row"><a href="/shop/shoppage?id={{$item->id}}"><div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn">店舗ページ</button></div></a></td>

      </tr>
      @endforeach
    </tbody>
  </table>


    
@endsection

@section('footer')
copyright 2023 Omori.
@endsection