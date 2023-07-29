<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable =['organisasi_id','jenis_event_id','title','deskripsi','registrasion_start','registrasion_close','event_start','event_close','status','status_view'];
}
