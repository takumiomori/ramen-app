<html lang="ja" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>麺コミNARA | 奈良のラーメン好きのための口コミサイト</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('assets/img/favicons/mencomi_apple-touch-icon180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('assets/img/favicons/mencomi_favicon32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('assets/img/favicons/mencomi_favicon16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ secure_asset('assets/img/favicons/mencomi_favicon.ico') }}">
    <link rel="manifest" href="{{ secure_asset('/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ secure_asset('assets/img/favicons/mencomi_mstile150.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/css/6-1-6.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/theme.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('assets/css/slider.css') }}" rel="stylesheet" />
    <link href="css/app.css" rel="stylesheet">
    <style>
        body{font-size: 16pt; margin: 16px;}
        .mt{margin-top: 15px;}
        .mb{margin-bottom: 15px;}
        .mr{margin-right: 15px;}
        .mt150{margin-top: 150px;}
        .content{width: 70vw; margin: 20px auto 20px auto;}
        th{border: 1px solid gainsboro; background-color: #1c1087; color: white; padding: 10px; border-collapse:collapse;}
        td{border: 1px solid gainsboro; border-collapse:collapse; padding: 10px;}
        .alert_message{font-size: 20px; border: 2px solid red; color: red; font-weight: bold; padding: 10px;}
        .icon{width:50px;}
        .prof_space,.ranking_space,.shop_space{display:flex;flex-wrap:wrap; margin-top: 50px;}
        .prof_info{width:70%; display:flex; flex-flow: column;margin-left: 30px;}
        .image_sp{width:15vw;}
        .prof_icon{width:100%; border-radius: 200px; height: 15vw; object-fit: cover;}
        .user_name{font-size: 28px;}
        .user_id{font-size: 16px;}
        .user_status{font-size: 16px; border: 1px solid gray; color: gray; ;padding:2px 10px;
        border-radius: 22px;text-align: center; width: 140px; margin:5px 0 10px 0;}
        .normal_style{border: 1px solid gray; color: gray;}
        .gold_style{border: 1px solid #DBB400; color: white; background-color:#DBB400;}
        .silver_style{border: 1px solid #C0C0C0; color: white; background-color:#C0C0C0;}
        .bronze_style{border: 1px solid #b87333; color: white; background-color:#b87333;}
        .shop_image{width:100px;}
        .btn{background-color: #f7981b; color: whitesmoke; font-weight: bold;}
        .label{font-weight: bold; 
            text-decoration:underline 12px solid #f7981b;  text-underline-offset:-6px; }
        .label_front{font-weight: bold; 
            border-bottom: 4px solid #f7981b;   font-size: 28px; margin: 80px 0 14px 0; width: 100%; display:flex;}

        .card_group{display:flex; flex-wrap:wrap;}
        .card{ margin:5px 16px 16px 0px; box-shadow:0px 1px 3px -1px rgba(0,0,0,0.5);}
        
        .card-body{flex-grow: 1;}
        .place{margin-bottom: 10px; font-size: 18px;}
        .category_space{display:flex;flex-wrap:wrap;}
        .category{margin: 0 10px 10px 0; border: 1px solid #f7981b; color: #f7981b;padding:2px 10px;
        border-radius: 22px;text-align: center; float: left;
        font-size: 16px;}
        .star_space{display: inline-block; margin:10px 0px;}
        .card-label{display: inline-block; font-size:16px;}
        .star{display: inline-block;font-weight: bold;color: red;}
        .ranking_space{width:70vw;}
        .rank{width:100px; display:flex; flex-flow: column;margin-left: 30px;}
        .rank_img{width:30%; display:flex; flex-flow: column;margin-left: 30px;}
        .rank_info{width:35%; display:flex; flex-flow: column;margin-left: 30px;}
        .rank_num{font-size: 90px; font-style: italic; font-weight: bold; position: relative;}
        .rankshop_image{width: 100%;}
        .rank_txt{position: absolute; top: 70px; right: 10px; font-size: 30px; font-style: normal; color: gray;}
        .card_wrap{display:flex;flex-wrap:wrap; margin-top: 50px; flex-direction:row;}
        .card_userimg{width:5vw; display:flex; flex-flow: column; margin: 10px 0 0 10px;}
        .user_icon{width:100%; border-radius: 200px;  height: 5vw; object-fit: cover;}
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
        .logo{width:250px;}
        .logo:hover{opacity: 0.5 ;}
        .nav_area_wrap{display:flex;flex-wrap:wrap; margin-top: 20px;}
        .nav_info{display:flex; flex-flow: column; flex-direction: row; margin-left: 30px; }
        .nav_info:hover{opacity: 0.5 ;}
        .top_text{font-size: 22px; color: #616161;}
        .center{margin: 0 auto 0 auto;}
        .col-md-3{width:25%;}
        .footer{width: 100vw;}
        .center_contents{margin:0px auto 20px auto;}
        .main{margin-bottom: 150px;}
        .footer{margin-top: 150px;}
        .login{color: gainsboro;text-align: right; font-size: 14px;}
        .login:hover{opacity: 0.5 ;}
        .credit{color: gainsboro;text-align: left;}
        .login_btn{color: ghostwhite; margin-top: 20px;}
        .login_btn:hover{opacity: 0.5 ;}
        .register_btn{margin-right: 10px;}
        .search_nav:hover{opacity: 0.5 ;}
        .menu_area{white-space: pre-wrap;}
        .post_content{white-space: pre-wrap;}
        .card-img-top{height: 161.02px; object-fit: cover;}
        .sp_newshop{width:18rem; height:95%;}
        .ranking_mt{margin-top:200px;}
        .label_icon{width:30px; margin:auto 10px auto 0;}
        .icon_img{width:100%;}
        .custom-select{border:1.5px solid gainsboro; border-radius: 5px; padding-left: 10px;}
        .top_catch{text-align: left; padding-left:0px;}
        .card_btn{margin:0px auto; width:100%;}
        
        @media screen and (max-width: 480px) {
          .logo{width:180px;}
          .display-1{font-size:200%;}
          .top_catch{font-size:80%; text-align: center;}
          .top_title{font-size:150%;}
          .text-danger{font-size:40px;}
          .row{flex-flow:column;
          }
          .search_nav{width:100%;}
          .nav_area_wrap,.shop_space{flex-flow:column;}
          .nav_info{margin:0px auto 10px auto;}
          .sp_nav{font-size:25px; margin-bottom:14px;}
          .btn{font-size:20px;}
          .login_btn,.sp_nav_btn{margin:0px auto 0px auto;}
          .sp_btn{width:100%;}
          .content{width:100%;}
          .ranking_space{flex-flow:column; width:90%; margin:0px auto 0px auto;}
          .rank{margin:0px auto 0px auto;}
          .rank_img,.rank_info {width:100%;margin-left:0px; margin-bottom:10px;}
          .rank_info{margin-bottom:80px;}
          .star_space{margin:10px 0px;}
          .shop_name{font-size:25px; margin-bottom:14px;}
          .place{font-size:18px;}
          .category{font-size:20px;}
          .card-label{font-size:18px;}
          .footer_credit{margin:0px auto 0px auto;}
          body{width:100%;margin:0px;}
          .card_group{
            width:100%;
          }
          .card{margin:10px auto 20px auto;}
          .card-title{font-size:24px;}
          .post_card,.prof_space{margin:10px 20px;}
          .card_userimg{width:15vw;}
          .user_icon{height: 15vw; object-fit: cover;}
          .prof_space{margin-bottom:80px; flex-flow:column;}
          .label_front{margin:10px 20px; width:90%;}
          .menu_area{margin:0 20px 80px 20px; padding:10px; width:100%;}
          .shop_side{margin-bottom:80px; margin-left:0px; padding:14px; width:100%;}
          .shop_img{width:90%; margin:10px auto;}
          .btn_area{width:100%;}
          .shop_space{margin-top:0px; padding:10px;}
          .info{font-size:18px;}
          .form-control{margin:10px;}
          .content_area{margin:10px; width:90%;}
          .search_btn{margin:30px auto 0px auto; display:flex;}
          form{width:100%;}
          .custom-select{width:100%; margin:10px;}
          .sp_mt{margin-top:80px;}
          .container{margin:0px;}
          .main{margin-bottom:120px;}
          .prof_info{width:90%; margin:20px; text-align:center;}
          .user_status{margin:10px auto}
          .image_sp {width: 50vw; margin:0px auto;}
          .prof_icon{height: 50vw; object-fit: cover;}
          .sp_form{margin-left:10px;}
          .sp_btn_area{width:100%;}
          .posttext{width:100%;}
          .sp_newshop{width:80%;}
          .ranking_mt{margin-top:130px; font-size: 22.5px; padding-bottom: 3px;}
          .slick-slide{width:90%;}
          .custom-select{border:1.5px solid gainsboro; border-radius: 20px; padding-left: 10px;}
        }


    </style>

  </head>


  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-inline-flex" href="{{ route('top') }}"><img class="d-inline-block logo" src="{{ secure_asset('assets/img/gallery/NARAmencomi_logo02.png') }}" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
            <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
              <div class="nav_area_wrap">
              <p class="mb-0 fw-bold text-lg-center nav_info"><a href="https://mencomi.sakura.ne.jp/mencominara/#search" class="sp_nav"><i class="fas fa-search text-warning mx-2"></i>お店を探す </a></p>
              <p class="mb-0 fw-bold text-lg-center nav_info"><a href="{{ route('guest.page') }}" class="sp_nav"><i class="fas fa-user text-warning mx-2"></i>会員情報 </p></a>
            </div>
            </div>
            @guest
            <!-- ログインしていない場合の表示 -->
            
            
            <div class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0 sp_btn">
              <a href="{{ route('register') }}" class="sp_nav_btn">
              <button class="shadow-warning btn-white btn login_btn register_btn"> 会員登録</button></a>
            </div>

            <div class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0 sp_btn">
              <a href="{{ route('login') }}"  class="sp_nav_btn">
              <button class="shadow-warning btn-white btn login_btn" > <i class="fas fa-user me-2"></i>Login</button></a>
            </div>
            
            
            @else
            <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0 sp_btn sp_nav_btn" method="POST" action="{{ route('logout') }}">
              @csrf
                
              <button class="shadow-warning btn-white btn login_btn " type="submit"> <i class="fas fa-user me-2"></i>Logout</button>
            </form>
            @endguest
          </div>
        </div>
      </nav>
    </main>
      
      <div class="main">
        @yield('main')
      </div>
      <div class="content">
        @yield('content')
      </div>


      <div class="footer">


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <main>

      
      <section class="py-0 pt-7 bg-1000">

        <div class="container">


          <div class="row flex-center pb-3">
            <div class="col-md-6 order-0">
              <p class="text-200 text-center text-md-start">All rights Reserved &copy; mencomi, 2024</p>
              <br><span style="margin:15px 15px 15px 15px" class="footer_credit"><a href="https://developer.yahoo.co.jp/sitemap/" class="credit">Web Services by Yahoo! JAPAN</a></span>
            </div>
            <div class="col-md-6 order-1">
              <p class="text-200 text-center text-md-end"> Made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#FFB30E" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="text-200 fw-bold" href="https://themewagon.com/" target="_blank">ThemeWagon </a>
              </p>
              <a href="{{ route('admin.login') }}"><div class="login">管理者ログイン</div></a>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
    </main>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ secure_asset('vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ secure_asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/{{ secure_asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/theme.js') }}"></script>
    

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/js/6-1-6.js"></script>
    <script src="{{ secure_asset('assets/js/slider.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">

  </body>

</html>