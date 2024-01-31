@extends('toppage')

@section('title','投稿一覧')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
@if(isset($name))
<div class="label_front">{{$name}}の検索結果</div>
@endif
@if(isset($result))
<div class="alert alert-primary" role="alert">{{$result}}件お店が見つかりました。</div>
@endif
      <div class="card_group">
        @foreach($items as $item)
        <div class="card" style="width: 18rem;">
          <img src="{{ url('storage', ['images','shop', $item->image]) }}" class="card-img-top" alt="" >
          <div class="card-body">
            <h5 class="card-title">{{$item->name}}</h5>
            
              <div class="place">{{$item->place->name}}</div><br>
              <div class="category_space">
              @foreach($item->shopcategory as $obj)<div class="category">{{$obj->name}}</div>@endforeach
            </div>
              <div class="star_space"><div class="card-label">星評価：</div><div class="star">{{$item->star}}</div><br>
            </div>
              <br>
            <a href="{{ route('shop.shoppage', ['id' => $item->id]) }}" class="btn ">店舗ページ</a>
          </div>
        </div>
      @endforeach
      </div>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection