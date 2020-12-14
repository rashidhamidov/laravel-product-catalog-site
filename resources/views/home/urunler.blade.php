@extends('layouts/home.fmaster')

@section('title')
    {{ 'Zemin Parke '.$cat[0]->title }}
    @endsection
@section('keywords')
{{ 'Zemin Parke '.$cat[0]->title }}
@endsection
@section('description')
{{ 'Zemin Parke '.$cat[0]->title }}
@endsection

@section('content')

    <!-- Blog Area End -->
    <div class="whole-wrap">
        <div class="container box_1170">
            <div class="section-top-border">

                <div class="row" >
                    <div class="col-md-9" style="margin-bottom: 20px;
                    border-radius:20px;">
                    <h3 class="mb-30">{{$cat[0]->title}}</h3>
                        <div class="col-md-7">
                            {!! $cat[0]->content !!} <img  src="/uploads/images/{{$cat[0]->image}}"></div>


                    </div>
                    @foreach($alt_kategoriler as $cats)
                        <div class="col-md-5" style="margin-left: 20px;;margin-bottom: 20px;
                    border-radius:20px;">
                            <a href="/Urunler/{{$cats->title}}/{{$cats->id}}"><img  style="height: 90px;width:90px;float: left;
                            border-radius: 45px;
                            margin:5px;
                                    -webkit-filter: drop-shadow(5px 5px 5px #111 );
                                filter: drop-shadow(5px 5px 5px #111);"
                                             src="/uploads/images/{{$cats->image}}" alt=""
                                             class="img-fluid"></a>

                            <div class="col-md-9 mt-sm-20" style="float: left;margin-top: 37px;">
                                <a href="/Urunler/{{$cats->title}}/{{$cats->id}}">{{$cats->title}}</a>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <style>
            .whole-wrap a{
                color:#333;
                font-size: 18px;
            }
            .whole-wrap a:hover{
                color:#1976D2;
                font-size: 19px;
            }
            .row {
                margin-left: 100px;
            }
            @media (max-width:600px){
                .row {
                    margin-left:0px!important;
                }
            }
            @media (max-width:1110px){
                .row {
                    margin-left:200px!important;
                }
            }
            @media (max-width:991px){
                .row {
                    margin-left:0px!important;
                }
            }
        </style>
    </div>
@endsection