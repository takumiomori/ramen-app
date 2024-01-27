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
        <td scope="row">{{$item->user->id}}</td>
        <td scope="row">{{$item->user->name}}</td>
        <td scope="row">@foreach($item->shop as $obj){{$obj->name}}@endforeach</td>
        <td scope="row"><a href="{{ route('favorite.del', ['id' => $item->id]) }}"><button class="btn">削除</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection