<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleryController extends Controller
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

    //galery listesi
    public function galery_listesi(){
        $galeryler = DB::select('select *from galery');
        $content=DB::select('select * from content where status = ?', ['Açık']);

        return view('admin.galery_listesi', [
            'galeryler' => $galeryler,
            'content'=>$content
            ]);
    }

    public function galery_save (Request $request){

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
            DB::table('galery')->insert([
            'keywords'=>$data['keywords'],
            'title'=>$data['title'],
            'image'=>$name,
            'status'=>$data['status'],
            ]);
            return redirect('/admin/galery_listesi')->with('success',"Galery başarıyla eklendi");
            }catch(Exception $e){
            return redirect('/admin/galery_ekleme')->with('failed',"Galery eklenemedi");
            }

            }

   public function galery_sil($id) {
        $galerys = DB::select('select * from galery where id = ?',[$id]);

        $galery_yolu=public_path().'/uploads/images/'.$galerys[0]->image;
        try{
            if(file_exists($galery_yolu)){
                unlink($galery_yolu);
            }
        }catch(Exception $es){

        }
        
        $galerys = DB::delete('delete  from galery where id = ?',[$id]);
        if($galerys){
            return redirect('/admin/galery_listesi')->with('success',"Resim  başarıyla silindi");
        }
        
        else{
            return redirect('/admin/galery_listesi')->with('failed',"Resim silinemedi!!!");    
        }
        } 
}
