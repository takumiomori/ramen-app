@extends('toppage')

@section('title','カテゴリー検索')

@section('content')
<div class="label_front">カテゴリー検索</div>
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
    <form action="/shop/findcategory" method="post" enctype="multipart/form-data">
    @csrf
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="shopcategory_id">
    <option selected>カテゴリーを選択</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select><br>
    <input class="btn mt search_btn" type="submit" value="検索">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection