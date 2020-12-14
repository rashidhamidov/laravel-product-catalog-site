<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //slider listesi
    public function slider_listesi(){
        $sliderler = DB::select('select *from slider');

        return view('admin.slider_listesi', ['sliderler' => $sliderler]);
    }



    //slider ekleme
    public function slider_ekleme(){

        return view('admin.slider_ekleme');
    }



    public function slider_save (Request $request){

             $data = $request->input();
            if($request->hasfile('resim')){
                $file=$request->file('resim');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/uploads/images',$name);
            }
            else{
                $name='bos_resim';
            }
            try{
            DB::table('slider')->insert([
                'keywords'=>$data['keywords'],
                'description'=>$data['description'],
                'title'=>$data['title'],
                'image'=>$name,
                'status'=>$data['status'],
                'tarih'=>date('d.m.Y H:i')
            ]);
            return redirect('/admin/slider_listesi')->with('success',"Slider başarıyla eklendi");
        }catch(Exception $e){
            return redirect('/admin/slider_ekleme')->with('failed',"Slider eklenemedi");
        }

    }


    
    public function slider_duzenle_save (Request $request,$id){

        $data = $request->input();
       if($request->hasfile('resim')){
            $sliders = DB::select('select * from slider where id = ?',[$id]);
            $slider_yolu=public_path().'/uploads/images/'.$sliders[0]->image;
            if(file_exists($slider_yolu)){
                unlink($slider_yolu);
            }
            
           $file=$request->file('resim');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/uploads/images',$name);
       }
       else{
        try{
            DB::update('update slider set keywords=?,description=?,title=?,status=?,tarih=? where id = ?',
            [$data['keywords'],$data['description'],$data['title'],$data['status'],date('d.m.Y H:i'),$id ]);
        
            return redirect('/admin/slider_listesi')->with('success',"Slider başarıyla güncellendi");
            }catch(Exception $e){
                return redirect('/admin/slider_listesi')->with('failed',"Slider güncellenemedi");
            }
            
         }
       try{
            DB::update('update slider set keywords=?,description=?,title=?,image=?,status=?,tarih=? where id = ?',
            [$data['keywords'],$data['description'],$data['title'],$name,$data['status'],date('d.m.Y H:i'),$id ]);
        
            return redirect('/admin/slider_listesi')->with('success',"Slider başarıyla güncellendi");
   }catch(Exception $e){
       return redirect('/admin/slider_listesi')->with('failed',"Slider güncellenemedi");
   }

}

    public function slider_duzenle($id) {
        $sliders = DB::select('select * from slider where id = ?',[$id]);
        return view('admin.slider_duzenle',[
            'slider'=>$sliders
             ]);
        }
    public function slider_sil($id) {
        $sliders = DB::select('select * from slider where id = ?',[$id]);

        $slider_yolu=public_path().'/uploads/images/'.$sliders[0]->image;
        try{
            if(file_exists($slider_yolu)){
                unlink($slider_yolu);
            }
        }catch(Exception $es){

        }
        
        $sliders = DB::delete('delete  from slider where id = ?',[$id]);
        if($sliders){
            return redirect('/admin/slider_listesi')->with('success',"Slider başarıyla silindi");
        }
        
        else{
            return redirect('/admin/slider_listesi')->with('failed',"Slider silinemedi!!!");    
        }
        } 
        
        public function slider_listesi_sil(Request $request) {

            if (isset($_POST['sub'])) {
                //connection string
                $checkbox1 = $_POST['techno'];
                foreach ($checkbox1 as $chk1) {
                    $sliders = DB::select('select * from slider where id = ?',[$chk1]);
                    $slider_yolu=public_path().'/uploads/images/'.$sliders[0]->image;
                    try{
                        if(file_exists($slider_yolu)){
                         unlink($slider_yolu);
                        $silindimi = DB::delete('delete  from slider where id = ?',[$chk1]);
                        }
                    }catch(Exception $es){

                    }
                }
                if($silindimi){
                    return redirect('/admin/slider_listesi')->with('success',"Seçilmiş sliderler başarıyla silindi");
                }
                else{
                    return redirect('/admin/slider_listesi')->with('failed',"Seçilmiş sliderler silinemedi!!!");    
                }
                } 
                    return redirect('/admin/slider_listesi')->with('failed',"Yanlış işlem!!!");   
                }
    
}
