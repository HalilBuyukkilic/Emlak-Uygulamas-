<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IlanKategori extends Model
{
    use HasFactory;
    protected $table = 'ilan_kategori';
    protected $guarded = [];
    public function ilan()
    {
        return $this->hasMany('App\Models\Ilan', 'ilan_kategori_id', 'id');
    }
    public function master(){
        return $this->belongsTo('App\Models\IlanKategori', 'master_id');
    }
    public function subcategory(){
        return $this->hasMany('App\Models\IlanKategori', 'master_id');
    }
}
