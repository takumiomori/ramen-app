<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{font-size: 16pt; margin: 16px;}
        .mt{margin-top: 15px;}
        .mb{margin-bottom: 15px;}
        .mr{margin-right: 15px;}
        h1{background-color: #f5c338; color: black; padding: 14px 0 14px 80px; font-weight:bold; margin-top:15px;}
        .content{width: 70vw; margin: 20px auto 20px auto;}
        th{border: 1px solid gainsboro; background-color: #1c1087; color: white; padding: 10px; border-collapse:collapse;}
        td{border: 1px solid gainsboro; border-collapse:collapse; padding: 10px;}
        .footer{text-align: right; color: thistle; margin-right: 20px}
        .alert_message{font-size: 20px; border: 2px solid red; color: red; font-weight: bold; padding: 10px;}
        .icon{width:50px;}
        .prof_space,.ranking_space,.shop_space{display:flex;flex-wrap:wrap; margin-top: 50px;}
        .prof_info{width:70%; display:flex; flex-flow: column;margin-left: 30px;}
        .image_sp{width:20%;}
        .prof_icon{width:100%; border-radius: 200px;}
        .user_name{font-size: 28px;}
        .user_id{font-size: 16px;}
        .user_status{font-size: 16px; border: 1px solid gray; color: gray; ;padding:2px 10px;
        border-radius: 22px;text-align: center; width: 140px; margin:5px 0 10px 0}
        .shop_image{width:100px;}
        .btn{background-color: #f7981b; color: whitesmoke; font-weight: bold;}
        .label{font-weight: bold; 
            text-decoration:underline 12px solid #f7981b;  text-underline-offset:-6px; }
        .label_front{font-weight: bold; 
            border-bottom: 4px solid #f7981b;   font-size: 28px; margin: 80px 0 14px 0; width: 100%; }

        .card_group{display:flex;flex-wrap:wrap;}
        .card{ margin:5px 10px 10px 0px;}
        .card-text{font-size: 12px;}
        .place{margin-bottom: 2px; font-size: 18px;}
        .category_space{display:flex;flex-wrap:wrap;}
        .category{margin: 0 10px 10px 0; border: 1px solid #f7981b; color: #f7981b;padding:2px 10px;
        border-radius: 22px;text-align: center; float: left;
        font-size: 16px;}
        .star_space{display: inline-block;}
        .card-label{display: inline-block; font-size:16px;}
        .star{display: inline-block;font-weight: bold;color: red;}
        .rank{width:100px; display:flex; flex-flow: column;margin-left: 30px;}
        .rank_img,.rank_info{width:30%; display:flex; flex-flow: column;margin-left: 30px;}
        .rank_num{font-size: 90px; font-style: italic; font-weight: bold; position: relative;}
        .rankshop_image{width: 100%;}
        .rank_txt{position: absolute; top: 70px; right: 10px; font-size: 30px; font-style: normal; color: gray;}
        .card_wrap{display:flex;flex-wrap:wrap; margin-top: 50px; flex-direction:row;}
        .card_userimg{width:15%; display:flex; flex-flow: column; margin: 10px 0 0 10px;}
        .user_icon{width:100%; border-radius: 200px; }
        .post_user{font-size:20px;}
        .card_rightcontent{display:flex; flex-flow: column; width:60%;}
        .shop_img{width:35%;}
        .shoppage_top{width:100%;}
        .shop_side{display:flex; flex-flow: column; width:55%; margin-left:30px;}
        .info{font-size:16px; width:100%;}
        .star_favo_space{display: inline-block;}
        .shop_name{font-weight:bold; font-size:30px;}
        .btn_area{display:flex;flex-wrap:wrap;}
        .post_btn,.favo_btn{display:flex; flex-flow: column; margin:30px 15px 0 0; font-size:18px;}
        a{text-decoration:none;}
        span{font-size:16px;}
        .head_nav{display:flex;flex-wrap:wrap;}
        .head_logo{width:250px; margin-right:20px;}
        .logo{width:100%; display:flex; flex-flow: column; margin-left: 30px;}
        .head_title{color:black; border:1px solid black; padding:10px 30px 10px 30px; border-radius: 100px;text-align: center;  font-weight:bold; font-size:20px; display: table-cell; vertical-align: middle; margin:auto 10px auto 20px;} 
        .btn-group{margin:auto 10px auto 20px;}
        .head_menu{font-size:20px; border:0.5px solid gainsboro;}
        .btn_logout{margin-left: 30px;}

    </style>
    

</head>
<body>
  <div class="head_nav">
    <div class="head_logo"><img class="d-inline-block logo" src="{{ secure_asset('assets/img/gallery/NARAmencomi_logo02.png') }}" alt="logo" /></div>
  
  <p class="head_title">サイト管理</p>
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <a href="{{ route('guest.index') }}"><button type="button" class="btn head_menu">利用者</button></a>
      <a href="{{ route('post.index') }}"><button type="button" class="btn head_menu">投稿</button></a>
      <a href="{{ route('favorite.index') }}"><button type="button" class="btn head_menu">お気に入り</button></a>
      <a href="{{ route('shop.index') }}"><button type="button" class="btn head_menu">店舗一覧・新規追加</button></a>
      <a href="{{ route('shop.adminsearch') }}"><button type="button" class="btn head_menu">店舗検索</button></a>
      <a href="{{ route('shopcategory.index') }}"><button type="button" class="btn head_menu">カテゴリー
      </button></a>
      <a href="{{ route('place.index') }}"><button type="button" class="btn head_menu">市町村</button></a>
      <a href="{{ route('admin.logout') }}"><button type="button" class="btn head_menu btn_logout">Logout</button></a>
    </div>
  </div>
    <h1>@yield('title')</h1>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>