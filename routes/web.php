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
});

Route::get('/login-auth',function(){
    return redirect('/');
});


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

  Route::post('admin/kampus/create',[AdminController::class,'createdKampus'])->name('kampus_create');
  Route::get('admin/kampus/edit_view/{id}',[AdminController::class, 'editKampusView'])->name('kampus_edit');
  Route::post('admin/kampus/edit_prosess',[AdminController::class,'editKampusProsess'])->name('kampus_edit_prosses');
  Route::get('admin/kampus/delete/{id}',[AdminController::class,'deleteKampus'])->name('kampus_delete');
  





});

