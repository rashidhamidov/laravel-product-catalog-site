@extends('layouts.admin.amaster')
@section('title','User Sayfası')
@section('keywords','User Yönetim Sayfası')
@section('description','User Yönetim Sayfası')

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
                <h4 class="page-title">User Yönetimi</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Ana Sayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
            <form action="/admin/user/duzenle/save/{{$user[0]->id}}" method="POST" enctype="multipart/form-data">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">User düzenleme : {{$user[0]->name}}</h5>

                    <div class="form-group row">
                        <label for="fname" class="col-md-3 m-t-15">İsim Soyisim</label>
                        <div class="col-sm-9">
                            <input name="name" required="required" type="text" class="form-control" id="fname" value="{{$user[0]->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-md-3 m-t-15">Email</label>
                        <div class="col-sm-9">
                            <input name="email" required="required" type="email" class="form-control" id="fname" value="{{$user[0]->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Profil Resmi</label>
                        <div class="col-md-6">
                            <div class="custom-file">
                                <img id="uploadPreview" style="width: 200px; height: 150px;background-size:100% 100%;border:2px solid #555;" src="/uploads/images/{{$user[0]->image}}" />
                                <label style="border:1px solid #999;" for="uploadImage" class="btn">Resim seç</label>
                                <input style="visibility:hidden;"id="uploadImage" type="file" value="{{$user[0]->image}}"name="resim" onchange="PreviewImage();" />
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
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-info">Güncelle</button>
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
