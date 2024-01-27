@extends('layouts.ramen')

@section('title','店舗カテゴリー一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

    <div class="label">店舗カテゴリーの新規登録</div>
    <form action="{{ route('shopcategory.post.index') }}" method="post">
    @csrf
    <input class="form-control form-control-lg" type="text" placeholder="店舗カテゴリー名" name="name" value="{{old('name')}}">
    <input class="btn" type="submit" value="登録">
</form>

<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">店舗カテゴリーID</th>
        <th scope="col">店舗カテゴリー名</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td><a href="{{ route('shopcategory.del', ['id' => $item->id]) }}/"><button class="btn">削除</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection