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

    public function profile(){
      $session = session()->get('admin');


      $result = User::where('username', $session['email'])->select('username','foto_profile','created_at')->get();
      
      return view('page.admin.profile.profile',['profile' => $result]);
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
    
    return redirect()->route('kampus_view')->with('error'.'terjadi kesalahan server');
   }
    

      if(!$check){
        return redirect()->route('kampus_view')->with('error','terjadi kesalahan server');
      }
  
      return redirect()->route('kampus_view')->with('success', 'data berhasil dihapus');
      

    }



    public function createJurusanView(){
    if (session('admin')) {

        $result = Kampus::all();
        // Pengguna telah login, izinkan mereka melanjutkan
        return view('page.admin.jurusan.create', ['kampus' => $result ]);
    } else{
      Auth::logout();
      session()->flush();
       return redirect()->route('login_view');
    }
      
    }

    public function createJurusan (Request $request) {
     
      $validator =  $request->validate([
        'nama_jurusan' => 'required',
        'kampus_id' => 'required',
      ]);

      if(!$validator){
        return redirect()->back();
      }

      $check =  Jurusan::create([
         'kampus_id' => $request->kampus_id,
        'nama_jurusan' => $request->nama_jurusan
      ]);

      if(!$check){
        return redirect()->back();
      }
      return redirect()->route('jurusan_view')->with('success','data jurusan berhasil ditambahkan');
      
    }

    public function EditJurusanView ($id){
      if(!session('admin')){
        Auth::logout();
        session()->flush();
        return redirect()->route('login_view');
      }

      $result = Jurusan::join('kampuses', 'jurusans.kampus_id','=', 'kampuses.id')->where('jurusans.id',$id)->get();
      $kampus = Kampus::all();
      return view('page.admin.jurusan.edit',['jurusan' => $result, 'kampus' => $kampus]);
    }

    public function EditJurusanProsess (Request $request){
      
      if(!session('admin')){
        Auth::logout();
        session()->flush();
        return redirect()->route('login_view');
      }
      
      $request->validate([
        'kampus_id' => 'required',
        'nama_jurusan' => 'required',
      ]);
   
      $result = Jurusan::find($request->id);
      
      $check = $result->update([
        'kampus_id' => $request->kampus_id,
        'nama_jurusan' => $request->nama_jurusan,
      ]);

      if(!$check){
        return redirect()->route('jurusan_edit')->with('error', 'maaf terjadi kesalahan database tolong masukan sekali lagi');
      }
      return redirect()->route('jurusan_view')->with('success', 'data berhasil diperbarui');

      
    }

    public function deleteJurusan ($id){
      if(!session('admin')){
        return redirect()->route('login_view');
      }

      $result = Jurusan::find($id);
      $check = $result->delete();

      if(!$check){
        return redirect()->route('jurusan_view')->with('error', 'maaf terjadi kesalahan database');
      }
      return redirect()->route('jurusan_view')->with('success', 'data berhasil diperbarui');

    }

    public function createProdiView () {
      if(!session('admin')){
        return redirect()->route('login_view');

      }

      $result = Jurusan::all();

      
      return view('page.admin.prodi.create',['jurusan' => $result]);
    
    }

    public function createProdiProsess(Request $request){
       $request->validate([
          'nama_prodi' => 'required',
          'jurusan_id' => 'required'
       ]);

       $result = Prodi::create([
         'nama_prodi' => $request->nama_prodi,
         'jurusan_id' => $request->jurusan_id
       ]);

       if(!$result){
        return redirect()->route('prodi_create_view')->with('error','terjadi kesalahan server');
       }
       return redirect()->route('prodi_view')->with('success'.'data berhasil ditambahakan');
    }

    public function editProdiView ($id){
      if(!session('admin')){
        return redirect()->route('login_view');
      }
       $result =  Prodi::find($id)->get();
       $jurusan = Jurusan::all();

       return view('page.admin.prodi.edit',['prodi' => $result, 'jurusan' => $jurusan]);
    }

    public function editProdiProsess (Request $request){
          $request->validate([
             'nama_prodi' => 'required',
             'jurusan_id' => 'required'
          ]);

          $result = Prodi::find($request->id);
          $check = $result->update([
            'nama_prodi' => $request->nama_prodi,
            'jurusan_id' => $request->jurusan_id
          ]);

          if(!$check){

            return redirect()->route('prodi_edit_view')->with('error','terjadi kesalahan server data gagal diubah');

          }

          return redirect()->route('prodi_view')->with('success', 'data berhasil di ubah');

          
    }

       

}
