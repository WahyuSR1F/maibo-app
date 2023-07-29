<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Event;
use App\Models\Gambar;
use App\Models\jenis_event;
use App\Models\Jurusan;
use App\Models\Kampus;
use App\Models\Mahasiswa;
use App\Models\Organisasi;
use App\Models\ParticipantsEvent;
use App\Models\ParticipantsRekrutmen;
use App\Models\Post;
use App\Models\Prodi;
use App\Models\Rekrutmen;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class OrganisasiController extends Controller
{

    function login (Request $request) 
    
    {


            //memrikasa validasi
            $validasi=$request->validate([
                'username' => 'required|email',
                'password' => 'required'
            ]);
            if(!$validasi){
                return redirect('/');
            }


            $model=new User();


            $tools =  new HelperSetUpData();
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
       $session = session()->get('organisasi');

        $countEvent = Event::Where('organisasi_id', $session[0]->organisasi_id )->count();
        $countPost = Post::Where('organisasi_id', $session[0]->organisasi_id )->count();
        $countRekrutmen = Rekrutmen::Where('organisasi_id', $session[0]->organisasi_id )->count();
        $countAnggota = Anggota::Where('organisasi_id', $session[0]->organisasi_id )->count();
        $event_id = Event::Where('organisasi_id', $session[0]->organisasi_id )->pluck('id')->toArray();
        $countParticipationEvent =  ParticipantsEvent::Where('event_id', $event_id )->count();
        $rekrutmen_id = Rekrutmen::Where('organisasi_id', $session[0]->organisasi_id )->pluck('id')->toArray();
        $countParticipationRekrutmens =  ParticipantsRekrutmen::Where('rekrutmen_id', $rekrutmen_id )->count();

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
        ->select('mahasiswas.nama as nama_mahasiswa', 'mahasiswas.nim','organisasis.nama','divisis.nama_devisi','anggotas.created_at','mahasiswas.prodi_id','mahasiswas.id as id_mahasiswa','anggotas.*')->get();

        return view('page.organization.all_anggota',['anggota' => $result ])->with('success','halaman list daftar anggota');
       
    } 

    public function AnggotaEditView ($id) {
        if(!session()->get('organisasi')){
            return redirect('/');
        }
        
        $result = Anggota::where('id', $id)->first();

        return view('page.organization.edit_page', ['anggota' =>  $result]);
    }

    public function AnggotaEditProsess (Request $request){
        
        $result = Anggota::find($request->id);
        $check =  $result->update([
            'status_pangkat' => $request->status_pangkat
        ]);

        if(!$check){
            return redirect()->back()->with('error','terjadi kesalahan data');
        }
        return redirect()->route('organisasi_anggota_view')->with('success','data berhasil diubah');


    }

    public function AnggotaDelete ($id){
        $check = Anggota::find($id)->delete();

        if(!$check){
            return redirect()->back()->with('error','terjadi kesalahan data tidak dapat terhapus');
        }

        return redirect()->route('organisasi_anggota_view')->with('success','data berhasil dihapus');
    }








    public function eventView (){
          if(!session()->get('organisasi')){
            return redirect('/');
        }

        $session = session()->get('organisasi');
        

        $result = Event::join('jenis_events','events.jenis_event_id','=','jenis_events.id')->where('events.organisasi_id', $session[0]->organisasi_id)->select('events.id as id','events.organisasi_id','events.jenis_event_id','events.title','events.deskripsi','events.registration_start','events.registration_close','events.event_start','events.event_close','events.status','events.status_view','jenis_events.nama')->get();
        
        return view('page.event.allview_page',['event' => $result]);


    }

    public function detailEvent ($id){
        if(!session()->get('organisasi')){
            return redirect('/');
        }
        $gambar = Gambar::where('event_id', $id)->first();
       

        $event = Event::where('id',$id)->first();
        
        
        $jenis_event =  jenis_event::find($event->jenis_event_id);
        $participantEventCount =  ParticipantsEvent::where('event_id', $id)->count();
        $participantEvent = ParticipantsEvent::join('mahasiswas','participants_events.mahasiswa_id','=','mahasiswas.id')
        ->join('prodis','mahasiswas.prodi_id','=','prodis.id')
        ->join('jurusans', 'prodis.jurusan_id','=','jurusans.id')
        ->join('kampuses','jurusans.kampus_id','=','kampuses.id')
        ->where('event_id', $id)->get();
        
        return view('page.event.detail_page',['gambar' => $gambar, 'item' => $event, 'participant' => $participantEvent,'count' => $participantEventCount,'jenis_event' =>  $jenis_event]);
    }

    public function  createEventView ()
    
    {
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        
        $jenis = jenis_event::all();
        

        return view('page.event.created_page',['jenis' => $jenis]);
    }


    public function createEventProsess (Request $request)
    
    {

       
        $request->validate([
            'title' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'deskripsi' => 'required',
            'jenis_event_id' => 'required',
            'registration_close' => 'required',
            'registration_start' => 'required',
            'event_start' => 'required',
            'event_close' => 'required',
            'status' => 'required',
            'status_view' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
     
     
        
        $sessio = session()->get('organisasi');
        $organisasiId = $sessio[0]->organisasi_id;
       
        
        $check = Event::create([
            'organisasi_id' => $organisasiId,
            'jenis_event_id' => $request->jenis_event_id,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'registration_start' => $request->registration_start,
            'registration_close' => $request->registration_close,
            'event_start' => $request->event_start,
            'event_close' => $request->event_close,
            'status' => $request->status,
            'status_view' => $request->status_view,
            
        ]);

        dd($request->file('foto'));
        if(!$check){
            return redirect()->route('create_event_view')->with('error','terjadi kesalahan data');
        }

        // penegcheckan gambar
        if($request->cropped){
             $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->gambar_cropped));
        
                $tools =  new HelperSetUpData();
                $path =  $tools->saveImg('dataApp/event/img/', $imageData ,$check->title);
                
                $check_gambar =  Gambar::create([
                    'foto' => $path,
                    'event_id' => $check->id
            ]); 

            if(!$check_gambar){
            return redirect()->route('create_event_view')->with('error','terjadi kesalahan data');
            } 
            // mengunakan dilempar ke dalam menu utama jika berhasil
            return redirect()->route('organisasi_event_view')->with('success','data berhasil ditambahkan');  

           //kalau misalanya  mengunakan gambar biasa

        } else  if ($request->foto){
            $tools =  new HelperSetUpData();
            $path =  $tools->saveImgFile('dataApp/event/img/', $request->file('foto'), $check->title);

            $check_gambar =  Gambar::create([
                'foto' => $path,
                'event_id' => $check->id
            ]);
            //sudah masuk atau ada masalah
            if(!$check_gambar){
                return redirect()->route('create_event_view')->with('error','terjadi kesalahan data');
            }
            return redirect()->route('organisasi_event_view')->with('success','data berhasil ditambahkan');  
    
        }
        return redirect()->route('create_event_view')->with('error','terjadi kesalahan data');
        
      }


    // editEventView Controller

    public function editEventView ($id)
    {
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        $session = session()->get('organisasi');
        $result = Event::where('id', $id )->first();
        $gambar = Gambar::where('event_id', $result->id)->first();
        $jenis = jenis_event::all();

        return view('page.event.edit_page',['event' => $result, 'jenis' => $jenis, 'gambar' => $gambar]);
        

    }

    //edit prosess

    public function editEventProsess (Request $request)
    
    {
        $request->validate([
            'title' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'deskripsi' => 'required',
            'jenis_event_id' => 'required',
            'registration_close' => 'required',
            'registration_start' => 'required',
            'event_start' => 'required',
            'event_close' => 'required',
            'status' => 'required',
            'status_view' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $result = Event::find($request->id)->first();

        $check = $result->update([
            'jenis_event_id' => $request->jenis_event_id,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'registration_start' => $request->registration_start,
            'registration_close' => $request->registration_close,
            'event_start' => $request->event_start,
            'event_close' => $request->event_close,
            'status' => $request->status,
            'status_view' => $request->status_view, 
        ]);

        // penechekan apaka masuk dataevent dapat dengan lancar 


        if(!$check)
        {
            return redirect()->route('edit_event_prosess')->with('error','terjadi kesalahan data saat pengisian');
        }

        // melakukan pengambiland data gamabar 

          // penegcheckan gambar
          if($request->cropped){
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->gambar_cropped));
       
               $tools =  new HelperSetUpData();
               $path =  $tools->saveImg('dataApp/event/img/', $imageData ,$result->title);
               
               $gambar =  Gambar::where('event_id',$request->id);
               $check_gambar =  $gambar->update([
                   'foto' => $path
                   
           ]); 

           if(!$check_gambar){
           return redirect()->route('create_event_view')->with('error','terjadi kesalahan data');
           } 
           // mengunakan dilempar ke dalam menu utama jika berhasil
           return redirect()->route('organisasi_event_view')->with('success','data berhasil ditambahkan');  

          //kalau misalanya  mengunakan gambar biasa

        } else  if ($request->foto){
                $tools =  new HelperSetUpData();
                $path =  $tools->saveImgFile('dataApp/event/img/', $request->file('foto') ,$result->title);
               
                $gambar =  Gambar::where('event_id',$request->id);
                $check_gambar = $gambar->update([
                    'foto' => $path,
                   
                ]);
                if(!$check_gambar){
                    return redirect()->route('create_event_view')->with('error','terjadi kesalahan data');
                }
                return redirect()->route('organisasi_event_view')->with('success','data berhasil ditambahkan');  
        
        }

       return redirect()->route('organisasi_event_view')->with('success','data berhasil ditambahkan');
      
    }

    

    //funsgi untuk melakukan delete data

    public function deleteEvent ($id)
    {
        if(!session()->get('organisasi')){
            return redirect('/');
        }
        // mengambil data  gambar
        $gambarDelete = Gambar::where('event_id', $id)->select('foto')->first();
        // menghapus gambar
        Gambar::where('event_id', $id)->delete();

        // menghapus gambar pada local storage

        $tools = new HelperSetUpData();
        $tools->deleteImg('storage/dataApp/event/img/',$gambarDelete);

        //menghapus semua participant

        ParticipantsEvent::where('event_id', $id)->delete();

        //menghapus data pada event

         Event::where('id', $id)->delete();

        return redirect()->route('organisasi_event_view')->with('success','data berhasil dihapus');
        
    }


    public function partisipasiEventDetail ($id)
    {

        if(!session()->get('organisasi')){
            return redirect('/');
        }

        $result = User::join('mahasiswas','users.mahasiswa_id','=','users.id')
        ->join('prodis','mahasiswas.prodi_id','=','prodis.id')
        ->join('jurusans', 'prodis.jurusan_id','=','jurusans.id')
        ->join('kampuses','jurusans.kampus_id','=','kampuses.id')
        ->where('users.mahasiswa_id', $id)->get()
        ->select('users.username','user.foto_profile','mahasiswas.nim','mahasiswas.nama','mahasiswas.contact','prodis.nama_jurusan','jurusans.nama_jurusan','kampuses.nama_kampus');

        return view('page.user.profile_user',['mahasiswa'=>$result]);
    }


    

    public function profile ()
    {
        if(!session()->get('organisasi')){
            return redirect('/');
        }
        $session =  session()->get('organisasi');

        
        $result = Organisasi::find($session[0]->organisasi_id)->first();

        return view('page.profile',['session' =>  $session, 'organisasi' => $result]);
    }



    public function postView ()
    {

        if(!session()->get('organisasi')){
            return redirect('/');
        }
        $session = session()->get('organisasi');

        $result = Post::where('organisasi_id', $session[0]->organisasi_id)->get();

        return view('page.post.all_post',['post' => $result]);

    }


    
    public function detailOrganisasiPost ($id){
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        $result = Post::where('id', $id)->first();
        $gambar = Gambar::where('post_id', $result->id)->first();
        return view('page.post.detail_post',['post'=> $result, 'gambar' => $gambar]);
    }

    public function CreatePostView (){
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        return view('page.post.created_page');
    }

    public function createPostProsess (Request $request){
        //validasi

       
        $request->validate([
            'deskripsi' => 'required',
            'status_view' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar_cropped' => 'required'
        ]);

       

        $organisasi  = session()->get('organisasi');
        // memawsukan data kedalam database
        $result = new Post();
        $check = $result->create([
            'organisasi_id' =>  $organisasi[0]->organisasi_id,
            'gambar_cropped' => $request->foto,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status_view
        ]);
        //pengecheckan penambahan data berhasi ?
        if(!$check){
            return redirect()->route('organisasi_post_create')->with('error','server anda bermasalah data anda tidak dapat masuk');

        }
       
        $id = $check->id;
        //memasukan gambar
        
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->gambar_cropped));
       
               $tools =  new HelperSetUpData();
               $path =  $tools->saveImg('dataApp/post/img/', $imageData ,  $organisasi[0]->username );
               
               $check_gambar =  Gambar::create([
                   'foto' => $path,
                   'post_id' => $id
             ]); 

           if(!$check_gambar){
           return redirect()->route('organisasi_post_create')->with('error','terjadi kesalahan data');
           } 
           // mengunakan dilempar ke dalam menu utama jika berhasil
           return redirect()->route('organisasi_post_view')->with('success','data berhasil ditambahkan');  

         

        
    }

    public function editPostView ($id){
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        $result = Post::find($id)->first();

        $gambar =  Gambar::where('post_id', $id)->first();

        return view('page.post.edit_page',['post' => $result, 'gambar' => $gambar]);
    }

    public function editPostProsess (Request $request){

        $request->validate([
            'deskripsi' => 'required',
            'status_view' => 'required'
        ]);
        $result =  Post::find($request->id);
        $check = $result->update([
            'deskripsi' => $request->deskripsi,
            'status' => $request->status_view
        ]);

        if(!$check){
            return redirect()->route('organisasi_post_edit_view')->with('error','server tidak dapat menyimpan problem');

        }

        return redirect()->route('organisasi_post_view')->with('success','data berhasil ditambahakan');
    }

    public function deletePost ($id) {

        if(!session()->get('organisasi')){
            return redirect('/');
        }

        //delete gambar 
        $check =Gambar::where('post_id', $id)->delete(); 
        if(!$check){
            return redirect()->route('organisasi_post_view')->with('error', 'data tidak dapat dihapus');
        }

        $check = Post::where('id', $id)->delete();


        if(!$check){
            return redirect()->route('organisasi_post_view')->with('error','data tidak dapat di hapus pada bagian post');
        }

        return redirect()->route('organisasi_post_view')->with('success', 'data berhasil dihapus');



    }

    public function rekrutmenView (){
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        $organisasi = session()->get('organisasi');

        $result = Rekrutmen::join('organisasis','rekrutmens.organisasi_id','=','organisasis.id')
                  ->where('rekrutmens.organisasi_id', $organisasi[0]->organisasi_id)
                  ->select('rekrutmens.*','organisasis.nama')->get();

        return view('page.rekrutmen.allrekrutmen_page',['rekrutmen'=> $result]);

    }

    public function rekrutmenDetail($id){
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        $result = Rekrutmen::join('organisasis','rekrutmens.organisasi_id','=','organisasis.id')
                  ->where('rekrutmens.id', $id)
                  ->select('rekrutmens.*','organisasis.nama')->first();

        $participant = ParticipantsRekrutmen::join('mahasiswas','participants_rekrutmens.mahasiswa_id','=','mahasiswas.id')
                  ->join('prodis','mahasiswas.prodi_id','=','prodis.id')
                  ->join('jurusans', 'prodis.jurusan_id','=','jurusans.id')
                  ->join('kampuses','jurusans.kampus_id','=','kampuses.id')
                  ->join('divisis','participants_rekrutmens.devisi_id','=','divisis.id')
                  ->where('rekrutmen_id', $result->id)->get();
        
        $countPeserta =  ParticipantsRekrutmen::where('rekrutmen_id', $result->id)->count();

        $gambar = Gambar::where('rekrutmen_id', $id)->first();
        return view('page.rekrutmen.detail_page',['rekrutmen' => $result, 'participasi' => $participant, 'gambar' => $gambar, 'count' => $countPeserta]);
 
    }

    public function rekrutmenCreateView (){
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        return view('page.rekrutmen.created_page');
    }

    public function rekrutmenCreateProsess (Request $request){
        
        if(!session()->get('organisasi')){
            return redirect('/');
        }
         
        $request->validate([
            'title' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'deskripsi' => 'required',
            'registration_close' => 'required',
            'registration_start' => 'required',
            'event_start' => 'required',
            'event_close' => 'required',
            'status' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            
            
        ]);
     
     
        
        $sessio = session()->get('organisasi');
        $organisasiId = $sessio[0]->organisasi_id;
       
        
        $check = Rekrutmen::create([
            'organisasi_id' => $organisasiId,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'registration_start' => $request->registration_start,
            'registration_close' => $request->registration_close,
            'event_start' => $request->event_start,
            'event_close' => $request->event_close,
            'status' => $request->status,
            
        ]);
        if(!$check){
            return redirect()->route('organisasi_rekrutmen_create')->with('error','terjadi kesalahan data');
        }

        // penegcheckan gambar
        if($request->gambar_cropped){
             $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->gambar_cropped));
        
                $tools =  new HelperSetUpData();
                $path =  $tools->saveImg('dataApp/rekrutmen/img/', $imageData ,$check->title);
                
                $check_gambar =  Gambar::create([
                    'foto' => $path,
                    'rekrutmen_id' => $check->id
            ]); 

            if(!$check_gambar){
            return redirect()->route('organisasi_rekrutmen_create')->with('error','terjadi kesalahan data');
            } 
            // mengunakan dilempar ke dalam menu utama jika berhasil
            return redirect()->route('organisasi_rekrutmen_view')->with('success','data berhasil ditambahkan');  

           //kalau misalanya  mengunakan gambar biasa

        } else  if ($request->foto){
            $tools =  new HelperSetUpData();
            $path =  $tools->saveImgFile('dataApp/rekrutmen/img/', $request->file('foto'), $check->title);

            $check_gambar =  Gambar::create([
                'foto' => $path,
                'event_id' => $check->id
            ]);
            //sudah masuk atau ada masalah
            if(!$check_gambar){
                return redirect()->route('organisasi_rekrutmen_create')->with('error','terjadi kesalahan data');
            }
            return redirect()->route('organisasi_rekrutmen_view')->with('success','data berhasil ditambahkan');  
    
        }
        return redirect()->route('organisasi_rekrutmen_create')->with('error','terjadi kesalahan data');
        
    }

    public function rekrutmenEditView ($id){
        if(!session()->get('organisasi')){
            return redirect('/');
        }

        $session = session()->get('organisasi');
        $result = Rekrutmen::where('id', $id )->first();
        $gambar = Gambar::where('rekrutmen_id', $result->id)->first();

        return view('page.rekrutmen.edit_page',['rekrutmen' => $result, 'gambar' => $gambar]);
    }

    public function rekrutmenEditProsess (Request $request){
       
        $request->validate([
            'title' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'deskripsi' => 'required',
            'registration_close' => 'required',
            'registration_start' => 'required',
            'event_start' => 'required',
            'event_close' => 'required',
            'status' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        //melakukan update
        $result =  Rekrutmen::find($request->id);
        $check = $result->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'registration_start' => $request->registration_start,
            'registration_close' => $request->registration_close,
            'event_start' => $request->event_start,
            'event_close' => $request->event_close,
            'status' => $request->status,
            
            
            
        ]);

        if(!$check){
            return redirect()->route('organisasi_rekrutmen_edit_view')->with('error','terjadi kesalahan data');
        }
        //uploud image
        

         // penegcheckan gambar
         if($request->gambar_cropped){
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->gambar_cropped));
       
               $tools =  new HelperSetUpData();
               $path =  $tools->saveImg('dataApp/rekrutmen/img/', $imageData ,$result->title);
               
               $gambar = Gambar::where('rekrutmen_id',$request->id);
               $check_gambar =  $gambar->update([
                   'foto' => $path,
                  
           ]); 

           if(!$check_gambar){
           return redirect()->back()->with('error','terjadi kesalahan data');
           } 
           // mengunakan dilempar ke dalam menu utama jika berhasil
           return redirect()->route('organisasi_rekrutmen_view')->with('success','data berhasil ditambahkan');  

          //kalau misalanya  mengunakan gambar biasa

       } else  if ($request->foto){
           $tools =  new HelperSetUpData();
           if (!$request->hasFile('foto') && !$request->file('foto')) {
            return redirect()->back()->with('error','foto data anda tidak valid');
           }
           $path =  $tools->saveImgFile('dataApp/rekrutmen/img/', $request->file('foto'), $result->title);

           $gambar = Gambar::where('rekrutmen_id',$request->id);
           $check_gambar = $gambar->update([
               'foto' => $path,
               
           ]);
           //sudah masuk atau ada masalah
           if(!$check_gambar){
               return redirect()->back()->with('error','terjadi kesalahan data');
           }
           return redirect()->route('organisasi_rekrutmen_view')->with('success','data berhasil ditambahkan');  
   
       }

        return redirect()->route('organisasi_rekrutmen_view')->with('success','data berhasil ditambahkan');

    }

    public function rekrutmenDelete ($id){
        if(!session()->get('organisasi')){
            return redirect('/');
        }
        // mengambil data  gambar
        $gambarDelete = Gambar::where('rekrutmen_id', $id)->select('foto')->first();
        // menghapus gambar
        Gambar::where('rekrutmen_id', $id)->delete();

        // menghapus gambar pada local storage

        $tools = new HelperSetUpData();
        $tools->deleteImg('storage/dataApp/rekrutmen/img/',$gambarDelete);

        //menghapus semua participant

        ParticipantsRekrutmen::where('rekrutmen_id', $id)->delete();

        //menghapus data pada event

         Rekrutmen::where('id', $id)->delete();

        return redirect()->route('organisasi_rekrutmen_view')->with('success','data berhasil dihapus');
    }


    public function rekrutmenAddAnggotaView (){
        if(!session()->get('organisasi')){
            return redirect('/');
        }
        $organisasi_id = session()->get('organisasi');

        $rekrutmen_id =  Rekrutmen::where('organisasi_id', $organisasi_id[0]->organisasi_id)->select('id')->first();
        $participant = ParticipantsRekrutmen::join('mahasiswas','participants_rekrutmens.mahasiswa_id','=','mahasiswas.id')
        ->join('prodis','mahasiswas.prodi_id','=','prodis.id')
        ->join('jurusans', 'prodis.jurusan_id','=','jurusans.id')
        ->join('kampuses','jurusans.kampus_id','=','kampuses.id')
        ->join('divisis','participants_rekrutmens.devisi_id','=','divisis.id')
        ->where('rekrutmen_id', $rekrutmen_id->id)->select('mahasiswas.*','prodis.nama_prodi','jurusans.nama_jurusan','kampuses.nama_kampus','participants_rekrutmens.id as id_peserta','divisis.nama_devisi')->get();

       

        return view('page.rekrutmen.addAnggota',['perserta' => $participant]);
        
    }

    public function rekrutmenAddAnggotaProsess ($id){
      
        if(!session()->get('organisasi')){
            return redirect('/');
        }
       $peserta = ParticipantsRekrutmen::where('id',$id )->first();
       $organisasi_id = Rekrutmen::where('id', $peserta->rekrutmen_id)->select('organisasi_id')->first();
      
       $check = Anggota::create([
        'organisasi_id' => $organisasi_id->organisasi_id,
        'devisi_id' => $peserta->devisi_id,
        'mahasiswa_id' => $peserta->mahasiswa_id,
        'status_pangkat' => 6,
       ]);


       if(!$check && !$peserta && !$organisasi_id){
        return redirect()->route('organisasi_rekrutmen_add_view')->with('error','data anggota tidak valid');
       }
       //jika sudah diterimah jadi anggota data perserta akan ototmatis terhapus

       ParticipantsRekrutmen::where('id',$id )->delete();
       
       return redirect()->route('organisasi_rekrutmen_add_view')->with('success','selamat anda mendapatkan anggota baru');
    }


 
    public function logOut (){
        //hapus sesi login
        Auth::logout();
        session()->forget('key');
        session()->flush();

        return redirect('/');
    }
}

