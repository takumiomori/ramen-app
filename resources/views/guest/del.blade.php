@extends('layouts.ramen')

@section('title','ユーザー削除')

@section('content')
<div class="content_area">
    <form action="/guest/del" method="post" >
    @csrf
    <table>
        <tr><th>利用者ID</th><td>{{$form->id}}</td></tr>
        <tr><th>名前</th><td>{{$form->name}}</td></tr>
        <tr><th>ユーザ名</th><td>{{$form->guest_name}}</td></tr>
        <tr><th>アイコン</th><td><img src="{{ url('storage', ['images', $form->icon]) }}" alt="" class="icon"></td></tr>
        <tr><th>メールアドレス</th><td>{{$form->mail}}</td></tr>
        <tr><th>電話番号</th><td>{{$form->tel}}</td></tr>
    </table>
    
    <input class="form-control form-control-lg" type="hidden" name="id" value="{{$form->id}}"><br>
    <p>上記のユーザを削除しますか？</p>
    <input class="submit_btn" type="submit" value="削除する"></td>
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection