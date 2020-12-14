<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\icerik;
use FFI\Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Artisan;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class AdminController extends Controller
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

    public function index(){
        //Artisan::call('route:cache');
        //Artisan::call('view:cache');
        //return 'Application cache cleared.';
        return view('admin.home');
    }




    //seminer listesi
    public function seminer(){
        $seminer = DB::select('select c.id , c.title,c.keywords,c.description,c.tarih,c.image,c.status, k.title as category from content c LEFT JOIN category k ON k.title="seminer" where c.category_id=k.id');

        return view('admin.seminer', ['seminer' => $seminer]);
    }


    //icerik listesi
    public function icerik_listesi(){
        $icerikler = DB::select('select c.id , c.title,c.keywords,c.description,c.tarih,c.image,c.status,c.content, k.title as category from content c LEFT JOIN category k ON k.id=c.category_id');
        $category = DB::select('select * from category where parent_id=0 ORDER BY title ASC');
        $alt_category = DB::select('select * from category where parent_id!=0 ORDER BY title ASC');

        return view('admin.icerik_listesi', [
            'icerikler' => $icerikler,
            'category' => $category,
            'alt_category' =>$alt_category
            ]);
    }
    //icerik listesi
    public function icerik_listesi_category(Request $request){
        $data = $request->input();
        $id=$data['sira_kategori'];
        if($id=='all'){
            $icerikler = DB::select('select c.id , c.title,c.keywords,c.description,c.content,c.image,c.status, k.title as category from content c LEFT JOIN category k ON k.id=c.category_id where c.category_id is not null');
        }
        else{
            $icerikler = DB::select('select c.id , c.title,c.keywords,c.description,c.content,c.image,c.status, k.title as category from content c LEFT JOIN category k ON k.id=? where c.category_id=?',[$id,$id]);
        }
        
        $category = DB::select('select * from category where parent_id=0 ORDER BY title ASC');
        $alt_category = DB::select('select * from category where parent_id!=0 ORDER BY title ASC');


        return view('admin.icerik_listesi', [
            'icerikler' => $icerikler,
            'category' => $category,
            'alt_category' =>$alt_category
            ]);
    }
    //icerik listesi
    public function icerik_listesi_id($id){

            $icerikler = DB::select('select c.id , c.title,c.keywords,c.description,c.content,c.image,c.status, k.title as category from content c LEFT JOIN category k ON k.id=? where c.category_id=?',[$id,$id]);

        $category = DB::select('select * from category where parent_id=0 ORDER BY title ASC');
        $alt_category = DB::select('select * from category where parent_id!=0 ORDER BY title ASC');

        return view('admin.icerik_listesi', [
            'icerikler' => $icerikler,
            'category' => $category,
            'alt_category' =>$alt_category
            ]);
    }
    //icerik listesi
    public function icerik_listesi_search(Request $request){
        $data = $request->input();
        $aranacak_kelime=$data['aranacak_kelime'];
        $icerikler = DB::select('select c.id ,
                                c.title,
                                c.keywords,
                                c.description,
                                c.content,
                                c.image,
                                c.status,
                                k.title as category
                                from content c 
                                LEFT JOIN category k ON k.id=c.category_id 
                                where c.title LIKE "%'.$aranacak_kelime.'%"');
         $category = DB::select('select * from category where parent_id=0 ORDER BY title ASC');
        $alt_category = DB::select('select * from category where parent_id!=0 ORDER BY title ASC');

        return view('admin.icerik_listesi', [
            'icerikler' => $icerikler,
            'category' => $category,
            'alt_category' =>$alt_category
        ]);
    }



    //icerik ekleme
    public function icerik_ekleme(){

        $category = DB::select('select * from category where parent_id=0 ORDER BY title ASC');
        $alt_category = DB::select('select * from category where parent_id!=0 ORDER BY title ASC');

        return view('admin.icerik_ekleme', [
            'category' => $category,
            'alt_category' =>$alt_category
            ]);
    }



    public function icerik_save (Request $request){

             $data = $request->input();
            if($request->hasfile('resim')){
                $file=$request->file('resim');
                $name=rand(1,999999999).time().$file->getClientOriginalName();
                $file->move(public_path().'/uploads/images',$name);
            }
            else{
                $name='bos_resim';
            }
            try{
            DB::table('content')->insert([
                ['category_id'=>$data['category'],
                'keywords'=>$data['keywords'],
                'description'=>$data['description'],
                'title'=>$data['title'],
                'content'=>$data['content'].' ',
                'image'=>$name,
                'status'=>$data['status']
                    ]
            ]);
            return redirect('/admin/icerik_listesi/'.$data['category'])->with('success',"İçerik başarıyla eklendi");
        }catch(Exception $e){
            return redirect('/admin/icerik_ekleme')->with('failed',"İçerik eklenemedi");
        }

    }


    
    public function icerik_duzenle_save (Request $request,$id){

        $data = $request->input();
       if($request->hasfile('resim')){
            $iceriks = DB::select('select * from content where id = ?',[$id]);
            $icerik_yolu=public_path().'/uploads/images/'.$iceriks[0]->image;
            if(file_exists($icerik_yolu)){
                unlink($icerik_yolu);
            }
            
           $file=$request->file('resim');
           $name=rand(1,999999999).time().$file->getClientOriginalName();
           $file->move(public_path().'/uploads/images',$name);
       }
       else{
        try{
            DB::update('update content set category_id = ?,keywords=?,description=?,title=?,content=?,status=? where id = ?',
            [$data['category'],$data['keywords'],$data['description'],$data['title'],$data['content'],$data['status'],$id ]);
        
            return redirect('/admin/icerik_listesi/'.$data['category'])->with('success',"İçerik başarıyla güncellendi");
            }catch(Exception $e){
                return redirect('/admin/icerik_listesi/'.$data['category'])->with('failed',"İçerik güncellenemedi");
            }
            
         }
       try{
            DB::update('update content set category_id = ?,keywords=?,description=?,title=?,content=?,image=?,status=? where id = ?',
            [$data['category'],$data['keywords'],$data['description'],$data['title'],$data['content'],$name,$data['status'],$id ]);
        
            return redirect('/admin/icerik_listesi/'.$data['category'])->with('success',"İçerik başarıyla güncellendi");
   }catch(Exception $e){
       return redirect('/admin/icerik_listesi/'.$data['category'])->with('failed',"İçerik güncellenemedi");
   }

}

    public function icerik_duzenle($id) {
        $category = DB::select('select * from category where parent_id=0 ORDER BY title ASC');
        $alt_category = DB::select('select * from category where parent_id!=0 ORDER BY title ASC');
        
        $iceriks = DB::select('select * from content where id = ?',[$id]);
        $icerik_category= DB::select('select * from category where id=? ',[$iceriks[0]->category_id]);
        return view('admin.icerik_duzenle',[
            'icerik'=>$iceriks,
            'icerik_category'=>$icerik_category,
            'category' => $category,
            'alt_category' =>$alt_category
             ]);
        }
    public function icerik_sil($id) {
        $iceriks = DB::select('select * from content where id = ?',[$id]);

        $icerik_yolu=public_path().'/uploads/images/'.$iceriks[0]->image;
        try{
            if(file_exists($icerik_yolu))
            unlink($icerik_yolu);
        }catch(Exception $es){

        }
        
        $iceriks = DB::delete('delete  from content where id = ?',[$id]);
        if($iceriks){
            return redirect('/admin/icerik_listesi')->with('success',"İçerik başarıyla silindi");
        }
        
        else{
            return redirect('/admin/icerik_listesi')->with('failed',"İçerik silinemedi!!!");    
        }
        } 
        
        public function icerik_listesi_sil(Request $request) {

            if (isset($_POST['sub'])) {
                //connection string
                $checkbox1 = $_POST['techno'];
                foreach ($checkbox1 as $chk1) {
                    $iceriks = DB::select('select * from content where id = ?',[$chk1]);
                    $silindimi = DB::delete('delete  from content where id = ?',[$chk1]);
                    $icerik_yolu=public_path().'/uploads/images/'.$iceriks[0]->image;
                    try{
                        if(file_exists($icerik_yolu))
                        unlink($icerik_yolu);
                    }catch(Exception $es){

                    }
                }
                if($silindimi){
                    return redirect('/admin/icerik_listesi')->with('success',"Seçilmiş içerikler başarıyla silindi");
                }
                else{
                    return redirect('/admin/icerik_listesi')->with('failed',"Seçilmiş içerikler silinemedi!!!");    
                }
                } 
                    return redirect('/admin/icerik_listesi')->with('failed',"Yanlış işlem!!!");   
                }
                
        public function icerik_categori_degistir(Request $request) {
                if (isset($_POST['sub'])) {
                //connection string
                $checkbox1 = $_POST['techno'];
                foreach ($checkbox1 as $chk1) {
                    $iceriks = DB::select('select * from content where id = ?',[$chk1]);
                    $silindimi = DB::delete('delete  from content where id = ?',[$chk1]);
                    $icerik_yolu=public_path().'/uploads/images/'.$iceriks[0]->image;
                    try{
                        if(file_exists($icerik_yolu))
                        unlink($icerik_yolu);
                    }catch(Exception $es){

                    }
                }
                if($silindimi){
                    return redirect('/admin/icerik_listesi')->with('success',"Seçilmiş içerikler başarıyla silindi");
                }
                else{
                    return redirect('/admin/icerik_listesi')->with('failed',"Seçilmiş içerikler silinemedi!!!");    
                }
                }
                else{
                $data = $request->input();
                //connection string
                if($_POST){
                $category=$data['kategori_degis'];
                $checkbox1 = $_POST['techno'];
                foreach ($checkbox1 as $chk1) {
                    $silindimi = DB::update('update content set category_id=?  where id = ?',
                    [
                        $category,
                        $chk1
                        ]);
                }
                if($silindimi){
                    return redirect('/admin/icerik_listesi')->with('success',"Seçilmiş içerikler başarıyla güncellendi");
                }
                else{
                    return redirect('/admin/icerik_listesi')->with('failed',"Seçilmiş içerikler güncellenemedi!!!");    
                }
                }
                }
                    return redirect('/admin/icerik_listesi')->with('failed',"Yanlış işlem!!!");   
                }
                
                



    //Site ayar 
                public function ayar_duzenle() {
                    $id=1;
                    $ayar = DB::select('select * from setting where id = ?',[$id]);
                    return view('admin.site_ayar',[
                        'ayar'=>$ayar

                         ]);
                    }

                    public function ayar_duzenle_save (Request $request,$id){

                        $data = $request->input();
                       if($request->hasfile('logo')){
                            $ayars = DB::select('select * from setting where id = ?',[$id]);
                            $ayar_yolu=public_path().'/uploads/images/'.$ayars[0]->logo;
                            if(file_exists($ayar_yolu)){
                                unlink($ayar_yolu);
                            }
                            
                           $file=$request->file('logo');
                           $name=time().$file->getClientOriginalName();
                           $file->move(public_path().'/uploads/images',$name);
                       }
                       else{
                        try{
                            DB::update('update setting set 
                                title=?,
                                keywords=?,
                                description=?,
                                phone = ?,
                                email=?,
                                facebook=?,
                                instagram=?,
                                twitter=?,
                                contact=?,
                                google_map=?,
                                company=?,
                                status=?,
                                hours=?,
                                gsm=?,
                                whatsapp=?
                                 
                                where id = ?',
                            [
                                $data['title'],
                                $data['keywords'],
                                $data['description'],
                                $data['phone'],
                                $data['email'],
                                $data['facebook'],
                                $data['instagram'],
                                $data['twitter'],
                                $data['contact'],
                                $data['google_map'],
                                $data['company'],
                                $data['status'],
                                $data['hours'],
                                $data['gsm'],
                                $data['whatsapp'],
                                $id
                            ]);
                        
                            return redirect('/admin/ayar_duzenle')->with('success',"Site ayarlarınız başarıyla güncellendi");
                            }catch(Exception $e){
                                return redirect('/admin/ayar_duzenle')->with('failed',"Ayarlar  güncellenemedi");
                            }
                            
                         }
                       try{
                            DB::update('update setting set 
                                    title=?,
                                    keywords=?,
                                    description=?,
                                    phone = ?,
                                    email=?,
                                    facebook=?,
                                    instagram=?,
                                    twitter=?,
                                    contact=?,
                                    google_map=?,
                                    company=?,
                                    status=?,
                                    logo=?,
                                    hours=?,
                                    gsm=?,
                                    whatsapp=? 
                                    where id = ?',
                            [
                                $data['title'],
                                $data['keywords'],
                                $data['description'],
                                $data['phone'],
                                $data['email'],
                                $data['facebook'],
                                $data['instagram'],
                                $data['twitter'],
                                $data['contact'],
                                $data['google_map'],
                                $data['company'],
                                $data['status'],
                                $name,
                                $data['hours'],
                                $data['gsm'],
                                $data['whatsapp'],
                                $id
                            ]);
                        
                            return redirect('/admin/ayar_duzenle')->with('success',"Site ayarlarınız başarıyla güncellendi");
                   }catch(Exception $e){
                       return redirect('/admin/ayar_duzenle')->with('failed',"Ayarlar güncellenemedi");
                   }
                
                }


        //hESAP AYARLARI
        //hESAP AYARLARI

        public function user_duzenle($id) {
            if(Auth::user()->id==$id){
                
            
        $users = DB::select('select * from users where id = ?',[$id]);
        return view('admin.user_duzenle',[
            'user'=>$users,
             ]);
        }
        else {
        Auth::logout();
    }
    }
    public function user_duzenle_save (Request $request,$id){

                    $data = $request->input();
                    if($request->hasfile('resim')){
                        $users = DB::select('select * from users where id = ?',[$id]);
                        $user_yolu=public_path().'/uploads/images/'.$users[0]->image;
                        if(file_exists($user_yolu)){
                            unlink($user_yolu);
                        }
                        
                    $file=$request->file('resim');
                    $name=time().$file->getClientOriginalName();
                    $file->move(public_path().'/uploads/images',$name);
                    }
                    else{
                    try{
                        DB::update('update users set name=?,email=? where id = ?',
                        [
                            $data['name'],
                            $data['email'],
                            $id ]);

                        return redirect('/admin/user_duzenle/'.$id)->with('success',"User başarıyla güncellendi");
                        }catch(Exception $e){
                            return redirect('/admin/user_duzenle/'.$id)->with('failed',"User güncellenemedi");
                        }
                        
                    }
                    try{
                        DB::update('update users set name=?,email=?,image=? where id = ?',
                        [
                            $data['name'],
                            $data['email'],
                            $name,
                            $id ]);

                        return redirect('/admin/user_duzenle/'.$id)->with('success',"User başarıyla güncellendi");
                    }catch(Exception $e){
                    return redirect('/admin/user_duzenle/'.$id)->with('failed',"User güncellenemedi");
                    }

}
public function yonetici_ekleme()
{
    return view('admin.yonetici_ekleme')->with('failed',"Yetki Hatası");
}







    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
    public function changePassword(Request $request){

if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
    // The passwords matches
    return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
}

if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
    //Current password and new password are same
    return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
}

$validatedData = $request->validate([
    'current-password' => 'required',
    'new-password' => 'required|string|min:6|confirmed',
]);

//Change Password
$user = Auth::user();
$user->password = bcrypt($request->get('new-password'));
$user->save();

return redirect()->back()->with("success","Password changed successfully !");

}




    


}
