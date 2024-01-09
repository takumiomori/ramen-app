@extends('layouts.ramen')

@section('title','お店ページ')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<div>お店を探す</div>
    <button><a href="/shop/findcategory">カテゴリー検索</a></button>
    <button><a href="/shop/findplace">市町村検索</a></button>
    <button><a href="/shop/findcomplex">複合検索</a></button>

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
        <td scope="row"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="icon"></td>
        <td scope="row">@foreach($item->shopcategory as $obj){{$obj->name}}@endforeach</td>
        <td scope="row">{{$item->place->name}}</td>
        <td scope="row">{{$item->star}}</td>
        <td scope="row"><button><a href="/shop/shoppage?id={{$item->id}}">店舗ページ</a></button></td>

      </tr>
      @endforeach
    </tbody>
  </table>


    
@endsection

@section('footer')
copyright 2023 Omori.
@endsection