<?php

use App\Http\Controllers\API\MobileController;
use App\Http\Controllers\MaiboAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



   
Route::post('maibo/login',[MobileController::class,'loginApi']);
Route::post('maibo/sign_in',[MobileController::class,'signUpApi']);

//route  post
Route::get('maibo/home/latesPost',[MobileController::class,'getLatestPosts']);
Route::get('post-image/{path}', [MobileController::class,'getPostImage1'])->name('get.post.image');

//route event
Route::get('maibo/home/populerevent',[MobileController::class,'populerEvent']);
Route::get('maibo/home/latesevent',[MobileController::class,'populerEvent']);
Route::post('maibo/home/event',[MobileController::class,'getDetailEvent']);
Route::get('event-image/{path}', [MobileController::class,'getEventImage1'])->name('get.event.image1');



//route rekrutmen
Route::get('/maibo/home/latesrekrutmen',[MobileController::class,'getLatestRekrutmen']);
Route::post('/maibo/home/detailrekrutmen',[MobileController::class,'getDetailRekrutmen']);
Route::get('rekrutmen-image/{path}', [MobileController::class,'getRekrutmenImage1'])->name('get.rekrutmen.image');


//route organisasi
Route::get('maibo/home/organisasi',[MobileController::class,'getOrganisasi']);
Route::post('maibo/home/organisasi/detail',[MobileController::class,'getDetailOrganisasi']);

//route User
Route::post('maibo/home/user/',[MobileController::class,'myEvent']);
Route::post('maibo/home/data/user',[MobileController::class,'userData']);
Route::post('maibo/home/data/profile',[MobileController::class,'getDataPribadi']);
Route::post('maibo/home/data/ubah_profile',[MobileController::class,'getUbahDataPribadi']);
Route::post('maibo/home/my_organization',[MobileController::class,'myOrganization']);
Route::get('profile-image/{path}', [MobileController::class,'getprofileImage1'])->name('get.profile.image');
   
//route Ganti password
Route::post('maibo/home/password/change/',[MobileController::class,'changePassword']);


