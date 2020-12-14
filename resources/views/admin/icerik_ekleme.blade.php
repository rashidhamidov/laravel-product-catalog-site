@extends('layouts.admin.amaster')
@section('title','Ürün Sayfası')
@section('keywords','Ürün Yönetim Sayfası')
@section('description','Ürün Yönetim Sayfası')

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
                <h4 class="page-title">Ürün Yönetimi</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Ana Sayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ürün</li>
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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('status') }}
                </div>
                @elseif(session('failed'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('failed') }}
                </div>
                @endif
            <form action="/admin/icerik_save" method="POST" enctype="multipart/form-data">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">İçerik ekleme</h5>
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15">Ürün Tipi</label>
                        <div class="col-md-9">

                            <select name="category" required="required"class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                @foreach ($category as $rs)
                                    <option style="color:#fff;background-color:#999;" value="{{$rs->id}}" disabled>{{$rs->title}}</option>
                                    <option  value="" disabled>Kategoriler</option>
                                    @foreach($alt_category as $alt)
                                    @if($alt->parent_id==$rs->id)
                                    <option style="color:#001;" value="{{$alt->id}}">&nbsp;&nbsp;&nbsp;{{strtoupper($alt->title)}}</option>
                                    @endif
                                    @endforeach
                                @endforeach


                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-md-3 m-t-15">Başlık</label>
                        <div class="col-sm-9">
                            <input name="title" required="required" type="text" class="form-control" id="fname" placeholder="Başlık">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-md-3 m-t-15">Anahtar Kelime</label>
                        <div class="col-sm-9">
                            <input name="keywords" required="required" type="text" class="form-control" id="fname" placeholder="Anahtar Kelime">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-md-3 m-t-15">Kısa açıklama</label>
                        <div class="col-sm-9">
                            <input name="description" required="required" type="text" class="form-control" id="fname" placeholder="Açıklama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Sitede Görünüme</label>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation1" value="Açık" name="status" checked required>
                                <label class="custom-control-label" for="customControlValidation1">Açık</label>
                            </div>
                             <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="status" value="Kapalı"  required>
                                <label class="custom-control-label" for="customControlValidation2">Kapalı</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Ürün Resmi</label>
                        <div class="col-md-6">
                            <div class="custom-file">
                                <img id="uploadPreview" style="width: 200px; height: 150px;border:2px solid #555;" />
                                <label style="border:1px solid #999;" for="uploadImage" class="btn">Resim seç</label>
                                <input required="required" style="visibility:hidden;"id="uploadImage" type="file" name="resim" onchange="PreviewImage();" />
                                        <script type="text/javascript">

                                            function PreviewImage() {
                                                var oFReader = new FileReader();
                                                oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                                                oFReader.onload = function (oFREvent) {
                                                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                                                };
                                            };

                                        </script>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="disabledTextInput">Ürün Detayı</label>
                        <div class="col-md-9">
                        <textarea required="required" name="content"></textarea>
                                <script>
                                        CKEDITOR.replace( 'content' );
                                </script>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success">Ekle</button>  <a href="/admin/icerik_listesi/" class="btn btn-secondary">Geri </a>
                    </div>
                </div>
            </div>
        </form>
        </div>
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
