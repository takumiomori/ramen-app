@extends('layouts.ramen')

@section('title','利用者一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">利用者ID</th>
        <th scope="col">氏名</th>
        <th scope="col">ユーザ名</th>
        <th scope="col">アイコン</th>
        <th scope="col">ユーザステータス</th>
        <th scope="col">メールアドレス</th>
        <th scope="col">電話番号</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <td scope="row">{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->guest_name}}</td>
        <td><img src="{{ url('storage', ['images', 'icon', $item->icon]) }}" alt="" class="icon"></td>
        <td>{{$item->status}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->tel}}</td>
        <td><a href="/guest/del?id={{$item->id}}"><button class="btn">削除</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection