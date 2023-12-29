@extends('layouts.ramen')

@section('title','店舗カテゴリー削除')

@section('content')
<div class="content_area">
    <form action="/shopcategory/del" method="post" >
    @csrf
    <table>
        <tr><th>店舗カテゴリーID</th><td>{{$form->id}}</td></tr>
        <tr><th>店舗カテゴリー名</th><td>{{$form->name}}</td></tr>
    </table>
    
    <input class="form-control form-control-lg" type="hidden" name="id" value="{{$form->id}}"><br>
    <p>上記の店舗カテゴリー情報を削除しますか？</p>
    <input class="submit_btn" type="submit" value="削除する"></td>
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection