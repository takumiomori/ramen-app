@extends('layouts.ramen')

@section('title','投稿削除')

@section('content')
<div class="content_area">
    <form action="{{ route('post.post.del') }}" method="post" >
    @csrf
    <table>
        <tr><th scope="col">投稿ID</th><td>{{$form->id}}</td></tr>
        <tr><th scope="col">ユーザID</th><td>{{$form->user->id}}</td></tr>
        <tr><th scope="col">氏名</th><td>{{$form->user->name}}</td></tr>
        <tr><th scope="col">星評価</th><td>{{$form->star}}</td></tr>
        <tr><th scope="col">投稿内容</th><td>{{$form->post_text}}</td></tr>
        <tr><th>投稿店名</th><td>@foreach($form->shop as $obj){{$obj->name}}@endforeach</td></tr>
    </table>
    
    <input class="form-control form-control-lg" type="hidden" name="id" value="{{$form->id}}"><br>
    <p>上記の投稿を削除しますか？</p>
    <input class="submit_btn" type="submit" value="投稿を削除する"></td>
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection