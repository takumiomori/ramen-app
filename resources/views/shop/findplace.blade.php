@extends('toppage')

@section('title','市町村検索')

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
    <form action="/shop/findplace" method="post" enctype="multipart/form-data">
    @csrf
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="place_id">
    <option selected>市町村を選択</option>
    @foreach($places as $place)
        <option value="{{$place->id}}">{{$place->name}}</option>
        @endforeach
      </select><br>
    <input class="btn" type="submit" value="検索">
</form>
</div>

@endsection

@section('footer')
copyright 2023 Omori.
@endsection