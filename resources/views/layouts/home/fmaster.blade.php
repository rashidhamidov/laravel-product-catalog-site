<?php
$kurumsal=DB::select('select*from sayfa where status=?',['Açık']);
$category=DB::select('select*from category where status=? and parent_id=?',['Açık',0]);
$setting = DB::select('select*from setting where id=?',[1]);
$galery= DB::table('galery')->where('status', 'Açık')->take(6)->get();
$referans=DB::select('select *from referans where status =?',['Açık']);

?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title >
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="/uploads/images/{{$setting[0]->logo}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/home/assets//css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/home/assets//css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/home/assets//css/slicknav.css">
    <link rel="stylesheet" href="/assets/home/assets//css/flaticon.css">
    <link rel="stylesheet" href="/assets/home/assets//css/progressbar_barfiller.css">
    <link rel="stylesheet" href="/assets/home/assets//css/lightslider.min.css">
    <link rel="stylesheet" href="/assets/home/assets//css/price_rangs.css">
    <link rel="stylesheet" href="/assets/home/assets//css/gijgo.css">
    <link rel="stylesheet" href="/assets/home/assets//css/animate.min.css">
    <link rel="stylesheet" href="/assets/home/assets//css/animated-headline.css">
    <link rel="stylesheet" href="/assets/home/assets//css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/home/assets//css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/home/assets//css/themify-icons.css">
    <link rel="stylesheet" href="/assets/home/assets//css/slick.css">
    <link rel="stylesheet" href="/assets/home/assets//css/nice-select.css">
    <link rel="stylesheet" href="/assets/home/assets//css/style.css">
    <!-- WhatsApp ekleme -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "{{$setting[0]->whatsapp}}", // WhatsApp numarası
                call_to_action: "Merhaba, nasıl yardımcı olabilirim?", // Görüntülenecek yazı
                position: "left", // Sağ taraf için 'right' sol taraf için 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- WhatsApp ekleme -->


</head>
<body>
<!-- ? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="/uploads/images/{{$setting[0]->logo}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start-->
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row menu-wrapper align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="/uploads/images/{{$setting[0]->logo}}" alt=""></a>
                        </div>
                        <style>
                            .logo2 img {
                                margin: 5px;
                                 width:120px;
                                 height:120px;
                                -webkit-filter: drop-shadow(5px 5px 5px #fff );
                                filter: drop-shadow(5px 5px 5px #fff);
                             }
                            .logo img {
                                margin: 5px;
                                -webkit-filter: drop-shadow(5px 5px 5px #fff );
                                filter: drop-shadow(5px 5px 5px #fff);
                                width:140px!important;
                                height:140px;
                            }
                        </style>
                        <!-- Logo-2 -->
                        <div class="logo2">
                            <a href="/"><img src="/uploads/images/{{$setting[0]->logo}}" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="/">Ana Sayfa</a></li>
                                    <li><a href="/Kategoriler">Ürünler</a></li>
                                    <li><a href="" onclick="return false">Kurumsal</a>
                                        <ul class="submenu">
                                            @foreach($kurumsal as $sf)
                                            <li><a href="/kurumsal/{{$sf->id}}">{{$sf->title}}</a></li>
                                                @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="" onclick="return false">Kategoriler</a>
                                        <ul style="width: 200px;" class="submenu">
                                            @foreach($category as $ct)
                                            <li ><a
                                                        href="/Kategoriler/{{$ct->id}}">{{$ct->title}}</a></li>
                                                @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="/galery">Galery</a></li>
                                    <li><a href="/referans">Referanslar</a></li>
                                    <li><a href="/iletisim">İletişim</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<style>
    @media only screen and (max-width: 991px) and (min-width: 768px) {
        .header-area .main-header {
            padding: 50px 10px!important;
        }
    }
    @media only screen and (max-width: 767px) and (min-width: 576px){
        .header-area .main-header {
            padding: 50px 10px!important;
        }
    }
    @media (max-width: 575px){
        .header-area .main-header {
            padding: 50px 10px!important;
        }
    }
    .header-area .menu-wrapper .main-menu ul li a{
        color:white!important;
        font:normal 18px Calibri;
    }
    .header-area .menu-wrapper .main-menu ul li ul li a{
        color:black!important;
    }
    .header-area .menu-wrapper  {
        padding:0!important;
        height: 70px!important;
    }
    .header-left{
        width:100%!important;
    }.main-menu{
        width:100%!important;
    }
    .header-area .menu-wrapper ul {
        float:right ;
    }
    .slider-area {
        padding: 0!important;
    }


</style>
<!-- header end -->

<!-- header end -->
<main>
@yield('slider')

@yield('content')





</main>
<footer>
    <div class="footer-wrapper">
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container ">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-3 col-md-8 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo mb-35">
                                    <a href="/iletisim"><img src="/uploads/images/{{$setting[0]->logo}}" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="col-lg-3 offset-lg-1">
                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                            <div class="media-body">
                                                <p><a href="tel:{{$setting[0]->phone}}">{{$setting[0]->phone}}</a></p>
                                            </div>
                                        </div>
                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                                            <div class="media-body">
                                                <p><a href="mailto:{{$setting[0]->email}}">{{$setting[0]->email}}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="{{$setting[0]->twitter}}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{$setting[0]->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{$setting[0]->instagram}}"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Sayfalar</h4>
                                <ul>
                                    <li><a href="/">Ana Sayfa</a></li>
                                    <li><a href="/iletisim">İletişim</a></li>
                                    @foreach($kurumsal as $ks)
                                    <li><a href="/kurumsal/{{$ks->id}}">{{$ks->title}}</a></li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Kategoriler</h4>
                                <ul>
                                    @foreach($category as $mn)
                                    <li><a href="/categories/{{$mn->id}}">{{$mn->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Referanslar</h4>
                                <ul>
                                    @foreach($referans as $rf)
                                    <li><a href="{{$rf->url}}">{{$rf->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Telif Hakkı &copy;<script>document.write(new Date().getFullYear());</script> Tüm
                                    hakları saklıdır | Bu site  <a
                                            href="https://www.facebook.com/rashid.hamidov.9" target="_blank">Rashid Hamidov</a>
                                    tarafından yapılmıştır.
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </div>
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<!-- Jquery, Popper, Bootstrap -->
<script src="/assets/home/assets//js/vendor/modernizr-3.5.0.min.js"></script>
<script src="/assets/home/assets//js/vendor/jquery-1.12.4.min.js"></script>
<script src="/assets/home/assets//js/popper.min.js"></script>
<script src="/assets/home/assets//js/bootstrap.min.js"></script>

<!-- Slick-slider , Owl-Carousel ,slick-nav -->
<script src="/assets/home/assets//js/owl.carousel.min.js"></script>
<script src="/assets/home/assets//js/slick.min.js"></script>
<script src="/assets/home/assets//js/jquery.slicknav.min.js"></script>

<!-- One Page, Animated-HeadLin, Date Picker , price, light-slider -->
<script src="/assets/home/assets//js/wow.min.js"></script>
<script src="/assets/home/assets//js/animated.headline.js"></script>
<script src="/assets/home/assets//js/jquery.magnific-popup.js"></script>
<script src="/assets/home/assets//js/gijgo.min.js"></script>
<script src="/assets/home/assets//js/lightslider.min.js"></script>
<script src="/assets/home/assets//js/price_rangs.js"></script>

<!-- Nice-select, sticky,Progress -->
<script src="/assets/home/assets//js/jquery.nice-select.min.js"></script>
<script src="/assets/home/assets//js/jquery.sticky.js"></script>
<script src="/assets/home/assets//js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="/assets/home/assets//js/jquery.counterup.min.js"></script>
<script src="/assets/home/assets//js/waypoints.min.js"></script>
<script src="/assets/home/assets//js/jquery.countdown.min.js"></script>
<script src="/assets/home/assets//js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="/assets/home/assets//js/contact.js"></script>
<script src="/assets/home/assets//js/jquery.form.js"></script>
<script src="/assets/home/assets//js/jquery.validate.min.js"></script>
<script src="/assets/home/assets//js/mail-script.js"></script>
<script src="/assets/home/assets//js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="/assets/home/assets//js/plugins.js"></script>
<script src="/assets/home/assets//js/main.js"></script>

</body>
</html>
