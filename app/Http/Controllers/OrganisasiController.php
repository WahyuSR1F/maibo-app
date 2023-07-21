<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kampus;
use App\Models\Organisasi;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisasiController extends Controller
{
    function index (Request $request, $page){
        if(!$request->session()){
            return redirect('/');
        }

        return view($page);
    }

    function login (Request $request){


    //memrikasa validasi
     $validasi=$request->validate([
        'username' => 'required|email',
        'password' => 'required'
     ]);
     if(!$validasi){
        return redirect('/');
     }


     $model=new User();


     $tools =  new HelperSetUpData;
     $user =  $tools->Where('username',$request->username,$model);
     

     //melakukan pemeriksaan passwordnya cocok

     $check =  $tools->hashCheck($user->password,$request->password);

     if($check){
        //check role
        $model=new Role();
        $result = $tools->find($user->role_id, $model);

        
         
        if($result->nama_role == 'admin'){
          Auth::login($user);

            $email = $user->username;
            $foto =  $user->foto_profile;
            $arrayUser = [
                'email' => $email,
                'foto' => $foto
            ];  
          $request->session()->put('admin', $arrayUser);
          
          return redirect()->route('dasboard_admin');
        }else if($result->nama_role == 'organisator'){
            Auth::login($user);
            
            return view('dasboard');  
        } else{
            Auth::logout();
            session()->flush();
            return redirect('/')->with('error','maaf anda tidak memiliki hak akses halaman ini');
        }

       
        
     } else {
        return redirect('/')->with('error', 'maaf email dan password salah');
     }

    }



    public function logOut (){
        //hapus sesi login
        Auth::logout();
        session()->forget('key');
        session()->flush();

        return redirect('/');
    }
}
