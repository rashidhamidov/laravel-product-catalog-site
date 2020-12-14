@extends('layouts.admin.amaster')
@section('title','Seminer Sayfası')
@section('keywords','Seminer Yönetim Sayfası')
@section('description','Seminer Yönetim Sayfası')

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
                <h4 class="page-title">Seminer Yönetimi</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Ana Sayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Seminer</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-0">Seminer Listesi</h5><a href="/admin/icerik_ekleme" style="float:right;" type="button" class="btn btn-success ">Seminer Ekle</a>
                    </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>
                                            <label class="customcheckbox m-b-20">
                                                <input type="checkbox" id="mainCheckbox" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">İsim</th>
                                        <th scope="col">Açıklama</th>
                                        <th scope="col">Resim</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">Tarih</th>
                                        <th style="text-align: center;" scope="col" colspan="2">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody class="customtable">
                                    @foreach ($seminer as $rs)
                                    <tr>
                                        <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                       
                                            
                                       
                                        <td>{{$rs->category }}</td>
                                        <td>{{$rs->title}}</td>
                                        <td>{{$rs->description}}</td>
                                        <td><img  width="80px" height="50px;" style="border:1px solid #ccc;"src="/uploads/images/{{$rs->image}}"></td>
                                        <td>{{$rs->status}}</td>
                                        <td>{{$rs->tarih}}</td>
                                        <td style="text-align: center;"><a  href="/admin/icerik_duzenle/{{$rs->id}}"type="button" class="btn btn-info btn-sm">Düzenle</a></td>
                                        <td style="text-align: center;"><a onClick="return confirm(Press a button!);" href="/admin/icerik/sil/{{$rs->id}}"type="button" class="btn btn-danger btn-sm">Sil</a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                </div>
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