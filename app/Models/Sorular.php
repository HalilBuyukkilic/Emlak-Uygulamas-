<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorular extends Model
{
    use HasFactory;
    protected $table = "kategori_sorular";
    protected $guarded = [];
    public $timestamps=false;

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori', 'kategori_id', 'id');
    }
}
