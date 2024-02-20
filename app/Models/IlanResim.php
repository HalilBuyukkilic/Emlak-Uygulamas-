<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IlanResim extends Model
{
    use HasFactory;
    protected $table = "ilan_resim";
    protected $guarded = [];
    public $timestamps = false;

    public function ilan(){
        return $this->belongsTo('App\Models\Ilan');
    }
}
