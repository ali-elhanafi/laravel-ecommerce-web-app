
    <!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/homestyle/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('css/homestyle/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/homestyle/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('css/homestyle/responsive.css')}}" rel="stylesheet" />
</head>
<body class="sub_page">
<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html"><img width="250" src="images/logo.png" alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <x-home.nav-bar></x-home.nav-bar>

                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
</div>
<!-- inner page section -->
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Product Grid</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end inner page section -->
<!-- product section -->
@yield('content')
<!-- end product section -->
<!-- footer section -->
<x-home.plog-home-footer></x-home.plog-home-footer>
<!-- footer section -->
<!-- jQery -->
<script src="{{asset('js/javascript/jquery-3.4.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{asset('js/javascript/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('js/javascript/bootstrap.js')}}"></script>
<!-- custom js -->
<script src="{{asset('js/javascript/custom.js')}}"></script>
</body>
</html>
