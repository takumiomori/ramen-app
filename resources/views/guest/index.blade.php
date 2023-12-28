@extends('layouts.ramen')

@section('title','利用者一覧')

@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">利用者ID</th>
        <th scope="col">氏名</th>
        <th scope="col">ユーザー名</th>
        <th scope="col">アイコン</th>
        <th scope="col">メールアドレス</th>
        <th scope="col">電話番号</th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->guest_name}}</td>
        <td>{{$item->icon}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->tel}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection