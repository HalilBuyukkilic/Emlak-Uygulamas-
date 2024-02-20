<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilan extends Model
{
    use HasFactory;
    protected $table = "ilan";
    protected $guarded = [];
    public function kategori()
    {
        return $this->belongsTo('App\Models\IlanKategori', 'ilan_kategori_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function resim()
    {
        return $this->hasMany('App\Models\IlanResim');
    }
}
