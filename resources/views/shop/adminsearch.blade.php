@extends('layouts.ramen')

@section('title','店舗一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<div class="content_area">
  <form action="/shop/adminsearch" method="post" enctype="multipart/form-data">
  @csrf
  <input class="form-control form-control-lg" type="text" placeholder="例）〇〇ラーメン" name="name" value="{{old('name')}}"><br>
  <input class="btn mt" type="submit" value="検索">
</form>
</div>

@endsection