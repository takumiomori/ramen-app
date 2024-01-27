@extends('toppage')

@section('title','口コミ投稿')

@section('content')
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="label_front">{{$shop->name}}の口コミを投稿</div>
<div class="content_area">
    <form action="{{ route('post.post.add') }}" method="post" enctype="multipart/form-data" class="sp_form">
    @csrf
    <label for="star" class="label">星評価</label><br>
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="star">
        <option selected>星評価を選択</option>
        <option value="1.00">１つ星：☆</option>
        <option value="2.00">２つ星：☆☆</option>
        <option value="3.00">３つ星：☆☆☆</option>
        <option value="4.00">４つ星：☆☆☆☆</option>
        <option value="5.00">５つ星：☆☆☆☆☆</option>
      </select><br>
    <label for="post_text" class="label mt">口コミ</label><br>
    <span>400文字以内で入力してください。</span><br>
    <textarea class="posttext mb" placeholder="投稿内容を入力"  rows="5" cols="80" name="post_text" value="" >{{old('post_text')}}</textarea><br>
    <input class="form-control form-control-lg" type="hidden" name="user_id" value="{{ Auth::user()->id }}"><br>
    <input class="form-control form-control-lg" type="hidden" name="shop_id" value="{{$shop_id}}"><br>
    <input class="btn search_btn" type="submit" value="投稿">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection