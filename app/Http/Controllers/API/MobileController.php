<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
       
       
       $role = Role::where('id', $user->role_id);


       if(!$user) {
         return response()->json(['error' => 'User not found'],404);
       }
        
       if(Hash::check($request->password, $user->password)){
        //jika berhasil
        $accessToken = $user->createToken('authToken')->accessToken;
         if($role->nama_role == 'mahasiswa'){
             return response()->json(['status' => 'success','user' => $user, 'access_token' => $accessToken],200);
         }
         return response()->json(['error' => 'akun anda tidak memiliki aksess'],401);
       
       } else {
            return response()->json(['error' => 'Unauthoeized'], 401);
       }
    }

    
}
