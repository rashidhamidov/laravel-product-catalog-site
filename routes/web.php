<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//home routes


Route::get('/', [App\Http\Controllers\home\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\home\HomeController::class, 'index'])->name('home');
Route::get('/iletisim','App\Http\Controllers\home\HomeController@iletisim' );
Route::get('/galery','App\Http\Controllers\home\HomeController@galery' );
Route::get('/Kategoriler/{id}','App\Http\Controllers\home\HomeController@urunler' );
Route::get('/referans','App\Http\Controllers\home\HomeController@referans' );
Route::post('/iletisim_send','App\Http\Controllers\home\HomeController@iletisim_send' );
Route::get('/kurumsal/{id}','App\Http\Controllers\home\HomeController@kurumsal_sayfa' );
Route::get('/urun_detail/{id}','App\Http\Controllers\home\HomeController@icerik_sayfa' );
Route::get('/Urunler/{title}/{id}','App\Http\Controllers\home\HomeController@kategori_sayfa' );
Route::get('/Kategoriler','App\Http\Controllers\home\HomeController@kategori' );
Route::post('/search','App\Http\Controllers\home\HomeController@search' );







Auth::routes();


Route::get('/admin', 'App\Http\Controllers\admin\AdminController@index');

//icerik rouute
Route::get('/admin/icerik_listesi', 'App\Http\Controllers\admin\AdminController@icerik_listesi');
Route::post('/admin/icerik_listesi/category', 'App\Http\Controllers\admin\AdminController@icerik_listesi_category');
Route::post('/admin/icerik_listesi/category_degistir', 'App\Http\Controllers\admin\AdminController@icerik_categori_degistir');
Route::post('/admin/icerik_listesi/search', 'App\Http\Controllers\admin\AdminController@icerik_listesi_search');
Route::get('/admin/icerik_listesi/{id}', 'App\Http\Controllers\admin\AdminController@icerik_listesi_id');
Route::post('/admin/icerik_listesi/toplusil','App\Http\Controllers\admin\AdminController@icerik_listesi_sil');
Route::get('/admin/icerik_ekleme', 'App\Http\Controllers\admin\AdminController@icerik_ekleme');
Route::post('/admin/icerik_save', 'App\Http\Controllers\admin\AdminController@icerik_save');
Route::get('/admin/icerik_duzenle/{id}', 'App\Http\Controllers\admin\AdminController@icerik_duzenle');
Route::post('/admin/icerik/duzenle/save/{id}', 'App\Http\Controllers\admin\AdminController@icerik_duzenle_save');
Route::get('/admin/icerik/sil/{id}', 'App\Http\Controllers\admin\AdminController@icerik_sil');

//kategori route
Route::get('/admin/kategori_listesi','App\Http\Controllers\admin\CategoryController@kategori_listesi');
Route::post('/admin/kategori_listesi/toplusil','App\Http\Controllers\admin\CategoryController@kategori_listesi_sil');
Route::get('/admin/kategori_ekleme', 'App\Http\Controllers\admin\CategoryController@kategori_ekleme');
Route::post('/admin/kategori_save', 'App\Http\Controllers\admin\CategoryController@kategori_save');
Route::get('/admin/kategori_duzenle/{id}', 'App\Http\Controllers\admin\CategoryController@kategori_duzenle');
Route::post('/admin/kategori/duzenle/save/{id}', 'App\Http\Controllers\admin\CategoryController@kategori_duzenle_save');
Route::get('/admin/kategori/sil/{id}', 'App\Http\Controllers\admin\CategoryController@kategori_sil');



//referans route
Route::get('/admin/referans_listesi','App\Http\Controllers\admin\ReferansController@referans_listesi');
Route::post('/admin/referans_listesi/toplusil','App\Http\Controllers\admin\ReferansController@referans_listesi_sil');
Route::get('/admin/referans_ekleme', 'App\Http\Controllers\admin\ReferansController@referans_ekleme');
Route::post('/admin/referans_save', 'App\Http\Controllers\admin\ReferansController@referans_save');
Route::get('/admin/referans_duzenle/{id}', 'App\Http\Controllers\admin\ReferansController@referans_duzenle');
Route::post('/admin/referans/duzenle/save/{id}', 'App\Http\Controllers\admin\ReferansController@referans_duzenle_save');
Route::get('/admin/referans/sil/{id}', 'App\Http\Controllers\admin\ReferansController@referans_sil');


