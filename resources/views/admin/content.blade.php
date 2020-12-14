@section('content')

    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Ana Sayfa</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Siteyi Görüntüle</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:white;" href="/">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white">Zemin Parke</h1>
                                <h6 class="text-white">www.zeminparke.com.tr </h6>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:white;" href="/admin/kategori_listesi">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="fas fa-sitemap"></i></h1>
                                <h6 class="text-white">Kategoriler</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:rgb(255, 255, 255);" href="/admin/kurumsal_listesi">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class=" fas fa-book"></i></h1>
                            <h6 class="text-white">Kurumsal</h6>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:rgb(255, 255, 255);" href="/admin/video_listesi">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="fas fa-film"></i></h1>
                            <h6 class="text-white">Video</h6>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:rgb(255, 255, 255);" href="/admin/slider_listesi">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class=" far fa-play-circle"></i></h1>
                            <h6 class="text-white">Slider</h6>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:rgb(255, 255, 255);" href="/admin/icerik_listesi">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class=" fas fa-th"></i></h1>
                                <h6 class="text-white">İçerikler</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:rgb(255, 255, 255);" href="/admin/galery_listesi">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="fas fa-images"></i></h1>
                                <h6 class="text-white">Galery</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:rgb(255, 255, 255);" href="/admin/ayar_duzenle">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="fas fa-cogs"></i></h1>Ayarlar
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:rgb(255, 255, 255);" href="/admin/referans_listesi">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="far fa-handshake"></i></h1>
                                <h6 class="text-white">Referanslar</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <a style="color:rgb(255, 255, 255);" href="/logout">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="fas fa-share-square"></i></h1>
                                <h6 class="text-white">Çıkış</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("admin.footer")
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->


@endsection
