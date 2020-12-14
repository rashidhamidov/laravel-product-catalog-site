<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferansController extends Controller
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
    //kategori_listesi
    public function referans_listesi(){
        $referans = DB::select('select *from referans');

        return view('admin.referans_listesi', ['referans' => $referans]);
    }

//referans_ekleme
public function referans_ekleme(){

    return view('admin.referans_ekleme');
}



public function referans_save (Request $request){

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
        DB::table('referans')->insert([
                    
                [
                    
                    'title'=>$data['title'],
                    'keywords'=>$data['keywords'],
                    'description'=>$data['description'],
                    'url'=>$data['Url'],
                    'status'=>$data['status'],
                    'image'=>$name
                    ]
        
    ]);
    return redirect('/admin/referans_listesi')->with('success',"Referans başarıyla eklendi");
    }catch(Exception $e){
    return redirect('/admin/referans_ekleme')->with('failed',"Referans eklenemedi");
    }

}


//referans duzenleme 
public function referans_duzenle_save (Request $request,$id){

    $data = $request->input();
       if($request->hasfile('resim')){
            $referanss = DB::select('select * from referans where id = ?',[$id]);
            $referans_yolu=public_path().'/uploads/images/'.$referanss[0]->image;
            if(file_exists($referans_yolu)){
                unlink($referans_yolu);
            }
            
           $file=$request->file('resim');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/uploads/images',$name);
       }
       else{
        try{
            DB::update('update referans set keywords=?,description=?,title=?,url=?,status=? where id = ?',
            [$data['keywords'],$data['description'],$data['title'],$data['Url'],$data['status'],$id ]);
        
            return redirect('/admin/referans_listesi')->with('success',"Referans başarıyla güncellendi");
            }catch(Exception $e){
                return redirect('/admin/referans_listesi')->with('failed',"Referans güncellenemedi");
            }
            
         }
       try{
            DB::update('update referans set keywords=?,description=?,title=?,url=?,image=?,status=? where id = ?',
               [$data['keywords'],$data['description'],$data['title'],$data['Url'],$name,$data['status'],$id ]);
        
            return redirect('/admin/referans_listesi')->with('success',"Referans başarıyla güncellendi");
   }catch(Exception $e){
       return redirect('/admin/referans_listesi')->with('failed',"Referans güncellenemedi");
   }
        

}

public function referans_duzenle($id) {
    $referans = DB::select('select * from referans where id=? ',[$id]);

    return view('admin.referans_duzenle',[

        'referans' => $referans
         ]);
    }


    public function referans_sil($id) {
        $referanss = DB::select('select * from referans where id = ?',[$id]);

        $referans_yolu=public_path().'/uploads/images/'.$referanss[0]->image;
        try{
            if(file_exists($referans_yolu))
            unlink($referans_yolu);
        }catch(Exception $es){

        }
        
        $referanss = DB::delete('delete  from referans where id = ?',[$id]);
        if($referanss){
            return redirect('/admin/referans_listesi')->with('success',"Referans başarıyla silindi");
        }
        
        else{
            return redirect('/admin/referans_listesi')->with('failed',"Referans silinemedi!!!");    
        }
        } 
        
        



        public function referans_listesi_sil(Request $request) {

            if (isset($_POST['sub'])) {
                //connection string
                $checkbox1 = $_POST['techno'];
                foreach ($checkbox1 as $chk1) {
                    $referanss = DB::select('select * from referans where id = ?',[$chk1]);
                    $silindimi = DB::delete('delete  from referans where id = ?',[$chk1]);
                    $referans_yolu=public_path().'/uploads/images/'.$referanss[0]->image;
                    try{
                        if(file_exists($referans_yolu))
                        unlink($referans_yolu);
                    }catch(Exception $es){

                    }
                }
                if($silindimi){
                    return redirect('/admin/referans_listesi')->with('success',"Seçilmiş referanslar başarıyla silindi");
                }
                else{
                    return redirect('/admin/referans_listesi')->with('failed',"Seçilmiş referanslar silinemedi!!!");    
                }
                } 
                    return redirect('/admin/referans_listesi')->with('failed',"Yanlış işlem!!!");   
                }    
}
