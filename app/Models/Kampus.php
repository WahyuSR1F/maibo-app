<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kampus extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kampus'];
}
