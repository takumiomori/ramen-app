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
    <label for="name" class="label">お名前</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="例）田中太郎" name="name" value="{{old('name')}}"><br>
    <label for="guest_name" class="label">ユーザＩＤ</label><br>
    <input class="form-control form-control-lg" type="text" placeholder="例）taro_tanaka01" name="guest_name" value="{{old('aguest_name')}}"><br>
    <label for="icon" class="label">アイコン画像データをアップロード</label><br>
    <input class="form-control form-control-lg" type="file" placeholder="アイコン画像データをアップロード" name="icon" accept="image/*"><br>
    <label for="mail" class="label">メールアドレス</label><br>
    <input class="form-control form-control-lg" type="email" placeholder="例）taro@email.com" name="mail" value="{{old('mail')}}"><br>
    <label for="tel" class="label">電話番号</label><br>
    <input class="form-control form-control-lg" type="tel" placeholder="例）012-3456-7890" name="tel" value="{{old('tel')}}"><br>
    <label for="password" class="label">パスワード</label><br>
    <input class="form-control form-control-lg" type="password" placeholder="英大文字・英小文字・数字（０〜９）・記号（「？」「@」「_」「&」「$」など）を各１字以上組み合わせた８文字以上を入力" name="password" value="{{old('password')}}"><br>
    <input class="btn" type="submit" value="登録">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection