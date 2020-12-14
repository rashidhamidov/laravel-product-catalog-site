<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $category= DB::select('select * from category where status = ? and parent_id=?', ['Açık',0]);
        $icerik=DB::select('select * from content where status = ?', ['Açık']);
        $setting= DB::select('select * from setting where id = ?', [1]);
        $kurumsal=DB::select('select *from sayfa where status=?',['Açık']);
        $slider=DB::select('select * from slider where status = ?', ['Açık']);
        $video=DB::select('select * from video where status = ?', ['Açık']);
        $galery=DB::select('select * from galery where status = ?', ['Açık']);

        return view('home.home',[
            'category'=>$category,
            'setting'=>$setting,
            'kurumsal'=>$kurumsal,
            'slider'=>$slider,
            'icerik'=>$icerik,
            'video'=>$video,
            'galery'=>$galery
        ]);
    }
    public function kategori(){
        $category= DB::select('select * from category where status = ? and parent_id=?', ['Açık',0]);
        $icerik=DB::select('select * from content where status = ?', ['Açık']);
        $setting= DB::select('select * from setting where id = ?', [1]);
        $kurumsal=DB::select('select *from sayfa where status=?',['Açık']);
        $video=DB::select('select * from video where status = ?', ['Açık']);
        $galery=DB::select('select * from galery where status = ?', ['Açık']);

        return view('home.kategori',[
            'category'=>$category,
            'setting'=>$setting,
            'kurumsal'=>$kurumsal,
            'icerik'=>$icerik,
            'video'=>$video,
            'galery'=>$galery
        ]);
    }
    public function iletisim()
    {
        $setting= DB::select('select * from setting where id = ?', [1]);
        return view('home.iletisim',[
            'setting'=>$setting
        ]);

    }
    public function galery()
    {
        $galery= DB::select('select * from galery where status = ?', ['Açık']);
        return view('home.galery',[
            'galery'=>$galery
        ]);

    }
    public function iletisim_send(Request $request)
    {
        $data=$request->input();
        $setting= DB::select('select *from setting where id = ?', [1]);
        Mail::send("home.mail_icerik",["data"=>$data
        ],function ($message){
            $setting= DB::select('select *from setting where id = ?', [1]);
            $mail_address=$setting[0]->email;
            $message->to( $mail_address,"Zemin Parke")->subject("İletişim Form Mesajı");
        });
        return redirect('/iletisim')->with('success','Mailiniz '.$setting[0]->email .' adresine gönderilmiştir. ');
    }
    public function referans()
    {
        $setting= DB::select('select * from setting where id = ?', [1]);
        $referans= DB::select('select * from referans where status = ?', ['Açık']);
        return view('home.referans',[
            'referans'=>$referans,
            'setting'=>$setting
        ]);

    }
    public function  urunler($id){
        $cat=DB::select('select * from category where id = ? LIMIT 1', [$id]);
        $setting= DB::select('select * from setting where id = ?', [1]);
        $alt_kategoriler =DB::select('select *from category where status=? and parent_id=?',['Açık',$id]);
        return view('home.urunler',[
            'alt_kategoriler'=>$alt_kategoriler,
            'setting'=>$setting,
            'cat'=>$cat

        ]);
    }

    public function search(Request $request)

    {
        $data=$request->input();
        $aranan_kelime=$data['aranan_kelime'];
        $setting= DB::select('select * from setting where id = ?', [1]);
        $urunler =DB::select('select *from content where status=?',['Açık']);
        $iceriks= DB::table('content')
            ->where([
                ['title', 'like','%'.$aranan_kelime.'%'],
                ['status','=','Açık']
            ])
            ->get();
        $populer =DB::select('select *from content where status=? ORDER BY tarih DESC LIMIT 10',['Açık']);
        $sayi=$iceriks->count();
        return view(
            'home.search',[
            'aranan_kelime'=>$aranan_kelime,
            'setting'=>$setting,
            'iceriks'=>$iceriks,
            'urunler'=>$urunler,
            'populer'=>$populer,
            'sayi'=>$sayi
        ]);

    }
    public function kategori_sayfa($title,$id)

    {

        $kategori=DB::select('select * from category where id = ?', [$id])[0];
        $setting= DB::select('select * from setting where id = ?', [1]);
        $sidebar_cat=DB::select('select * from category where parent_id = ?', [$kategori->parent_id]);
        $ana_kategori=DB::select('select * from category where id = ?', [$kategori->parent_id])[0];
        $iceriks= DB::table('content')
            ->where([
                ['category_id', '=',$id],
                ['status','=','Açık']
            ])
            ->get();
        $sayi=$iceriks->count();
        return view(
            'home.categories',[
            'kategori'=>$kategori,
            'setting'=>$setting,
            'iceriks'=>$iceriks,
            'sayi'=>$sayi,
            'sidebar_cat'=>$sidebar_cat,
            'ana_kategori'=>$ana_kategori

        ]);

    }
    public function icerik_sayfa($id)
    {

        $icerik=DB::select('select * from content where id = ? and status=?', [$id,'Açık']);
        $icerik=$icerik[0];
        $kategori=DB::select('select * from category where id = ?', [$icerik->category_id])[0];
        $ana_kategori=DB::select('select * from category where id = ?', [$kategori->parent_id])[0];
        $iceriks= DB::table('content')
            ->where([
                ['category_id', '=',$kategori->id],
                ['status','=','Açık'],
                ['id','!=',$id]
            ])
            ->get();
        $sayi=$iceriks->count();
        $sidebar_cat=DB::select('select * from category where parent_id = ?', [$kategori->parent_id]);
        return view('home.icerik',[
            'kategori'=>$kategori,
            'icerik'=>$icerik,
            'ana_kategori'=>$ana_kategori,
            'iceriks'=>$iceriks,
            'sayi'=>$sayi,
            'sidebar_cat'=>$sidebar_cat
        ]);

    }
    public function kurumsal_sayfa($id)
    {

        $kurumsal=DB::select('select * from sayfa where id = ? and status=?', [$id,'Açık']);
        $kurumsal=$kurumsal[0];

        return view('home.kurumsal',[
            'kurumsal'=>$kurumsal
        ]);

    }
}
