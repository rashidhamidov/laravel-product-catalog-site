@extends('layouts.home.fmaster')
@section('title')
    {{ $kurumsal->title }}
@endsection
@section('keywords')
    {{ $kurumsal->keywords }}
@endsection
@section('description')
    {{ $kurumsal->description }}
@endsection
@section('slider')
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="hero__caption hero__caption2">
                                <h1  data-animation="fadeInUp" data-delay=".4s"
                                >{{$kurumsal->title}}</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                        <li class="breadcrumb-item">{{$kurumsal->title}}</li>
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

@if (session('success'))
    <div class="alert">{{ session('success') }} </div>
@endif


@section('content')


    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="section-top-border">
                <h3 style="font-size: 40px;" class="mb-30">{{ $kurumsal->description }}</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote">
                            <img width="400px"align="right"src="/uploads/images/{{ $kurumsal->image }}" alt="{{ $kurumsal->title }}">
                            {!! $kurumsal->content !!}

                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