//site Ayar
Route::get('/admin/ayar_duzenle/', 'App\Http\Controllers\admin\AdminController@ayar_duzenle');
Route::post('/admin/ayar/duzenle/save/{id}', 'App\Http\Controllers\admin\AdminController@ayar_duzenle_save');

Route::get('/admin/yonetici_ekleme', 'App\Http\Controllers\admin\AdminController@yonetici_ekleme');

//Kurumsal Sayfalar
Route::get('/admin/kurumsal_listesi', 'App\Http\Controllers\admin\KurumsalController@kurumsal_listesi');
Route::post('/admin/kurumsal_listesi/toplusil','App\Http\Controllers\admin\KurumsalController@kurumsal_listesi_sil');
Route::get('/admin/kurumsal_ekleme', 'App\Http\Controllers\admin\KurumsalController@kurumsal_ekleme');
Route::post('/admin/kurumsal_save', 'App\Http\Controllers\admin\KurumsalController@kurumsal_save');
Route::get('/admin/kurumsal_duzenle/{id}', 'App\Http\Controllers\admin\KurumsalController@kurumsal_duzenle');
Route::post('/admin/kurumsal/duzenle/save/{id}', 'App\Http\Controllers\admin\KurumsalController@kurumsal_duzenle_save');
Route::get('/admin/kurumsal/sil/{id}', 'App\Http\Controllers\admin\KurumsalController@kurumsal_sil');

Route::get('/admin/user_duzenle/{id}', 'App\Http\Controllers\admin\AdminController@user_duzenle');
Route::post('/admin/user/duzenle/save/{id}', 'App\Http\Controllers\admin\AdminController@user_duzenle_save');
Route::get('/changePassword','App\Http\Controllers\admin\AdminController@showChangePasswordForm');
Route::post('/changePassword','App\Http\Controllers\admin\AdminController@changePassword')->name('changePassword');


//slider rouute
Route::get('/admin/slider_listesi', 'App\Http\Controllers\admin\SliderController@slider_listesi');
Route::post('/admin/slider_listesi/toplusil','App\Http\Controllers\admin\SliderController@slider_listesi_sil');
Route::get('/admin/slider_ekleme', 'App\Http\Controllers\admin\SliderController@slider_ekleme');
Route::post('/admin/slider_save', 'App\Http\Controllers\admin\SliderController@slider_save');
Route::get('/admin/slider_duzenle/{id}', 'App\Http\Controllers\admin\SliderController@slider_duzenle');
Route::post('/admin/slider/duzenle/save/{id}', 'App\Http\Controllers\admin\SliderController@slider_duzenle_save');
Route::get('/admin/slider/sil/{id}', 'App\Http\Controllers\admin\SliderController@slider_sil');


//video route
Route::get('/admin/video_listesi', 'App\Http\Controllers\admin\VideoController@video_listesi');
Route::post('/admin/video_listesi/toplusil','App\Http\Controllers\admin\VideoController@video_listesi_sil');
Route::get('/admin/video_ekleme', 'App\Http\Controllers\admin\VideoController@video_ekleme');
Route::post('/admin/video_save', 'App\Http\Controllers\admin\VideoController@video_save');
Route::get('/admin/video_duzenle/{id}', 'App\Http\Controllers\admin\VideoController@video_duzenle');
Route::post('/admin/video/duzenle/save/{id}', 'App\Http\Controllers\admin\VideoController@video_duzenle_save');
Route::get('/admin/video/sil/{id}', 'App\Http\Controllers\admin\VideoController@video_sil');


//galery route
Route::get('/admin/galery_listesi', 'App\Http\Controllers\admin\GaleryController@galery_listesi');
Route::post('/admin/galery_listesi/toplusil','App\Http\Controllers\admin\GaleryController@galery_listesi_sil');
Route::get('/admin/galery_ekleme', 'App\Http\Controllers\admin\GaleryController@galery_ekleme');
Route::post('/admin/galery_save', 'App\Http\Controllers\admin\GaleryController@galery_save');
Route::get('/admin/galery_duzenle/{id}', 'App\Http\Controllers\admin\GaleryController@galery_duzenle');
Route::post('/admin/galery/duzenle/save/{id}', 'App\Http\Controllers\admin\GaleryController@galery_duzenle_save');
Route::get('/admin/galery/sil/{id}', 'App\Http\Controllers\admin\GaleryController@galery_sil');
