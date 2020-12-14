<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
    public function kategori_listesi(){
        $category = DB::select('select * from category where parent_id=0 ORDER BY title ASC');
        $alt_category = DB::select('select * from category where parent_id!=0 ORDER BY title ASC');
        $ust_kat=DB::select('select * from category ');

        return view('admin.kategori_listesi',
            [
                'category' => $category,
                'alt_category' =>$alt_category,
                'ust_kat'=>  $ust_kat

            ]);
    }

//kategori_ekleme
public function kategori_ekleme(){
    $categories=DB::select('select *from category where status=? and parent_id=? ORDER BY title ASC',['Açık',0]);
    return view('admin.kategori_ekleme',
        [
           'categories'=>$categories
        ]);
}



public function kategori_save (Request $request){

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
        DB::table('category')->insert([
            [
                'keywords'=>$data['keywords'],
                'description'=>$data['description'],
                'title'=>$data['title'],
                'content'=>$data['content'].' ',
                'image'=>$name,
                'status'=>$data['status'],
                'parent_id'=>$data['parent_id']
            ]
        ]);
        return redirect('/admin/kategori_listesi')->withSuccess(" Kategori başarıyla eklendi");
    }catch(Exception $e){
        return redirect('/admin/kategori_listesi')->with('failed',"Kategori Eklenemedi!!!");
    }

}


//kategori duzenleme 
public function kategori_duzenle_save (Request $request,$id){

    $data = $request->input();
    if($request->hasfile('resim')){
        $categories = DB::select('select * from category where id = ?',[$id]);
        $resim_yolu=public_path().'/uploads/images/'.$categories[0]->image;
        if(file_exists($resim_yolu)){
            unlink($resim_yolu);
            
        }
        $file=$request->file('resim');
        $name=time().$file->getClientOriginalName();
        $file->move(public_path().'/uploads/images',$name);
        try {
            DB::update('update category set 
                    
                    title=?,
                    keywords=?,
                    description=?,
                    content=?,
                    status=?,
                    parent_id=?,
                    image=? 
                    where id = ?',
                [
                    $data['title'],
                    $data['keywords'],
                    $data['description'],
                    $data['content'],
                    $data['status'],
                    $data['parent_id'],
                    $name,
                    $id]
            );

            return redirect('/admin/kategori_listesi')->with('success', "Kategori başarıyla güncellendi");
        } catch (Exception $e) {
            return redirect('/admin/kategori_listesi')->with('failed', "Kategori güncellenemedi");
        }
    }
    else {
        try {
            DB::update('update category set 
                    title=?,
                    keywords=?,
                    description=?,
                    content=?,
                    parent_id=?,
                    status=? 
                    where id = ?',
                [
                    $data['title'],
                    $data['keywords'],
                    $data['description'],
                    $data['content'],
                    $data['parent_id'],
                    $data['status'],
                    $id
                ]
            );

            return redirect('/admin/kategori_listesi')->with('success', "Kategori başarıyla güncellendi");
        } catch (Exception $e) {
            return redirect('/admin/kategori_listesi')->with('failed', "Kategori güncellenemedi");
        }
    }

        

}

public function kategori_duzenle($id) {
    $category = DB::select('select * from category where id=? ',[$id]);
    $parent_id=$category[0]->parent_id;
    if($parent_id!=0){
        $parent=DB::select('select * from category where id=? ',[$parent_id]);
        $parent=$parent[0];
    }
    else{
        $parent=null;
    }
    $cat_sec=DB::select('select * from category where status = ? and parent_id=? ORDER BY title ASC', ['Açık',0]);

    return view('admin.kategori_duzenle',[

        'category' => $category,
        'parent'=>$parent,
        'cat_sec'=>$cat_sec
         ]);
    }


public function kategori_sil($id) {

    $silindimi = DB::delete('delete  from category where id = ?',[$id]);
    if($silindimi){
        return redirect('/admin/kategori_listesi')->with('success',"Kategori Başarıyla silindi");
    }
    
    else{
        return redirect('/admin/kategori_listesi')->with('failed',"Kategori silinemedi!!!");    
    }
    }    

public function kategori_listesi_sil(Request $request) {

    if (isset($_POST['sub'])) {
        //connection string
        $checkbox1 = $_POST['techno'];
        foreach ($checkbox1 as $chk1) {
            
            $silindimi = DB::delete('delete  from category where id = ?',[$chk1]);
        }
        if($silindimi){
            return redirect('/admin/kategori_listesi')->with('success',"Seçilmiş kategoriler başarıyla silindi");
        }
        else{
            return redirect('/admin/kategori_listesi')->with('failed',"Kategori silinemedi!!!");    
        }
        }
            return redirect('/admin/kategori_listesi')->with('failed',"Yanlış işlem!!!");  
        }    


}
