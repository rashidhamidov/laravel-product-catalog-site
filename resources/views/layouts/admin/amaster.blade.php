<?php
    if(!Auth::check())
      Auth::logout();

      ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('title')">
    <meta name="author" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/admin/assets/images/logo-icon.png">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link href="/assets/admin/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/admin/assets/extra-libs/multicheck/multicheck.css">
    <link href="/assets/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/assets/admin/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="/assets/admin/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="/assets/admin/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="/admin">
                        <!-- Logo icon -->

                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="/assets/admin/assets/images/logo-text.png" alt="homepage" class="light-logo" />

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">

                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->



                        <h4 style="color:rgb(255, 255, 255);margin-top:20px;margin-left:10px;text-shadow:0 2px 8px rgb(97, 0, 0);">
                            Hoş geldiniz sayın <span style="color:"></span> {{ Auth::user()->name }}
                        </h4>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img style="border: 2px solid white;
                            width:50px;height:47px;" src="/uploads/images/{{ Auth::user()->image }}" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">

                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                    <div class="m-l-10">
                                                    <h5 class="m-b-0">{{ Auth::user()->name }}</h5>
                                                        <span class="mail-desc">{{ Auth::user()->email }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i class="fas fa-sign-out-alt"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0"> {{ __('Logout') }}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>

        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->


        <!-- success message -->
        <style>

            #hata_mesaji{
               width:30%;
               background-color:rgba(84, 158, 69, 0.88);
               position:absolute;
               top: 200px;
               left:-1400px;
               padding:10px;
               font:bold 17px verdana;
               display:block;
               box-shadow:0 2px 8px 2px rgb(0, 0, 0);
               text-shadow: 2px 2px 6px rgba(145, 6, 6, 0.56);
               color:#fdffa8;
               z-index: 9999;
               border-radius: 4px;
               transition: 0.4s;
            }
            @media only screen and (max-width:600px){
                #hata_mesaji{
                    width:80%;
                    left:-1000px;
                }
            }



               </style>

        <script>

            function hata_mesaji(){
                setTimeout(function girme(){
                    document.getElementById("hata_mesaji").style.left="20px";
                },500);

                setTimeout(function itme(){
                    document.getElementById("hata_mesaji").style.left="-1200px";
                },4000);
            }
            var i=[];
            function check_is(a){
                if(i.length==0){
                    i.push(a);
                    document.getElementById("toplu_silme_button").disabled=false;
                    document.getElementById("toplu_kategori").disabled=false;

                }
                else {
                    var s=i.indexOf(a)

                    if(s>=0){
                        i.splice(s, 1);
                        if(i.length==0){
                        document.getElementById("toplu_silme_button").disabled=true;
                        document.getElementById("toplu_kategori").disabled=true;

                        }
                    }
                    else{
                        i.push(a);
                    }
                }
            }

            </script>
        <div id="hata_mesaji">
            @if(session('success'))
                {{session('success')}}
                <script> hata_mesaji();</script>
            @endif
            @if (session('failed')){{session('failed')}}
            <script>
                document.getElementById("hata_mesaji").style.backgroundColor="#e46821";
                hata_mesaji();

                </script>
            @endif

            </div>




    <!--sidebar-menu-->
    @yield('sidebar')
    @yield('content')<!--content -->






</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/assets/admin/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/assets/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/assets/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="/assets/admin/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="/assets/admin/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/assets/admin/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="/assets/admin/dist/js/custom.min.js"></script>

<script src="/assets/admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="/assets/admin/assets/libs/magnific-popup/meg.init.js"></script>

    <script src="/assets/admin/assets/libs/moment/min/moment.min.js"></script>
    <script src="/assets/admin/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/assets/admin/dist/js/pages/calendar/cal-init.js"></script>



<script src="/assets/admin/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="/assets/admin/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="/assets/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>


<script src="/assets/ckeditor/ckeditor.js"></script>

</body>
</html>
