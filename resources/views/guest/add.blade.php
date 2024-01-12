@extends('layouts.ramen')

@section('title','ユーザー登録')

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
    <form action="/guest/add" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control form-control-lg" type="text" placeholder="お名前" name="name" value="{{old('name')}}"><br>
    <input class="form-control form-control-lg" type="text" placeholder="ユーザーID" name="guest_name" value="{{old('aguest_name')}}"><br>
    <input class="form-control form-control-lg" type="file" placeholder="アイコン画像データをアップロード" name="icon" accept="image/*"><br>
    <input class="form-control form-control-lg" type="email" placeholder="メールアドレス " name="mail" value="{{old('mail')}}"><br>
    <input class="form-control form-control-lg" type="tel" placeholder="電話番号" name="tel" value="{{old('tel')}}"><br>
    <input class="form-control form-control-lg" type="password" placeholder="パスワード" name="password" value="{{old('password')}}"><br>
    <input class="btn" type="submit" value="登録">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection