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
                            <li class="breadcrumb-item active" aria-current="page">Ürünler</li>
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
                        <h5 class="card-title m-b-0">Ürün Listesi</h5>
                    </div>
                    
                        <div class="table-responsive">
                    <a href="/admin/icerik_ekleme" type="button" class="btn btn-success ">Ürün Ekle</a>
                   
                    <form style=" float: left;height:60px;margin-left:10px; "action="/admin/icerik_listesi/category" method="POST" >
                        <input  type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        
                        <select name="sira_kategori" id="" class="select2 form-control custom-select" style="width:100px;">
                            <option value="all">Hepsi</option>
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
                         
                         <input type="submit" class="btn btn-info " value="Sırala"/>
                    </form>
                    
                    <form style=" float: left;height:60px;margin-left:10px; "action="/admin/icerik_listesi/search"
                          method="POST" >
                        <input  type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                        <input name="aranacak_kelime" id=""
                                style="width:200px;" placeholder="Ürün İsmi">
                        <input type="submit" class="btn btn-info " value="Ara"/>
                    </form>
                    <form   class="col-11"style=" float: left;margin-left:10px; "action="/admin/icerik_listesi/category_degistir" method="POST" enctype="multipart/form-data" >
                        <input  type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        
                        <select name="kategori_degis" id="" class="select2 form-control custom-select" style="width:100px;">
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
                         
                         <input id="toplu_kategori" disabled onclick="return confirm('Seçtiğiniz içeriklerin kategorisi değiştirilsin mi?');" type="submit" class="btn btn-danger " value="Seçililerin Kategorisini Değiştir"/>
                        <input id="toplu_silme_button" disabled onclick="return confirm('Seçtiğiniz içerikler silinsin mi?');" style="margin-left:10px;" class="btn btn-dark " type="submit" value="Seçilenleri sil" name="sub">
                    
                            <table class="table" >
                                <thead class="thead-light">
                                    <tr>
                                        <th>Seç
                                        </th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">İsim</th>
                                        <th scope="col">Açıklama</th>
                                        <th scope="col">Resim</th>
                                    
                                        <th scope="col">Durum</th>
                                        <th style="text-align: center;" scope="col" colspan="2">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody class="customtable">
                                    @foreach ($icerikler as $rs)
                                    <tr>
                                        <th>
                                            <label class="customcheckbox">
                                                <input onclick="check_is(this.value)" type="checkbox" class="listCheckbox" name="techno[]" value="{{ $rs->id }}" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>

                                        <td>{{$rs->category }}</td>
                                        <td>{{$rs->title}}</td>
                                        <td>{{$rs->description}}</td>
                                        <td><img  width="80px" height="50px;" style="border:1px solid #ccc;"src="/uploads/images/{{$rs->image}}"></td>

                                        <td>{{$rs->status}}</td>
                                        <td style="text-align: center;"><a  href="/admin/icerik_duzenle/{{$rs->id}}"type="button" class="btn btn-info btn-sm">Düzenle</a></td>
                                        <td style="text-align: center;"><a onclick="return confirm('İçeirk Silinsinmi?');" href="/admin/icerik/sil/{{$rs->id}}"type="button" class="btn btn-danger btn-sm">Sil</a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                             </form>
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