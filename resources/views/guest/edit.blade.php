@extends('layouts.ramen')

@section('title','ユーザー情報更新')

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
    <form action="/guest/edit" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$form->id}}">
    <input class="form-control form-control-lg" type="text" placeholder="お名前" name="name" value="{{$form->name}}"><br>
    <input class="form-control form-control-lg" type="text" placeholder="ユーザーID" name="guest_name" value="{{$form->guest_name}}"><br>
    <input class="form-control form-control-lg" type="file" placeholder="アイコン画像データをアップロード" name="icon" accept="image/*"><br>
    <input class="form-control form-control-lg" type="email" placeholder="メールアドレス " name="mail" value="{{$form->mail}}"><br>
    <input class="form-control form-control-lg" type="tel" placeholder="電話番号" name="tel" value="{{$form->tel}}"><br>
    <input class="form-control form-control-lg" type="password" placeholder="パスワード" name="password" value="{{$form->password}}"><br>
    <input class="submit_btn" type="submit" value="更新">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection