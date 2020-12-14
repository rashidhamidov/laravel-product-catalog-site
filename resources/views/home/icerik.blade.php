@extends('layouts.home.fmaster')
@section('title')
    {{ $icerik->title }}
@endsection
@section('keywords')
    {{ $icerik->keywords }}
@endsection
@section('description')
    {{ $icerik->description }}
@endsection
@if (session('success'))
    <div class="alert">{{ session('success') }} </div>
@endif
@section('content')
    <!--? Properties Start -->
    <section class="blog_area section-padding">
        <div class="container">
            <a style="color:#888;" href="/Kategoriler/{{$ana_kategori->id}}">{{$ana_kategori->title}}</a>&nbsp;|<a> {{
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
                        <div class="col-lg-8 posts-list">
                            <div class="single-post">
                                <div class="col-md-4">
                                    <a href="/uploads/images/{{$icerik->image}}" class="img-pop-up">
                                        <div  class="single-gallery-image"
                                              style="background:url('/uploads/images/{{$icerik->image}}');"></div><br>
                                        <a style="border:2px solid #808080;
                                z-index: 90;color:#001;
                                font:normal 30px calibri;border-radius: 3px;
                                background-color: #ddd;padding:0 3px 3px 10px;"
                                           href="/urun_detail/{{$iceriks[rand(0,$sayi-1)]->id}}"> <
                                        </a> &nbsp;&nbsp;<a style="border:2px solid #808080;
                                z-index: 90;color:#001;
                                font:normal 30px calibri;border-radius: 3px;
                                background-color: #ddd;padding:0 9px 3px 4px;"
                                                            href="/urun_detail/{{$iceriks[rand(0,$sayi-1)]->id}}"> >
                                        </a>
                                    </a>
                                    <style>
                                        .single-gallery-image{
                                            width: 400px;
                                            height:400px;
                                            -webkit-filter: drop-shadow(5px 5px 5px #000 );
                                            filter: drop-shadow(5px 5px 5px #000);
                                        }
                                        @media screen and (max-width:600px) {
                                            .single-gallery-image{
                                                width: 100%;
                                            }
                                        }
                                        .quote-wrapper table tr td{
                                            border:2px solid #aaa;
                                        }
                                    </style>
                                </div>
                                <div class="blog_details">
                                    <h2 style="color: #2d2d2d;">{{$icerik->title}}
                                    </h2>
                                    <div class="quote-wrapper">
                                        <div class="quotes">
                                            {!! $icerik->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- Blog Area End -->

@endsection
