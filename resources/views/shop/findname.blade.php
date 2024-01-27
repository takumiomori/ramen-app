@extends('toppage')

@section('title','店名検索')

@section('content')
<div class="label_front">店名検索</div>
@if(count($errors)>0)
<div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="content_area">
    <form action="{{ route('shop.post.findname') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control form-control-lg" type="text" placeholder="例）〇〇ラーメン" name="name" value="{{old('name')}}">
    <input class="btn mt search_btn" type="submit" value="検索">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection