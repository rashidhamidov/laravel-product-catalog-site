@extends('layouts.home.fmaster')
@section('title')
    {{ 'Galeri' }}
@endsection
@section('keywords')
    {{ 'Galeri' }}
@endsection
@section('description')
    {{ 'Galeri' }}
@endsection

@extends('flash-message')
@section('slider')
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="fadeInUp" data-delay=".4s" >GALERİ</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                        <li class="breadcrumb-item">Galeri</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
@endsection

@section('content')
    <div class="whole-wrap">
        <div class="container box_1170">
    <div class="section-top-border">
        <h3>Zemin Parke Galeri</h3>
        <div class="row gallery-item">
            @foreach ($galery as $gl)
                <div class="col-md-4">
                    <a href="/uploads/images/{{$gl->image}}" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url('/uploads/images/{{$gl->image}}');"
                             alt="{{$gl->title}}"
                        ></div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    </div>
    </div>
    <!-- ================ contact section end ================= -->
@endsection
