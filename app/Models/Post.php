<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['organisasi_id','deskripsi','status','created_at','update_at'];

    public function gambars()
    {
        return $this->hasMany(Gambar::class, 'post_id');
    }
}
