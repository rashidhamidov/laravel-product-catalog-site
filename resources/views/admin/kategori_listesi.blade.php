@extends('layouts.admin.amaster')
@section('title', 'Kategori Sayfası')
@section('keywords', 'Kategori Yönetim Sayfası')
@section('description', 'Kategori Yönetim Sayfası')

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
                    <h4 class="page-title">Kategori Yönetimi</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kategoriler</li>
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
                            <h5 class="card-title m-b-0">Kategori Listesi</h5>
                        </div>
                        <form  method="post" action="/admin/kategori_listesi/toplusil" enctype="multipart/form-data">
                            <input  type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <div class="table-responsive">
                            
                            <input id="toplu_silme_button" disabled onclick="return confirm('Seçtiğiniz kategoriler silinsin mi?');" style="margin-left:10px;" class="btn btn-dark " type="submit" value="Seçilenleri sil" name="sub">
                            <a href="/admin/kategori_ekleme"
                                 type="button" class="btn btn-success ">Kategori Ekle</a>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Seç
                                        </th>
                                        <th scope="col">İsim</th>
                                        <th scope="col">Seviye</th>
                                        <th scope="col">Resim</th>
                                        <th scope="col">Durum</th>
                                        <th style="text-align: center;" scope="col" colspan="2">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody class="customtable">
                                    @foreach ($category as $rs)
                                        <tr style="background-color:#eef;">
                                            <th>
                                                <label class="customcheckbox">
                                                    <input onclick="check_is(this.value)" type="checkbox" class="listCheckbox" name="techno[]" value="{{ $rs->id }}" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </th>
                                            
                                            <td>{{ $rs->title }}</td>
                                            <td>Ana Kategori
                                            </td>
                                            <td><img  width="80px" height="50px;" style="border:1px solid #ccc;"src="/uploads/images/{{$rs->image}}"></td>
                                            <td>{{ $rs->status }}</td>
                                            <td style="text-align: center;"><a href="/admin/kategori_duzenle/{{ $rs->id }}"
                                                    type="button" class="btn btn-info btn-sm">Düzenle</a></td>
                                            <td style="text-align: center;"><a
                                                    onclick="return confirm('Kategori silinsin mi?');"
                                                    href="/admin/kategori/sil/{{ $rs->id }}" type="button"
                                                    class="btn btn-danger btn-sm">Sil</a></td>
                                        </tr>
                                        @foreach($alt_category as $alt)
                                            @if($alt->parent_id==$rs->id)
                                            
                                                <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input onclick="check_is(this.value)" type="checkbox" class="listCheckbox" name="techno[]" value="{{ $alt->id }}" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                
                                                <td>{{ $alt->title }}</td>
                                                <td>
                                                {{ $rs->title }}
                                                </td>
                                                <td><img  width="80px" height="50px;" style="border:1px solid #ccc;"src="/uploads/images/{{$alt->image}}"></td>
                                                <td>{{ $alt->status }}</td>
                                                <td style="text-align: center;"><a href="/admin/kategori_duzenle/{{ $alt->id }}"
                                                        type="button" class="btn btn-info btn-sm">Düzenle</a></td>
                                                <td style="text-align: center;"><a
                                                        onclick="return confirm('Kategori silinsin mi?');"
                                                        href="/admin/kategori/sil/{{ $alt->id }}" type="button"
                                                        class="btn btn-danger btn-sm">Sil</a></td>
                                            </tr>
                                            
                                            @endif
                                        @endforeach
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </form>
                        <?php  ?>
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
