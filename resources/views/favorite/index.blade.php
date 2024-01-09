@extends('layouts.ramen')

@section('title','お気に入り一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">お気に入りID</th>
        <th scope="col">ユーザID</th>
        <th scope="col">氏名</th>
        <th scope="col">店舗名</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <td scope="row">{{$item->id}}</td>
        <td scope="row">{{$item->guest->id}}</td>
        <td scope="row">{{$item->guest->name}}</td>
        <td scope="row">{{$item->shop->first()->name}}</td>
        <td scope="row"><button><a href="/favorite/del?id={{$item->id}}">削除</a></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection