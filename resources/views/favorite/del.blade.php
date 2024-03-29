@extends('layouts.ramen')

@section('title','ユーザー削除')

@section('content')
<div class="content_area">
    <form action="{{ route('favorite.post.del') }}" method="post" >
    @csrf
    <table>
        <tr><th>お気に入り店</th><td>@foreach($form->shop as $obj){{$obj->name}}@endforeach</td></tr>
    </table>
    
    <input class="form-control form-control-lg" type="hidden" name="id" value="{{$form->id}}"><br>
    <p>お気に入り登録を解除しますか？</p>
    <input class="submit_btn" type="submit" value="登録を解除する"></td>
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection