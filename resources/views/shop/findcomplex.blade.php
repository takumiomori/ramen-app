@extends('toppage')

@section('title','複合検索')

@section('content')
<div class="label_front">複合検索</div>
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
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
    <form action="/shop/findcomplex" method="post" enctype="multipart/form-data">
    @csrf
    <select class="custom-select mr-sm-2 mt" id="inlineFormCustomSelect" name="shopcategory_id">
    <option selected>カテゴリーを選択</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select><br>
    <select class="custom-select mr-sm-2 mt" id="inlineFormCustomSelect" name="place_id">
    <option selected>市町村を選択</option>
    @foreach($places as $place)
        <option value="{{$place->id}}">{{$place->name}}</option>
        @endforeach
      </select><br>
    <input class="btn mt" type="submit" value="検索">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection