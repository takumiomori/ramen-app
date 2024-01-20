@extends('layouts.ramen')

@section('title','店舗一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
<div class="label_front">店舗情報 新規登録</div>
<form action="/shop/index" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name" class="label">店舗名を記入</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="例）〇〇ラーメン××店" name="name" value="{{old('name')}}"><br>
    <label for="shopcategory_id" class="label">店舗カテゴリーを選択</label><br>
    @foreach($categories as $category)
    <input type="checkbox" name="shopcategory_id[]" value="{{$category->id}}">{{$category->name}}
    @endforeach
    <br>
    <label for="place_id" class="label">店舗所在市町村を選択</label><br>
    <select class="custom-select mr-sm-2 mb mt" id="inlineFormCustomSelect" name="place_id">
    <option selected>所在市町村を選択</option>
        @foreach($places as $place)
        <option value="{{$place->id}}">{{$place->name}}</option>
        @endforeach
      </select><br>
      <div class="label">店舗画像データをアップロード</div>
    <input class="form-control form-control-lg" type="file" name="image" accept="image/*"><br>
    <label for="holiday" class="label">定休日を記入</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="例）○曜日" name="holiday" value="{{old('holiday')}}"><br>
    <label for="tel" class="label">店舗電話番号を記入</label><br><span>半角数字（0〜9）とハイフン（-）のみ入力可。</span><br>
    <input class="form-control form-control-lg" type="tel" placeholder="例）0123-4567-8900" name="tel" value="{{old('tel')}}"><br>
    <label for="address" class="label">店舗住所を記入</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="例）奈良県〇〇市〇〇町123-4　××ビル1F" name="address" value="{{old('address')}}"><br>
    <label for="open_time" class="label">営業時間を記入</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="例）11：00〜15：00" name="open_time" value="{{old('open_time')}}"><br>
    <label for="menu" class="label">メニューを記入</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="例）醤油ラーメン：800円" name="menu" value="{{old('menu')}}"><br>
    <input class="btn" type="submit" value="登録">
</form>

<div class="label_front">店舗情報一覧</div>
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