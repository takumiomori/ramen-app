@extends('layouts.ramen')

@section('title','店舗情報削除')

@section('content')
<div class="content_area">
    <form action="{{ route('shop.post.del') }}" method="post" >
    @csrf
    <table>
        <tr><th scope="col">店舗ID</th><td>{{$form->id}}</td></tr>
        <tr><th scope="col">店舗名</th><td>{{$form->name}}</td></tr>
    </table>
    
    <input class="form-control form-control-lg" type="hidden" name="id" value="{{$form->id}}"><br>
    <p>上記の店舗情報を削除しますか？</p>
    <input class="btn" type="submit" value="削除する"></td>
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection