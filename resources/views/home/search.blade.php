@extends('layouts/home.fmaster')

@section('title')
    {{ $aranan_kelime }}
@endsection
@section('keywords')
    {{ $aranan_kelime }}
@endsection
@section('description')
    {{ $aranan_kelime }}
@endsection

@section('content')
    <!--? Properties Start -->
    <section class="blog_area section-padding">
        <div class="container">
            <h1> {{ $aranan_kelime }} &nbsp; (<span style="color:#f88f54;">{{$sayi}}</span>) </h1>
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
                            <h4 class="widget_title" style="color: #2d2d2d;">Kategoriler</h4>
                            <ul class="list cat-list">
                                <?php $sidebar_cat=DB::select('select * from category where status = ? and
                                parent_id=?',
                                    ["Açık",0]);
                                foreach($sidebar_cat as $ct){ ?>
                                <li>
                                    <a href="/Kategoriler/{{$ct->id}}" class="d-flex">
                                        <p>{{ $ct->title }} &nbsp;(</p>
                                        <p><?php echo DB::select('select count(*)as sayi from content where category_id
                                         = ?
                                        and status=?',
                                                [$ct->id,"Açık"])[0]->sayi;
                                            ?>)</p>
                                    </a>
                                </li>
                                <?php } ?>
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
                                @if($sayi==0)
                                    <p style="margin-left: 10%;width:100%;">&nbsp; Aramanıza Uygun
                                        Ürün
                                        Yok</p>
                                @endif
                                @foreach($iceriks as $urun)
                                <div class="row" align="center" style="float: left;margin:0 10px 0 10px;height:320px;" >

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="single-new-arrival mb-50 text-center">
                                                <div class="popular-img">
                                                    <a href="/urun_detail/{{$urun->id}}"> <img class="urun_image"
                                                                                              style="height:
                                                    200px;"
                                                                                              src="/uploads/images/{{$urun->image}}" alt="{{$urun->title}}"></a>
                                                </div>
                                                <style>
                                                    .urun_image{
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

                            <!-- Card two -->

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