@extends('layouts.admin.amaster')
@section('title', 'Galery Sayfası')
@section('keywords', 'Galery Yönetim Sayfası')
@section('description', 'Galery Yönetim Sayfası')

@section('sidebar')
    @include('admin.sidebar')

@endsection

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Galery Yönetimi</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Galery</li>
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
            <form class="col-md-5" action="/admin/galery_save" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Galery ekleme</h5>

                        <div class="form-group row">
                            <label for="fname" class="col-md-3 m-t-15">Başlık</label>
                            <div class="col-sm-9">
                                <input name="title" required="required" type="text" class="form-control" id="fname"
                                    placeholder="Başlık">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-md-3 m-t-15">Anahtar Kelime</label>
                            <div class="col-sm-9">
                                <input name="keywords" required="required" type="text" class="form-control" id="fname"
                                    placeholder="Anahtar Kelime">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">Sitede Görünüme</label>
                            <div class="col-md-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="customControlValidation1"
                                        value="Açık" name="status" checked required>
                                    <label class="custom-control-label" for="customControlValidation1">Açık</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="customControlValidation2"
                                        name="status" value="Kapalı" required>
                                    <label class="custom-control-label" for="customControlValidation2">Kapalı</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">Galery Resmi</label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <img id="uploadPreview" style="width: 200px; height: 150px;border:2px solid #555;" />
                                    <label style="border:1px solid #999;" for="uploadImage" class="btn">Resim seç</label>
                                    <input required="required" style="visibility:hidden;" id="uploadImage" type="file"
                                        name="resim" onchange="PreviewImage();" />
                                    <script type="text/javascript">
                                        function PreviewImage() {
                                            var oFReader = new FileReader();
                                            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                                            oFReader.onload = function(oFREvent) {
                                                document.getElementById("uploadPreview").src = oFREvent.target.result;
                                            };
                                        };

                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success">Ekle</button> <a href="/admin/galery_listesi/"
                                class="btn btn-secondary">Geri </a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row el-element-overlay">
            @foreach ($galeryler as $gl)
                    <div class="col-lg-3 col-md-12">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img style="height:300px;"
                                                                               src="/uploads/images/{{ $gl->image }}"
                                        alt="{{ $gl->title }}" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a
                                                    class="btn default btn-outline image-popup-vertical-fit el-link"
                                                    href="/uploads/images/{{ $gl->image }}"><i
                                                        class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link"
                                                onclick="return confirm('Resim silinsinmi?')"
                                                    href="/admin/galery/sil/{{$gl->id}}">
                                                    <i style="color:rgb(250, 101, 42);"
                                                    class="fas fa-trash-alt"> </i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-0">{{ $gl->title }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>



            @endforeach
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
@endsection
