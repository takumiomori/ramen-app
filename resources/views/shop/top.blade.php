@extends('toppage')

@section('title','お店ページ')

@section('main')
<section class="py-5 overflow-hidden bg-primary" id="home">
  <div class="container">
    <div class="row flex-center">
      <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="#!"><img class="img-fluid" src="/assets/img/gallery/hero-header.png" alt="hero-header" /></a>
      </div>
      <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
        <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">奈良のラーメン<br>食べるなら</h1>
        <h1 class="text-800 mb-5 fs-4" font-size=22px>ラーメン好きのための<br>奈良のラーメン口コミ情報サイト<br class="d-none d-xxl-block" /></h1>
      </div>
    </div>
  </div>
</section>
     




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0 bg-primary-gradient" id="search">

        <div class="container">
          <div class="row justify-content-center g-0">
            <div class="col-xl-9">
              <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">お店を探す</h5>
              </div>
              <div class="row center">
                
                <div class="col-sm-6 col-md-3 mb-6 search_nav">
                  <a href="/shop/findcategory">
                  <div class="text-center"><img class="shadow-icon" src="/assets/img/gallery/ramen_icon.png" height="112" alt="..." />
                    <h5 class="mt-4 fw-bold">カテゴリーで探す</h5>
                    <p class="mb-md-0">「醤油」「豚骨」「味噌」「塩」といったラーメンの種類を選んで検索できます</p>
                  </div>
                  </a>
                </div>
              
              
                <div class="col-sm-6 col-md-3 mb-6 search_nav">
                  <a href="/shop/findplace">
                  <div class="text-center"><img class="shadow-icon" src="/assets/img/gallery/nara_icon.png" height="112" alt="..." />
                    <h5 class="mt-4 fw-bold">市町村で探す</h5>
                    <p class="mb-md-0">奈良県内39市町村ごとのラーメンの情報を探すことができます</p>
                  </div>
                  </a>
                </div>
              
                <div class="col-sm-6 col-md-3 mb-6 search_nav">
                  <a href="/shop/findcomplex">
                  <div class="text-center"><img class="shadow-icon" src="/assets/img/gallery/complex_icon.png" height="112" alt="..." />
                    <h5 class="mt-4 fw-bold">複合検索</h5>
                    <p class="mb-md-0">ラーメンの種類と市町村名を指定して、ピンポイントにラーメンの情報を検索できます</p>
                  </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </div>
        
    </main>
@endsection

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif

<div class="container center_contents">
  <div class="label_front">星評価ランキングTOP5</div>
   @foreach($items as $item)
  <div class="ranking_space">
    <div class="rank"><div class="rank_num">{{++$i}}<div class="rank_txt">位</div></div></div>
    <div class="rank_img"><img src="{{ url('storage', ['images','shop', $item->image]) }}" alt="" class="rankshop_image"></div>
    <div class="rank_info">
      <div class="shop_name">{{$item->name}}</div>
      <div class="place">{{$item->place->name}}</div>
      <div class="category_space">@foreach($item->shopcategory as $obj)<div class="category">{{$obj->name}}</div>@endforeach
    </div>
    <div class="star_space">
      <div class="card-label">星評価：
      </div><div class="star">{{$item->star}}</div>
    </div>
    <a href="/shop/shoppage?id={{$item->id}}" class="btn">店舗ページ</a>
  </div>
   @endforeach
  </div>
</div>
@endsection

