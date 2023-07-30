<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Event;
use App\Models\Gambar;
use App\Models\Mahasiswa;
use App\Models\Organisasi;
use App\Models\ParticipantsEvent;
use App\Models\ParticipantsRekrutmen;
use App\Models\Post;
use App\Models\Rekrutmen;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Profiler\Profile;

class MobileController extends Controller
{
    // function untuk melakukan login

    public function LoginApi (Request $request){
       $validator =  Validator::make($request->all(),[
            'username' => 'required|email',
            'password' => 'required'
       ]);

       if($validator->fails()){
         return response()->json(['errors' => $validator->errors()],400);
       }

       
       $user = User::where('username', $request->username)->first();
       
       
       
       $role = Role::where('id', $user->role_id)->first();


       if(!$user) {
         return response()->json(['error' => 'User not found'],404);
       }
        
       if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
        //jika berhasil
            $user = Auth::user();
            
         if($role->nama_role == 'mahasiswa'){
             return response()->json(['status' => 'success','user' => $user ],200);
         }
         return response()->json(['error' => 'akun anda tidak memiliki aksess'],401);
       
       } else {
            return response()->json(['error' => 'Unauthoeized'], 401);
       }
    }

    public function signUpApi (Request $request){
      
      $validator =  Validator::make($request->all(),[
        'nama' => 'required|regex:/^[A-Za-z0-9\s]+$/',
        'email' => 'required|email',
        'contact' => 'required|min:10|max:15',
        'password' => 'required',
        'confirm_password'=> 'required|same:password',
      ]);

      if($validator->fails()){
        return response()->json(['errors' => $validator->errors()],400);
      }

     
      //melakukan create terhadap user

      $result = Mahasiswa::create([
        'nama' =>  $request->nama,
      ]);

      if(!$result){
        return response()->json(['errors' => 'terjadi kesalahan server'],500);
      }
      
      $user = User::create([
        'username' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => 1,
        'mahasiswa_id' => $result->id
      ]);
      if(!$user){
        return response()->json(['errors' => 'terjadi kesalahan server'],500);
      }

      return response()->json(['status' => 'success', 'message' => 'berhasil terdaftarkan silahkan login'],200);


    }


    public function getLatestPosts()
      {
          $latestPosts = Post::orderBy('created_at', 'desc')
                            ->take(10) // Ubah sesuai jumlah postingan yang ingin diambil
                            ->get();
          
                            
                          $latestPosts->each(function ($post) {
                            $post->gambars->transform(function ($gambar) {
                                $gambar->url = route('get.post.image', ['path' => $gambar->foto]);
                                return $gambar;
                            });
                        });
        
          if(empty($latestPosts)){
            return response()->json(['status'=>'error','errors' => 'not found'],401);
          }                 

          return response()->json(['status'=>'success','posts' => $latestPosts, 'message' => 'data ditemukan'], 200);
      }


      public function getPostOrganisasi($id){
        $posts = Post::where('organisasi_id', $id)->get();

                  
        $posts->each(function ($post) {
                  $post->gambars->transform(function ($gambar) {
                      $gambar->url = route('get.post.image', ['path' => $gambar->foto]);
                      return $gambar;
                  });
              });

          if(!$posts){
          return null;
          }                 

          return $posts;
      }



    public function getPostImage1($path)
    {
        $imagePath = 'dataApp/post/img/'.$path;

        

        if (Storage::disk('public')->exists($imagePath)) {
            $imageContents = Storage::disk('public')->get($imagePath);

            // Tampilkan gambar sebagai respons dengan header "Content-Type: image/jpeg"
            return response($imageContents)->header('Content-Type', 'image/jpeg');
        } else {
            return response()->json(['status'=>'error','error' => 'Gambar tidak ditemukan.'], 404);
        }
    }


      
    public function getLatestEvent()
    {
        $latestEvent = Gambar::join('events', 'gambars.event_id','=','events.id')
                          ->orderBy('created_at', 'desc')
                          ->select('events.*','gambars.foto')
                          ->take(10) // Ubah sesuai jumlah postingan yang ingin diambil
                          ->get();

                          $latestEvent->each(function ($event) {
                            $event->gambars->transform(function ($gambars) {
                                $gambars->url = route('get.event.image1', ['path' => $gambars->foto]);
                                return $gambars;
                            });
                        });
        if(empty($latestEvent)){
          return response()->json(['status'=>'error','errors' => 'not found'],401);
        }                 

        return response()->json(['status'=>'success','posts' => $latestEvent, 'message' => 'data ditemukan'], 200);
    }




      public function populerEvent()
      {
          // Query untuk mengambil 2 event_id dengan partisipasi terbanyak
          $mostFrequentEvents = ParticipantsEvent::groupBy('event_id')
              ->orderByDesc(DB::raw('count(*)'))
              ->take(2)
              ->pluck('event_id');
      
          if (isset($mostFrequentEvents) && $mostFrequentEvents->count() > 0) {
              // Lakukan query lagi untuk mendapatkan detail event berdasarkan event_id yang memiliki partisipasi terbanyak,
              // diurutkan berdasarkan partisipasi terbanyak, dan sertakan relasi images
              $mostFrequentEventsDetails = Event::with('gambars')
                  ->whereIn('id', $mostFrequentEvents)
                  ->orderByDesc(function ($query) {
                      $query->select(DB::raw('count(*)'))
                          ->from('participants_events')
                          ->whereColumn('event_id', 'events.id');
                  })
                  ->get();
      
              // Ubah path gambar menjadi URL lengkap jika dibutuhkan
              $mostFrequentEventsDetails->each(function ($event) {
                  $event->gambars->transform(function ($gambars) {
                      $gambars->url = route('get.event.image1', ['path' => $gambars->foto]);
                      return $gambars;
                  });
              });
      
              // Tampilkan hasil dalam response JSON
              return response()->json(['data' => $mostFrequentEventsDetails]);
          } else {
              // Jika tidak ada data event, kirimkan response JSON dengan pesan
              return response()->json(['status'=>'error','message' => 'Tidak ada data event.'], 404);
          }
      }
    public function getEventOrganisasi ($id){
      $posts = Event::where('organisasi_id', $id)->get();

                  
      $posts->each(function ($post) {
                $post->gambars->transform(function ($gambar) {
                    $gambar->url = route('get.event.image1', ['path' => $gambar->foto]);
                    return $gambar;
                });
            });

        if(!$posts){
        return null;
        }                 

        return $posts;
    }

      
    public function getDetailEvent(Request $request)
    {
        // Mengambil event berdasarkan ID
        $event = Event::find($request->id_event);
        $daftar =  true;

        if (empty($event)) {
            return response()->json(['status'=>'error','message' => 'Event not found'], 404);
        }

        // Mengambil partisipan event berdasarkan event_id
        $participants = ParticipantsEvent::where('mahasiswa_id', $request->mahasiswa_id)->first();

        if(empty($participants)){
            $daftar = false;
        }

        // Mengambil gambar terbaru untuk event
        $gambar = Gambar::where('event_id', $event->id)->first();

        // Jika tidak ada gambar, set url menjadi null
        $gambarUrl = $gambar ? route('get.event.image1', ['path' => $gambar->foto]) : null;

        // Mengatur data yang akan dikirimkan dalam respons JSON
        $data = [
            'event' => $event,
            'gambar_url' => $gambarUrl,
        ];

        return response()->json(['status' => 'success','daftar'=> $daftar,  'data' => $data,'message' => 'Data found'], 200);
  }

    public function getEventImage1($path)
    {
        $imagePath = 'dataApp/event/img/'.$path;

        

        if (Storage::disk('public')->exists($imagePath)) {
            $imageContents = Storage::disk('public')->get($imagePath);

            // Tampilkan gambar sebagai respons dengan header "Content-Type: image/jpeg"
            return response($imageContents)->header('Content-Type', 'image/jpeg');
        } else {
            return response()->json(['status'=>'error','message' => 'Gambar tidak ditemukan.'], 404);
        }
    }
      
      
     





    public function getLatestRekrutmen()
    {
          $latestRekrutmen = Rekrutmen::latest()
              ->take(10) // Ubah sesuai jumlah postingan yang ingin diambil
              ->get();

          $latestRekrutmen->transform(function ($rekrutmen) {
              $gambar = $rekrutmen->gambars->first();

              if ($gambar) {
                  $gambar->url =  route('get.rekrutmen.image', ['path' => $gambar->foto]);
              }

              return $rekrutmen;
          });

          return response()->json(['status' => 'success', 'posts' => $latestRekrutmen, 'message' => 'data ditemukan'], 200);
    }



    public function getRekrutmenOrganisasi($id){
      $posts = Rekrutmen::where('organisasi_id', $id)->get();

                  
      $posts->each(function ($post) {
                $post->gambars->transform(function ($gambar) {
                    $gambar->url = route('get.rekrutmen.image', ['path' => $gambar->foto]);
                    return $gambar;
                });
            });

        if(!$posts){
        return null;
        }                 

        return $posts;
    }

    
    
    public function getRekrutmenImage1($path)
    {
        $imagePath = 'dataApp/rekrutmen/img/'.$path;

        

        if (Storage::disk('public')->exists($imagePath)) {
            $imageContents = Storage::disk('public')->get($imagePath);

            // Tampilkan gambar sebagai respons dengan header "Content-Type: image/jpeg"
            return response($imageContents)->header('Content-Type', 'image/jpeg');
        } else {
            return response()->json(['message' => 'Gambar tidak ditemukan.'], 404);
        }
    }

      
    public function getDetailRekrutmen(Request $request)
    {
        // Mengambil event berdasarkan ID
        $rekrutmen = Rekrutmen::find($request->id_rekrutmen);
        $daftar = true;

        if (empty($rekrutmen)) {
            return response()->json(['status'=>'error','message' => 'Event not found'], 404);
        }

        // Mengambil partisipan event berdasarkan event_id
        $participants = ParticipantsRekrutmen::where('mahasiswa_id', $request->id_mahasiswa)->first();

        if(empty($participants)){
          $daftar=false;
        }

        // Mengambil gambar terbaru untuk event
        $gambar = Gambar::where('rekrutmen_id', $rekrutmen->id)->first();

        // Jika tidak ada gambar, set url menjadi null
        $gambarUrl = $gambar ? route('get.rekrutmen.image', ['path' => $gambar->foto]) : null;

        // Mengatur data yang akan dikirimkan dalam respons JSON
        $data = [
            'event' => $rekrutmen,
            'gambar_url' => $gambarUrl,
        ];

        return response()->json(['status' => 'success', 'daftar'=> $daftar,'data' => $data, 'message' => 'Data found'], 200);
  }

  public function getOrganisasi()
  {
        $organisasi = Organisasi::all();
            

        if(empty($organisasi)) {
          return response()->json(['status'=>'error','message' => 'Event not found'], 404);
        }

        return response()->json(['status' => 'success', 'organisasi' => $organisasi, 'message' => 'data ditemukan'], 200);
  }

  public function getDetailOrganisasi(Request $request)
  {
      
        $organisasi = Organisasi::find($request->id_organisasi);

        if(empty($organisasi)) {
          return response()->json(['status'=>'error','message' => 'Event not found'], 404);
        }
        $rekrutmen_id = Rekrutmen::where('organisasi_id',$request->id_organisasi)->select('id')->first();
        $event_id =  Event::where('organisasi_id', $request->id_organisasi)->select('id')->first();
        $post_id = Post::where('organisasi_id', $request->id_organisasi)->select('id')->first();

        $rekrutmen = $this->getRekrutmenOrganisasi($rekrutmen_id);
        $event = $this->getEventOrganisasi($event_id);
        $post_id = $this->getPostOrganisasi($post_id);

        $data = [
          'organisasi' => $organisasi,
          'rekrutmen' => $rekrutmen,
          'event' => $event,
          'post_id' =>  $post_id
        ];
        
            

        

        return response()->json(['status' => 'success', 'data' => $data, 'message' => 'data ditemukan'], 200);
  }


  //masuk controller user
  public function myEvent (Request $request){
      // mengambil data partisipant ke dalam table participant
      //event, 

      $partisipantEvent = ParticipantsEvent::join('events','participants_events.event_id','=','events.id')
        ->where('participants_events.mahasiswa_id', $request->id_mahasiswa)->get();
      
      
      $partisipantRek = ParticipantsRekrutmen::join('rekrutmens','participants_rekrutmens.rekrutmen_id','=','rekrutmens.id')
      ->where('mahasiswa_id', $request->id_mahasiswa)->get();

      if($partisipantEvent  == null &&  $partisipantRek = null){
        return response()->json(['status'=>'error','message' => 'Event not found',], 404);
      }
      $data = [
        'partisipantEvent' => $partisipantEvent,
        'partisipantRek' => $partisipantRek
      ];

      return response()->json(['status' => 'success', 'data' => $data, 'message' => 'data ditemukan'], 200);
  }

  public function userData (Request $request){
    $userdata =  User::join('mahasiswas', 'users.mahasiswa_id','=','mahasiswas.id')
                  ->select('users.*','users.id as id_user','mahasiswas.*','mahasiswas.id as id_mahasiswa',)
                  -> where('users.id', $request->id_user)->get();
    
    if($userdata == null){
      return response()->json(['status'=>'error','message' => 'Event not found'], 404);
    }
  
    

    $data = [
      'userdata' => $userdata,
    ];
    return response()->json(['status' => 'success', 'data' => $data, 'message' => 'data ditemukan'], 200);

  }

  public function changePassword (Request $request){
    $validator =  Validator::make($request->all(),[
      'password_lama' => 'required',
      'password' => 'required',
      'confirm_password'=> 'required|same:password',
    ]);

    if($validator->fails()){
      return response()->json(['errors' => $validator->errors()],400);
    }
    $result =  User::find($request->id);

    if($result == null){
      return response()->json(['status'=> 'error','message' => 'user not found'], 404);
    }
    
    if(!Hash::check($request->password_lama, $result->password)){
      return response()->json(['status'=>'error','message' => 'password lama tidak sama'], 401);
    }

    
  
    $check = $result->update([
      'password' => Hash::make($request->password)
    ]);

    if(!$check){
      return response()->json(['status' => 'error','message' => 'server not respond'], 501);
    }




    return response()->json(['status' => 'success', 'data' => $result, 'message' => 'password berhasil diubah'], 200);
    


  }

  public function getDataPribadi(Request $request){
     
    $result =  Mahasiswa::find($request->id_mahasiswa);
    $akun =  User::where('mahasiswa_id',$result->id)->first();

    if(empty($akun) && empty($result)){
      return response()->json(['status'=> 'error','message' => 'user not found'], 404);
    }
    $foto_profileUrl = route('get.profile.image',['path' => $akun->foto_profile]);
    
    if($foto_profileUrl == null){
      $foto_profileUrl= $akun->foto_profile;
    }

    $data = [
      'mahasiswa' => $result,
      'akun' => $akun,
      'foto_profile' =>$foto_profileUrl
    ];

    return response()->json(['status' => 'success', 'data' => $data, 'message' => 'data ditemukan'], 200);
  }





  public function getprofileImage1($path)
  {
      $imagePath = 'dataApp/profile/img/'.$path;

      

      if (Storage::disk('public')->exists($imagePath)) {
          $imageContents = Storage::disk('public')->get($imagePath);

          // Tampilkan gambar sebagai respons dengan header "Content-Type: image/jpeg"
          return response($imageContents)->header('Content-Type', 'image/jpeg');
      } else {
          return response()->json(['message' => 'Gambar tidak ditemukan.'], 404);
      }
  }









  public function getUbahDataPribadi (Request $request){
    $validator =  Validator::make($request->all(),[
      'foto_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
      'nama' => 'required',
      'contact'=> 'required|min:10|max:15',
    ]);  

    if($validator->fails()){
      return response()->json(['errors' => $validator->errors()],400);
    }

    $result = Mahasiswa::find($request->id_mahasiswa);
    $check =  $result->update([
      'nama' => $request->nama,
      'contact' => $request->contact
    ]);
    if(!$check){
      return response()->json(['status'=> 'error','error' => 'server is not responding'], 500);
    }

    //melakukan penyimpanan pada gamabr profile
    $path = $this->saveImgFile('dataApp/profile/img/', $request->file('foto_profile'), $result->nama);
    if(!$path) {
      return response()->json(['status'=> 'error','message' => 'server is not responding'], 500);
    }

    //melkukan update pada tabel user
    $resultUser =  User::where('mahasiswa_id', $request->id_mahasiswa);
    $check = $resultUser->update([
      'foto_profile' => $path
    ]);
    if(!$check){
      return response()->json(['status'=> 'error','error' => 'server is not responding'], 500);
    }
    


    return response()->json(['status' => 'success', 'data' => $result, 'message' => 'data berhasil diubah'], 200);

  }





  public function saveImgFile ($location, $gambar, $judulEvent){

    $namaGambar = time() . '_' . uniqid() . '.'.$judulEvent.'.' . $gambar->getClientOriginalExtension();

        // Simpan gambar ke folder "public/images"
        $gambar->storeAs('public/'.$location, $namaGambar);

        // Mendapatkan path lengkap file yang disimpan
        $pathGambar = $namaGambar;

        return $pathGambar;
}


  public function myOrganization (Request $request){
      $dataAnggota = Anggota::join('organisasis','anggotas.organisasi_id','=','organisasis.id')
                    ->where('anggotas.mahasiswa_id',$request->id_mahasiswa)
                    ->select('organisasis.nama')->get();
                    if(empty($dataAnggota)){
                      return response()->json(['status'=> 'error','error' => 'not found'], 401);
                    }   
      
    return response()->json(['status' => 'success', 'data' => $dataAnggota, 'message' => 'data ditemukan'], 200);       
  }
  
      
      
    
}
