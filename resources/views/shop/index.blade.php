@extends('layouts.ramen')

@section('title','投稿一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<form action="/shop/index" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control form-control-lg" type="text" placeholder="店舗名" name="name" value="{{old('name')}}"><br>
    <label for="shopcategory_id">店舗カテゴリーを選択</label>
    @foreach($categories as $category)
    <input type="checkbox" name="shopcategory_id[]" value="{{$category->id}}">{{$category->name}}
    @endforeach
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="place_id">
    <option selected>所在市町村を選択</option>
        @foreach($places as $place)
        <option value="{{$place->id}}">{{$place->name}}</option>
        @endforeach
      </select><br>
    <input class="form-control form-control-lg" type="file" placeholder="店舗画像データをアップロード" name="image" accept="image/*"><br>
    <input class="form-control form-control-lg" type="text" placeholder="定休日 " name="holiday" value="{{old('holiday')}}"><br>
    <input class="form-control form-control-lg" type="tel" placeholder="電話番号" name="tel" value="{{old('tel')}}"><br>
    <input class="form-control form-control-lg" type="text" placeholder="住所" name="address" value="{{old('address')}}"><br>
    <input class="form-control form-control-lg" type="text" placeholder="営業時間" name="open_time" value="{{old('open_time')}}"><br>
    <input class="form-control form-control-lg" type="text" placeholder="メニュー" name="menu" value="{{old('menu')}}"><br>
    <input class="submit_btn" type="submit" value="登録">
</form>

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
        <th scope="col">星評価</th>
        <th scope="col">店舗ページ</th>
        <th></th>
        <th></th>
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
        <td scope="row">{{$item->star}}</td>
        <td scope="row"><button><a href="/shop/shoppage?id={{$item->id}}">店舗ページ</a></button></td>
        <td scope="row"><button><a href="/shop/del?id={{$item->id}}">削除</a></button></td>
        <td scope="row"><button><a href="/shop/edit?id={{$item->id}}">更新</a></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection