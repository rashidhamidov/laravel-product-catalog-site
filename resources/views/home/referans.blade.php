@extends('layouts.home.fmaster')
@section('title')
    {{ 'Referanslar' }}
@endsection
@section('keywords')
    {{ 'Referanslar' }}
@endsection
@section('description')
    {{ 'Referanslar' }}
@endsection
@if (session('success'))
    <div class="alert">{{ session('success') }} </div>
@endif
@section('slider')
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="fadeInUp" data-delay=".4s" >REFERANSLAR</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                        <li class="breadcrumb-item">Referanslar</li>
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


    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="section-top-border">
                <div class="row gallery-item">
                    @foreach ($referans as $item)
                        <div class="col-md-4">
                            <a href="{{ $item->url }}"><h3>{{ $item->title }}</h3></a>
                            <a href="/uploads/images/{{ $item->image }}" class="img-pop-up">
                                <div class="single-gallery-image" style="
                                        background: url('/uploads/images/{{ $item->image }}');"></div>
                            </a>
                            <style>
                                .single-gallery-image{
                                    background-size: 120% 120%!important;
                                    margin-bottom: 30px;
                                }
                            </style>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection