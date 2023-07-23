<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganisasiController;
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
//Route navigasi
Route::get('/',function(){
    return view('page.login');
})->name('login_view');




Route::post('/login-prosess', [OrganisasiController::class,'login'])->name('login');
Route::get('/logout',[OrganisasiController::class,'logOut'])->name('logout');


Route::middleware('auth')->group(function () {
  
});


//admin

Route::middleware('auth')->group(function () {
  Route::get('/admin/dashboard',[AdminController::class,'dashboardAdmin'])->name('dasboard_admin');
  Route::get('/admin/organisasi/all',[AdminController::class,'allOrganisasi'])->name('all_organisasi');
  Route::get('/admin/organisasi/create',[AdminController::class,'createdOrganisasiView'])->name('created_organisasi');
  Route::post('/admin/organisasi/create_prosess',[AdminController::class,'createOrganisasi'])->name('created_prosess');
  Route::get('/admin/user/all',[AdminController::class,'userAll'])->name('user_view');
  Route::get('/admin/jurusan/all',[AdminController::class,'jurusanAll'])->name('jurusan_view');
  Route::get('/admin/prodi/all', [AdminController::class,'prodiAll'])->name('prodi_view');
  Route::get('/admin/kampus/all',[AdminController::class,'kampusAll'])->name('kampus_view');
  Route::get('admin/profile',[AdminController::class,'profile'])->name('profile_view');

  Route::post('create',[AdminController::class,'createdKampus'])->name('kampus_create');
  Route::get('edit_view/{id}',[AdminController::class, 'editKampusView'])->name('kampus_edit');
  Route::post('admin/kampus/edit_prosess',[AdminController::class,'editKampusProsess'])->name('kampus_edit_prosses');
  Route::get('admin/kampus/delete/{id}',[AdminController::class,'deleteKampus'])->name('kampus_delete');

  Route::get('admin/jurusan/create',[AdminController::class,'createJurusanView'])->name('jurusan_create');
  Route::post('admin/jurusan/create-prosess', [AdminController::class,'createJurusan'])->name('jurusan_create_prosess');
  Route::get('admin/jurusan/edit_view/{id}',[AdminController::class,'EditJurusanView'])->name('jurusan_edit_view');
  Route::post('admin/jurusan/adit_prosess',[AdminController::class,'EditJurusanProsess'])->name('jurusan_edit_proses');
  Route::get('admin/jurusan/delete/{id}', [AdminController::class,'deleteJurusan'])->name('jurusan_delete');

  Route::get('admin/prodi/create',[AdminController::class,'createProdiView'])->name('prodi_create_view');
  Route::post('admin/prodi/create_prosess',[AdminController::class,'createProdiProsess'])->name('prodi_create_prosess');
  Route::get('admin/prodi/edit/{id}',[AdminController::class,'editProdiView'])->name('prodi_edit_view');
  Route::post('admin/prodi/edit_prosess', [AdminController::class, 'editProdiProsess'])->name('prodi_edit_prosess');

  // organisasi admin

  Route::prefix('organisasi')->group(function (){
  Route::get('dashboard',[OrganisasiController::class,'dashboardOrganisasi'])->name('organisasi_dashboard');
  Route::get('profile',[OrganisasiController::class,'profile'])->name('organisasi_profile');
  Route::get('Anggota',[OrganisasiController::class,'organisasiAnggotaView'])->name('organisasi_anggota_view');
  Route::get('event',[OrganisasiController::class,'eventView'])->name('organisasi_event_view');
  Route::get('event/detail/{id}',[OrganisasiController::class,'detailEvent'])->name('organisasi_event_detail');
  Route::get('partisipasi/event/detail/{id}',[OrganisasiController::class,'partisipasiEventDetail'])->name('praticipasi_detail_event');
  Route::get('praticipasi/rekrutmen/detail/{id}',[OrganisasiController::class,'pertisipasiRekrutmenDetail'])->name('participant_rekrutmen_detail');
  Route::get('post',[OrganisasiController::class,'postView'])->name('organisasi_post_view');
  Route::get('post/detail/{id}',[OrganisasiController::class,'detailOrganisasiPost'])->name('organisasi_post_detail');
  Route::get('rekrutmen',[OrganisasiController::class,'rekrutmenView'])->name('organisasi_rekrutmen_view');
  Route::get('rekrutmen/detail/{id}',[OrganisasiController::class,'rekrutmenDetail'])->name('organisasi_view_detail');
  

  });
  
  





});

