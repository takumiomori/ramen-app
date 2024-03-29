@extends('toppage')

@section('title','ユーザページ')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif


      <div class="prof_space">
        <div class="image_sp"><img src="{{ url('storage', ['images','icon', $item->icon]) }}" alt="" class="prof_icon"></div>
        <div class="prof_info">
          <div class="user_name">{{$item->name}}</div>
          <div class="user_id">@ {{$item->guest_name}}</div>
          <div class="user_status {{$item->status_style}}">{{$item->status}}</div>
        <div class="prof_btn"><a href="{{ route('guest.edit') }}"><button class="btn mb search_btn">ユーザ登録情報を変更</button></a></div>
        </div>
        
        
      </div>

  <div class="label_front"><div class="label_icon"><img class="icon_img" src="{{ secure_asset('assets/img/gallery/shop_icon.png') }}"/></div>お気に入り店舗一覧</div>
  <div class="card_group">
    @foreach($favorites as $favorite)
    <div class="card" style="width: 18rem;">
      <img src="{{ url('storage', ['images','shop', $favorite->shop->first()->image]) }}" class="card-img-top" alt="" >
      <div class="card-body">
        <h5 class="card-title">{{$favorite->shop->first()->name}}</h5>
        
          <div class="star_space"><div class="card-label">星評価：</div><div class="star star_shopcard">{{$favorite->shop->first()->star}}</div><br>
        </div>
          <br>
        <a href="{{ route('shop.shoppage', ['id' => $favorite->shop->first()->id]) }}" class="btn  card_btn">店舗ページ</a>
      </div>
    </div>
  @endforeach

    <div class="label_front sp_mt"><div class="label_icon"><img class="icon_img" src="{{ secure_asset('assets/img/gallery/comments.png') }}"/></div>投稿した口コミ</div>
      <div class="card_group">
        @foreach($posts as $post)
        <div class="card post_card" style="width: 30rem;">
          <div class="card-body">
            <h5 class="card-title">@foreach($post->shop as $obj){{$obj->name}}@endforeach</h5>
            
              <div class="star_space"><div class="card-label">星評価：</div><div class="star">{{$post->star}}</div><br>
            </div>
              <br>
              <div class="post_content">{{$post->post_text}}</div>
            </a>
          </div>
        </div>
      @endforeach
      </div>
    </div>
@endsection

@section('footer')
copyright 2023 Omori.
@endsection