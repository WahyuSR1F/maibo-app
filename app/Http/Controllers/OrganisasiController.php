<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Event;
use App\Models\Jurusan;
use App\Models\Kampus;
use App\Models\Organisasi;
use App\Models\ParticipantsEvent;
use App\Models\Post;
use App\Models\Prodi;
use App\Models\Rekrutmen;
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
     
        if (!is_object($request)) {
           
            return redirect('/')->with('error', 'pengguna tidak valid');
        } 

        if (!is_object($user)) {
               return redirect('/')->with('error', 'pengguna tidak valid');
        } 

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
          
          return redirect()->route('dasboard_admin')->with('success', 'selamat datang');
        }else if($result->nama_role == 'organisator'){
           
            Auth::login($user);
            $result = User::join('organisasis','users.organisasi_id','=','organisasis.id')->select('username','foto_profile','organisasis.nama','organisasi_id')->where('username', $request->username )->get();
            $request->session()->put('organisasi', $result);
            $session = session()->get('organisasi');
            return redirect()->route('organisasi_dashboard')->with('success','selamat datang halaman organisasasi');
            
        } else {
            return redirect('/')->with('error', 'maaf ada tidak memiliki akses pada halaman ini');
        }
      }
      return redirect('/')->with('error', 'maaf email dan password salah');
   }
    public function dashboardOrganisasi(){
        if(!session()->get('organisasi')){
            return redirect()->route('login_view');
        }
       

        $countEvent = Event::count();
        $countPost = Post::count();
        $countRekrutmen = Rekrutmen::count();
        $countAnggota = Anggota::count();
        $countParticipationEvent =  ParticipantsEvent::count();
        $countParticipationRekrutmens =  Rekrutmen::count();

        return view('dasboard',['countEvent' => $countEvent, 'countPost' => $countPost, 'countRekrutmen' => $countRekrutmen, 'countAnggota' => $countAnggota, 'countParticipantEvent' => $countParticipationEvent, 'countParticipantRekrutmen' => $countParticipationRekrutmens ]);





    }

    public function organisasiAnggotaView (){
        if(!session()->get('organisasi')){
            return redirect('/');
        }
        $session = session()->get('organisasi');

        $result = Anggota::join('mahasiswas','anggotas.mahasiswa_id','=','mahasiswas.id')
        ->join('organisasis','anggotas.organisasi_id','=','organisasis.id')
        ->join('divisis','anggotas.devisi_id','=','divisis.id')
        ->where('anggotas.organisasi_id','=',$session[0]->organisasi_id)
        ->select('mahasiswas.nama as nama_mahasiswa', 'mahasiswas.nim','organisasis.nama','anggotas.status_pangkat','divisis.nama_devisi','anggotas.created_at','mahasiswas.prodi_id')->get();

        return view('page.organization.all_anggota',['anggota' => $result ])->with('success','halaman list daftar anggota');
       
    } 

    public function profile()
    {
        if(!session()->get('organisasi')){
            return redirect('/');
        }
        $session =  session()->get('organisasi');
        
        $result = Organisasi::find($session[0]->organisasi_id)->first();

        return view('page.profile',['session' =>  $session, 'organisasi' => $result]);
    }



    public function logOut (){
        //hapus sesi login
        Auth::logout();
        session()->forget('key');
        session()->flush();

        return redirect('/');
    }
}
