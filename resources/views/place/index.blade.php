@extends('layouts.ramen')

@section('title','市町村一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

    <div class="label">市町村情報の新規登録</div>
    <form action="{{ route('place.post.index') }}" method="post">
    @csrf
    <input class="form-control form-control-lg" type="text" placeholder="市町村名" name="name" value="{{old('name')}}"><br>
    <input class="btn" type="submit" value="登録">
</form>

<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">市町村ID</th>
        <th scope="col">市町村名</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <td scope="row">{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td><a href="{{ route('place.del', ['id' => $item->id]) }}"><button class="btn">削除</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection