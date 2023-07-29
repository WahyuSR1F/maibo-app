<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['mahasiswa_id','organisasi_id','devisi_id','status_pangkat','created_at','update_at'];
}
