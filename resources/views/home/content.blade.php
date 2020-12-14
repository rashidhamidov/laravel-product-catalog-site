@section('content')
    <div align="center" style="margin: 50px;">
        <h1 >Zemin Parke Ürün Kategorileri</h1>
    </div>
    <div class="cat_main">
        @foreach($category as $cat)
            <div class="cat_single">
        <div class="cat_resim">
            <a href="/Kategoriler/{{$cat->id}}">
                <img style="width:120%;height:100%;" src="/uploads/images/{{$cat->image}}" alt="{{$cat->title}}">
            </a></div>
        <div class="cat_detail">
            <a  href="/Kategoriler/{{$cat->id}}">{{$cat->title}}</a>
            {!! substr($cat->content,0,300) !!}
        </div>
            </div>
            @endforeach
    </div>

    <style>
        .cat_main a {
            color:#333;
            font-size: 18px;
        }
        .cat_main a:hover{
            color:#1976D2;
            font-size: 19px;
        }
        .cat_main img{
            transition: .5s;
        }
        .cat_main a:hover img{
            width:130%!important;
            height: 110%!important;
            transition: .5s;
        }
        .cat_main{
            position:static;
            width:70%;
            margin-left: 15%;
            overflow: hidden;
        }
       .cat_single{
           width:50%;
           height: 300px;
            float: left;
       }
       .cat_resim{
           margin:10px;
           width:45%;
           height:200px;
           float:left;
           overflow: hidden;
           border-radius: 10px;
       }
       .cat_detail{
           margin:10px;
           float:left;
           width:40%;
           height:300px;
       }
       @media (max-width:1000px){
           .cat_resim{
           margin:10px;
           width:300px;
           height:200px;
           float:left;
           overflow: hidden;
           border-radius: 10px;
       }
       .cat_single{
           width:100%;
           height: 430px;
            float: left;
       }
       .cat_detail{
           margin:10px;
           float:left;
           width:100%;
           height:300px;
       }
       }
       @media (max-width:600px){
           .cat_resim{
           margin:10px;
           width:90%;
           height:200px;
           float:left;
           overflow: hidden;
           border-radius: 10px;
       }
       .cat_single{
           width:100%;
           height: 430px;
            float: left;
       }
       .cat_detail{
           margin:10px;
           float:left;
           width:100%;
           height:300px;
       }
       }
    </style>
    @endsection