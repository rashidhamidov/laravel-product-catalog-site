<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
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

    //video listesi
    public function video_listesi(){
        $videoler = DB::select('select *from video');

        return view('admin.video_listesi', ['videoler' => $videoler]);
    }



    //video ekleme
    public function video_ekleme(){
        return view('admin.video_ekleme');
    }



    public function video_save (Request $request){

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
            DB::table('video')->insert([
                'keywords'=>$data['keywords'],
                'description'=>$data['description'],
                'title'=>$data['title'],
                'image'=>$name,
                'status'=>$data['status'],
                'url'=>$data['url']
            ]);
            return redirect('/admin/video_listesi')->with('success',"Video başarıyla eklendi");
        }catch(Exception $e){
            return redirect('/admin/video_ekleme')->with('failed',"Video eklenemedi");
        }

    }


    
    public function video_duzenle_save (Request $request,$id){

        $data = $request->input();
       if($request->hasfile('resim')){
            $videos = DB::select('select * from video where id = ?',[$id]);
            $video_yolu=public_path().'/uploads/images/'.$videos[0]->image;
            if(file_exists($video_yolu)){
                unlink($video_yolu);
            }
            
           $file=$request->file('resim');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/uploads/images',$name);
       }
       else{
        try{
            DB::update('update video set keywords=?,description=?,title=?,status=?,url=? where id = ?',
            [
                $data['keywords'],
                $data['description'],
                $data['title'],
                $data['status'],
                $data['url'],
                $id
                 ]);
        
            return redirect('/admin/video_listesi')->with('success',"Video başarıyla güncellendi");
            }catch(Exception $e){
                return redirect('/admin/video_listesi')->with('failed',"Video güncellenemedi");
            }
            
         }
       try{
            DB::update('update video set keywords=?,description=?,title=?,url=?,image=?,status=? where id = ?',
            [
                $data['keywords'],
                $data['description'],
                $data['title']
                ,$data['url'],
                $name,
                $data['status'],
                $id 
                ]);
        
            return redirect('/admin/video_listesi')->with('success',"Video başarıyla güncellendi");
   }catch(Exception $e){
       return redirect('/admin/video_listesi')->with('failed',"Video güncellenemedi");
   }

}

    public function video_duzenle($id) {
        $videos = DB::select('select * from video where id = ?',[$id]);
        return view('admin.video_duzenle',[
            'video'=>$videos
             ]);
        }
    public function video_sil($id) {
        $videos = DB::select('select * from video where id = ?',[$id]);

        $video_yolu=public_path().'/uploads/images/'.$videos[0]->image;
        try{
            if(file_exists($video_yolu)){
                unlink($video_yolu);
            }
        }catch(Exception $es){

        }
        
        $videos = DB::delete('delete  from video where id = ?',[$id]);
        if($videos){
            return redirect('/admin/video_listesi')->with('success',"Video başarıyla silindi");
        }
        
        else{
            return redirect('/admin/video_listesi')->with('failed',"Video silinemedi!!!");    
        }
        } 
        
        public function video_listesi_sil(Request $request) {

            if (isset($_POST['sub'])) {
                //connection string
                $checkbox1 = $_POST['techno'];
                foreach ($checkbox1 as $chk1) {
                    $videos = DB::select('select * from video where id = ?',[$chk1]);
                    $video_yolu=public_path().'/uploads/images/'.$videos[0]->image;
                    $silindimi = DB::delete('delete  from video where id = ?',[$chk1]);
                    
                        if(file_exists($video_yolu)){
                            try{
                                unlink($video_yolu);
                        }
                        catch(Exception $es){

                            }
                    }
                    
                }
                if($silindimi){
                    return redirect('/admin/video_listesi')->with('success',"Seçilmiş videolar başarıyla silindi");
                }
                else{
                    return redirect('/admin/video_listesi')->with('failed',"Seçilmiş videolar silinemedi!!!");    
                }
                } 
                    return redirect('/admin/video_listesi')->with('failed',"Yanlış işlem!!!");   
                }
    
}
