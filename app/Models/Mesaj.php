<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesaj extends Model
{
    use HasFactory;
    protected $table = "mesaj";
    protected $guarded = [];

    public function katilimci()
    {
        return $this->belongsTo('App\Models\User', 'hizmet_veren_id', 'id');
    }
    public function katilimcii()
    {
        return $this->belongsTo('App\Models\User', 'hizmet_alan_id', 'id');
    }
    public function hizmet(){
        return $this->belongsTo('App\Models\Hizmet');
    }
    public function mesajlar(){
        return $this->hasMany('App\Models\UserMesaj');
    }
}
