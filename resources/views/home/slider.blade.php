@section('slider')

    <!--? slider Area Start-->
<div class="slider-area ">
    <div class="slider-active">

        @foreach($slider as $rs)
        <div class="single-slider hero-overly1 slider-height d-flex align-items-center slider-bg1" style="background:
         url('/uploads/images/{{ $rs->image }}');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-8">
                        <div class="hero__caption">
                            <span>{{ $rs->title }}</span>
                            <h1 data-animation="fadeInUp" data-delay=".4s" >{{ $rs->description }}</h1>
                            <p data-animation="fadeInUp" data-delay=".6s"></p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInUp" data-delay=".7s">
                                <a href="/iletisim" class="btn hero-btn">Daha Fazla</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
    <style>
        .slider-area{
            overflow: hidden!important;
        }
        .slider-area .hero__caption {
            background-color: rgba(1,1,1,0.56);
        }
        .slider-area .hero__caption span{
            color:white!important;
        }.slider-area .hero__caption h1{
            color:white!important;
        }.slider-area .hero__caption .btn{
            background-color: #bb1111;
        }

    </style>
<!-- slider Area End-->
    @endsection