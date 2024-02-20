<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKategori extends Model
{
    use HasFactory;
    protected $table = "user_kategori";
    protected $guarded = [];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function kategori(){
        return $this->belongsTo('App\Models\HizmetKategori');
    }
}
