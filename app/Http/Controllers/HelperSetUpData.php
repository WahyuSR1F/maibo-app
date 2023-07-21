<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\Unset_;

class HelperSetUpData extends Controller
{

    //to get obeject
    public function getAll( Model $model)
    {
        $result = $model::all();

        return $result;
    }
    public function counting( Model $model)
    {
        $result = $model::count();

        return $result;
    }

    public function find($key, Model $model){
        $result =  $model::find($key); 

        return $result;
    }

    public function Where($kolom,$key, Model $model){
        $result =  $model::Where($kolom,$key)->first();

        return $result;
    }


    public function hashCheck ($user, $password){
      
        if(!$user || Hash::check($password, $user)){
            return true;
        } else{
            return false;
        }
    }

    public function inerJoin(Model $modal, $awal ,$tujuan, $fkey, $fkeydes){
        $result = $modal::join($tujuan, $awal.'.'.$fkey,'=', $tujuan.'.'.$fkeydes)
        ->get();

        return $result;

    }

    public function leftJoin (Model $modal,$awal, $tujuan, $fkey, $fkeydes){
        $result = $modal::leftjoin($tujuan, $awal.$fkey,'=', $tujuan.$fkeydes)
        ->get();

        return $result;
    }

    public function selectWant (Model $modal, $kolom1=null, $kolom2=null, $kolom3=null){
        $result = $modal::select($kolom1,$kolom2,$kolom3)->get();
        
        return $result;
    }

    
    

   
}
