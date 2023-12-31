@extends('layouts.ramen')

@section('title','口コミ投稿')

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
<div class="content_area">
    <form action="/post/add" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control form-control-lg" type="text" placeholder="投稿内容" name="post_text" value="{{old('post_text')}}"><br>
    <input class="form-control form-control-lg" type="hidden" name="guest_id" value=""><br>
    <input class="form-control form-control-lg" type="hidden" name="shop_id" value="{{$shop_id}}"><br>
    <input class="submit_btn" type="submit" value="投稿">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection