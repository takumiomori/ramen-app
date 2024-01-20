@extends('toppage')

@section('title','お気に入り登録')

@section('content')
@if(count($errors)>0)
<div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="label_front">お気に入り登録</div>
<div class="card">
  <div class="card-body">
    {{$item->name}}をお気に入り登録しますか？
    <div class="btn_area">
    <form action="/favorite/add" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control form-control-lg" type="hidden" name="shop_id" value="{{$item->id}}">
    <input class="btn favo_btn" type="submit" value="お気に入り登録する">
  </form>
  <a href="/shop/shoppage?id={{$item->id}}"><button type="button" class="btn post_btn">店舗ページに戻る</button></a>
  </div>
  </div>
  
</div>


@endsection
