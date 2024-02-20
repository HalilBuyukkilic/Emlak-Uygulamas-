<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hizmet extends Model
{
    use HasFactory;
    protected $table = "hizmet";
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function teklif()
    {
        return $this->hasMany('App\Models\Teklif');
    }

    public function mesaj()
    {
        return $this->hasMany('App\Models\Mesaj', 'mesaj');
    }

    public function veren()
    {
        return $this->belongsTo('App\Models\User','hizmet_veren_id', 'id');
    }

    public function yorum(){
        return $this->hasOne('App\Models\Rating');
    }
}
