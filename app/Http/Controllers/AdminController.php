<?php

namespace App\Http\Controllers;


use App\Models\Jurusan;
use App\Models\Kampus;
use App\Models\Organisasi;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
 

   
    public function dashboardAdmin (Request $request){
        
        $tools =  new HelperSetUpData;
        //mengambil data organisasi
        $modal = new Organisasi();
        $resultcount1 =  $tools->counting($modal);

        //data jurusan
        $modal = new Jurusan();
        $resultcount2 =  $tools->counting($modal);

        //data prodi
        $modal = new Prodi();
        $resultcount3 = $tools->counting($modal);

        //adata kampus

        $modal =  new Kampus();
        $resultcount4 = $tools->counting($modal);

        //alluser 
        $modal = new User();
        $resultcount5 =$tools->counting($modal);

        //mengambil datas session

        $sessionData = $request->session()->get('admin');

        $allData= [
            'organisasi' => $resultcount1,
            'jurusan' => $resultcount2,
            'prodi' => $resultcount3,
            'kampus' => $resultcount4,
            'user' => $resultcount5,
            'sessionData' => $sessionData
        ];

        return view('page.admin.dashboard',['allData' => $allData]);


    }

    public function allOrganisasi(Request $request)
    {
        $tools =  new HelperSetUpData;
        $modal =  new Organisasi();
        $result =  $tools->inerJoin($modal,'organisasis','kampuses','kampus_id', 'id');

        $sessionData = $request->session()->get('admin');

        $allData= [
            'organisasi' => $result,
            'sessionData' => $sessionData,
           
        ];
        
        return view('page.admin.organisator.view_organisasi',['allData' => $allData]);
    }

    public function createdOrganisasiView (){
      $tools =  new HelperSetUpData();
      $model =  new Kampus();
      $result =  $tools->getAll($model);
      

       return view('page.admin.organisator.create', ['kampus' => $result]);
    }

    public function createOrganisasi(Request $request)
    {
      $tools =  new HelperSetUpData();
       $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' =>'required',
            'nama' => 'required',
            'nickname' => 'required|regex:/^@/',
            'deskripsi' => 'required',
            'kampus_id' => 'required'
       ]);

       if($request->password != $request->confirm_password){
        return view('page.admin.organisator.create')->with('error','password dan confirm password tidak sama');
       }
       

       $result = Organisasi::create([
        'nama' => $request->nama,
        'nickname' => $request->nickname,
        'deskripsi' => $request->deskripsi,
        'kampus_id' => $request->kampus_id,
        'created_at' => now()
        ]);
      if (!$result){
        return view('page.admin.organisator.create')->with('error','terjadi kesalahan server data anda tidak dapat masuk, mohon ulangi pengisian');
      }
      

      $id_organisasi = Organisasi::where('nickname',$request->nickname)->select('id')->first();


      $result = User::create([
        'username' => $request->email,
        'password' => Hash::make($request->password),
        'foto_profile' =>'https://cdn-icons-png.flaticon.com/128/3135/3135715.png',
        'role_id' => 2,
        'organisasi_id' => $id_organisasi->id
      ]);

       if($result){
         return redirect()->route('all_organisasi');
       }else{
         return view('page.admin.organisator.create')->with('error','terjadi kesalahan server data anda tidak dapat masuk');
       }
    }


    public function userAll (){
        $tools =  new HelperSetUpData();

        $result = User::join('roles', 'users.role_id','=','roles.id')->select('users.username','users.foto_profile','roles.nama_role','users.created_at')->get();

        return view('page.admin.user.allview',["user" => $result]);

    }

    public function jurusanAll (){
      $tools =  new HelperSetUpData();
      $modal =  new Kampus();
      $kampus =  $tools->getAll($modal);

      $result = Jurusan::join('kampuses', 'jurusans.kampus_id','=','kampuses.id')->get();
    
      return view('page.admin.jurusan.jurusan',["jurusan" => $result, "kampus" => $kampus]);

   }

   public function prodiAll (){
    $tools =  new HelperSetUpData();
    $jurusan =  new Jurusan();
    $jurusan =  $tools->getAll($jurusan);


    $result = Prodi::join('jurusans', 'prodis.jurusan_id','=','jurusans.id')->join('kampuses', 'jurusans.kampus_id','=','kampuses.id')->get();
    
    return view('page.admin.prodi.prodi',["prodi" => $result, "jurusan" => $jurusan]);

    }
 
    public function kampusAll () {
      if (!Auth::check()) {
        // Pengguna telah login, izinkan mereka melanjutkan
        return redirect()->route('login');
    }
      $result = Kampus::all();
      
       
      return view('page.admin.kampus.view',['kampus' => $result]);
    }

    public function createdKampus (Request $request) {
     
      $check =  $request->validate([
        'nama_kampus' => 'required'
      ]);

      if(!$check){

      }
      $result = Kampus::create([
        'nama_kampus' => $request->nama_kampus,
      ]);


      if(!$result){
          return redirect()->route('kampus_view')->with('danger', 'maaf terjadi kesalah server mohon di isi kembali');
      }

      return redirect()->route('kampus_view')->with('success', 'data kampus berhasil ditambahkan');
    
    }

    public function editKampusView ($id){
       //mengambil value data lama
       if (!Auth::check()) {
        // Pengguna telah login, izinkan mereka melanjutkan
        return redirect()->route('login');
    }

       $result = Kampus::find($id)->first();


       return view('page.admin.kampus.edit', ['kampus' => $result]);
    }

    public function editKampusProsess (Request $request) 
    {
      
      $request->validate([
        'id' => 'required',
        'nama_kampus' => 'required'
      ]); 

      $result = Kampus::find($request->id);
      $check =  $result->update([
        'nama_kampus' => $request->nama_kampus
      ]);

      if(!$check){
        return redirect()->route('kampus-update');

      }
      return redirect()->route('kampus_view')->with('succes','update data telah berhasi');

      
    }


    public function deleteKampus($id){

      if (!Auth::check()) {
        // Pengguna telah login, izinkan mereka melanjutkan
        return redirect()->route('login');
    }
   try {
    $result = Kampus::find($id);
      
    $check = $result->delete();
   } catch (\Throwable $th) {
    session()->flash('danger', ' data gagal dihapus, terjadi kesalahan server');
    return redirect()->route('kampus_view');
   }
    

      if(!$check){
        session()->flash('danger', ' data gagal dihapus, terjadi kesalahan server');
        return redirect()->route('kampus_view');
      }
      session()->flash('success', 'Data berhasil dihapus');
      return redirect()->route('kampus_view');
      

    }



    public function createdJurusan (){
      if (Auth::check()) {
        // Pengguna telah login, izinkan mereka melanjutkan
        return view('page.admin.jurusan.create');
    }
       return redirect()->route('login');
    }

    public function createJurusan (Request $request) {
      $validator =  $request->validate([
        'name' => 'required',
        'kampus_id' => 'required',
      ]);

      if(!$validator){
        return redirect();
      }

      $check =  Jurusan::create([
        'nama_jurusan' => $request->nama_jurusan
      ]);

      if(!$check){

      }
      return redirect()->route('kampus_view');
      
    }

    public function createProdi () {
    
    
    
    }

       

}
