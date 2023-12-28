<html>
<head>
    <title>@yield('title')</title>
    <style>
        body{font-size: 16pt; margin: 16px;}
        h1{background-color: #1c1087;color: white; padding: 14px 0 14px 14px;}
        .content{width: 70vw; margin: 20px auto 20px auto;}
        th{border: 1px solid gainsboro; background-color: #1c1087; color: white; padding: 10px; border-collapse:collapse;}
        td{border: 1px solid gainsboro; border-collapse:collapse; padding: 10px;}
        .footer{text-align: right; color: thistle; margin-right: 20px}
        .alert_message{font-size: 20px; border: 2px solid red; color: red; font-weight: bold; padding: 10px;}
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <h1>@yield('title')</h1>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>