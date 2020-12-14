@extends('layouts/home.fmaster')

@section('title')
    {{ $kategori->title }}
@endsection
@section('keywords')
    {{ $kategori->title }}
@endsection
@section('description')
    {{ $kategori->title }}
@endsection
@section('content')
    <!--? Properties Start -->
    <section class="blog_area section-padding">
        <div class="container">
            <a style="color:#888;" href="/Kategoriler">Kategoriler</a>&nbsp;|<a
                    style="color:#888;"
                                                                                            href="/Kategoriler/{{$ana_kategori->id}}">{{$ana_kategori->title}}</a>&nbsp;|<a> {{
            $kategori->title }}
                &nbsp; (<span
                        style="color:#f88f54;
">{{$sayi}}</span>)
            </a>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form method="POST" action="/search">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="aranan_kelime" type="text" class="form-control" placeholder='Ürün İsmi Gir'
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Ürün İsmi Gir'">
                                        <div class="input-group-append">
                                            <button class="btns" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Ara</button>
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title" style="color: #2d2d2d;">Alt Kategoriler</h4>
                            <ul class="list cat-list">
                                @foreach($sidebar_cat as $ct)
                                <li>
                                    <a href="/Urunler/{{ $ct->title }}/{{$ct->id}}" class="d-flex">
                                        <p>{{ $ct->title }} &nbsp;(</p>
                                        <p>{{ DB::select('select count(*)as sayi from content where category_id
                                         = ?
                                        and status=?',
                                                [$ct->id,"Açık"])[0]->sayi
                                            }})</p>
                                    </a>
                                </li>
                                    @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-8 mb-5 mb-lg-0">

                    <div class="row">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div  class="tab-pane fade show active" id="populer"
                                  role="tabpanel"
                                  aria-labelledby="nav-Sofa-tab">
                                <div style="margin:20px;">
                                <h1>{{$ana_kategori->title}} &nbsp;"{{$kategori->title }}" Ait Ürünler</h1></div>

                                @if($sayi==0)
                                    <p style="margin-left: 10%;width:100%;">&nbsp; Bu Kategoride Ürün
                                        Bulunmamaktadır</p>
                                @endif
                                @foreach($iceriks as $urun)
                                    <div class="row" align="center" style="float: left;margin:0 10px 0 10px;
                                    height:320px;" >

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="single-new-arrival mb-50 text-center">
                                                <div class="popular-img">
                                                    <a href="/uploads/images/{{$urun->image}}" class="img-pop-up">
                                                        <div  class="single-gallery-image"
                                                              style="background:url('/uploads/images/{{$urun->image}}');"></div>
                                                    </a></div>
                                                <style>
                                                    .single-gallery-image{
                                                        width:200px;
                                                    }
                                                </style>
                                                <div class="popular-caption">
                                                    <br>
                                                    <h3 style="width:200px;"><a
                                                                href="/urun_detail/{{$urun->id}}">{{$urun->title}}</a></h3>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <!-- Card three -->


                            <!-- Card FOUR -->

                            <!-- Card FIVE -->

                            <!-- Card SIX -->

                        </div>
                        <!-- End Nav Card -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Area End -->

@endsection