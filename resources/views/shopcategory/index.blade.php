@extends('layouts.ramen')

@section('title','店舗カテゴリー一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

    <div>店舗カテゴリーの新規登録</div>
    <form action="/shopcategory/index" method="post">
    @csrf
    <input class="form-control form-control-lg" type="text" placeholder="店舗カテゴリー名" name="name" value="{{old('name')}}"><br>
    <input class="submit_btn" type="submit" value="登録">
</form>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">店舗カテゴリーID</th>
        <th scope="col">店舗カテゴリー名</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td><button><a href="/shopcategory/del?id={{$item->id}}">削除</a></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection