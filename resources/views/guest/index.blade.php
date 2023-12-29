@extends('layouts.ramen')

@section('title','利用者一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">利用者ID</th>
        <th scope="col">氏名</th>
        <th scope="col">ユーザー名</th>
        <th scope="col">アイコン</th>
        <th scope="col">メールアドレス</th>
        <th scope="col">電話番号</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->guest_name}}</td>
        <td><img src="{{ url('storage', ['images', $item->icon]) }}" alt="" class="icon"></td>
        <td>{{$item->mail}}</td>
        <td>{{$item->tel}}</td>
        <td><button><a href="/guest/del?id={{$item->id}}">削除</a></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection