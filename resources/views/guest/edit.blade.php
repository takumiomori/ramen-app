@extends('toppage')

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
    <input type="hidden" name="status" value="{{$form->status}}">
    <label for="name" class="label">お名前</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="お名前" name="name" value="{{$form->name}}"><br>
    <label for="guest_name" class="label">ユーザＩＤ</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="ユーザーID" name="guest_name" value="{{$form->guest_name}}"><br>
    <label for="icon" class="label">アイコン画像データをアップロード</label><br>
    <input class="form-control form-control-lg" type="file" placeholder="アイコン画像データをアップロード" name="icon" accept="image/*"><br>
    <label for="email" class="label">メールアドレス</label><br>
    <input class="form-control form-control-lg" type="email" placeholder="メールアドレス " name="email" value="{{$form->email}}"><br>
    <label for="tel" class="label">電話番号</label><br>
    <input class="form-control form-control-lg" type="tel" placeholder="電話番号" name="tel" value="{{$form->tel}}"><br>
    <label for="password" class="label">パスワード</label><br>
    <input class="form-control form-control-lg" type="password" placeholder="パスワード" name="password" value="{{$form->password}}"><br>
    <input class="btn" type="submit" value="更新">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection