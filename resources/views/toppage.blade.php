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
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
        .ranking_space{width:70vw;}
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
        .logo{width:250px;}
        .nav_area_wrap{display:flex;flex-wrap:wrap; margin-top: 20px;}
        .nav_info{display:flex; flex-flow: column; flex-direction: row; margin-left: 30px; }
        .top_text{font-size: 22px; color: #616161;}
        .center{margin: 0 auto 0 auto;}
        .col-md-3{width:33%;}
        .footer{width: 100vw;}
        .center_contents{margin:0px auto 20px auto;}
        .main{margin-bottom: 150px;}
        .footer{margin-top: 150px;}
        

    </style>

  </head>


  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-inline-flex" href="/top"><img class="d-inline-block logo" src="/assets/img/gallery/NARAmencomi_logo02.png" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
            <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
              <div class="nav_area_wrap">
              <p class="mb-0 fw-bold text-lg-center nav_info"><a href="/top#search"><i class="fas fa-search text-warning mx-2"></i>お店を探す </a></p>
              <p class="mb-0 fw-bold text-lg-center nav_info"><a href=""><i class="fas fa-user text-warning mx-2"></i>会員情報 </p></a>
            </div>
            </div>
            <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0">
              <button class="btn btn-white shadow-warning text-warning" type="submit"> <i class="fas fa-user me-2"></i>Login</button>
            </form>
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
              <p class="text-200 text-center text-md-start">All rights Reserved &copy; Your Company, 2021</p>
            </div>
            <div class="col-md-6 order-1">
              <p class="text-200 text-center text-md-end"> Made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#FFB30E" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="text-200 fw-bold" href="https://themewagon.com/" target="_blank">ThemeWagon </a>
              </p>
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
    <script src="/vendors/@popperjs/popper.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/vendors/fontawesome/all.min.js"></script>
    <script src="/assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">

  </body>

</html>