@extends('layouts.ramen')

@section('title','投稿一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">投稿ID</th>
        <th scope="col">ユーザID</th>
        <th scope="col">氏名</th>
        <th scope="col">投稿内容</th>
        <th scope="col">店舗名</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td scope="row">{{$item->guest->id}}</td>
        <td scope="row">{{$item->guest->name}}</td>
        <td scope="row">{{$item->post_text}}</td>
        <td scope="row">{{$item->shop->first()->name}}</td>
        <td scope="row"><button><a href="/post/del?id={{$item->id}}">削除</a></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection