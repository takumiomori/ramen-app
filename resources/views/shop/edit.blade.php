@extends('layouts.ramen')

@section('title','店舗情報の編集')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<form action="{{ route('shop.post.edit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <input type="hidden" name="id" value="{{$form->id}}">
    <tr><th>店舗名</th><td><input class="form-control form-control-lg" type="text" name="name" value="{{$form->name}}"></td></tr>
    <label for="shopcategory_id" class="label">現在登録されている店舗カテゴリー</label><br>
    @foreach($form->shopcategory as $obj)<input type="checkbox" name="shopcategory_id[]" value="{{$obj->id}}" checked>{{$obj->name}}
    @endforeach
    <br>
    <label for="shopcategory_id" class="label mt">追加の店舗カテゴリーを選択</label><br>
    @foreach($categories as $category)
    <input type="checkbox" name="shopcategory_id[]" value="{{$category->id}}">{{$category->name}}
    @endforeach
    <tr><th>所在市町村名</th><td><select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="place_id">
    <option selected value="{{$form->place_id}}">{{$form->place->name}}</option>
        @foreach($places as $place)
        <option value="{{$place->id}}">{{$place->name}}</option>
        @endforeach
      </select></td></tr>
      <tr><th>店舗画像</th><td><input class="form-control form-control-lg" type="file" placeholder="店舗画像データをアップロード" name="image" accept="image/*"></td></tr>
      <tr><th>定休日</th><td><input class="form-control form-control-lg" type="text" name="holiday" value="{{$form->holiday}}"></td></tr>
      <tr><th>電話番号</th><td><input class="form-control form-control-lg" type="tel" name="tel" value="{{$form->tel}}"></td></tr>
      <tr><th>住所</th><td><input class="form-control form-control-lg" type="text" name="address" value="{{$form->address}}"></td></tr>
      <tr><th>営業時間</th><td><input class="form-control form-control-lg" type="text" name="open_time" value="{{$form->open_time}}"></td></tr>
      <tr><th>メニュー</th><td><textarea class="posttext mb" placeholder="メニュー内容を記入"  rows="5" cols="80" name="menu" >{{$form->menu}}</textarea></td></tr>
      </table>
    <input class="btn" type="submit" value="更新">
</form>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection