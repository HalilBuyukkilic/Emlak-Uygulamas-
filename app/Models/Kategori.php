<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $guarded = [];

    public function hizmet()
    {
        return $this->hasMany('App\Models\Hizmet', 'kategori_id', 'id');
    }
    public function master(){
        return $this->belongsTo('App\Models\Kategori', 'master_id')->withDefault([
            'name'=>'-'
        ]);
    }

    public function subcategory(){
        return $this->hasMany('App\Models\Kategori', 'master_id');
    }
    public function user(){
        return $this->belongsToMany('App\Models\User', 'user_kategori');
    }
    public function sorular(){
        return $this->hasMany('App\Models\Sorular', 'kategori_id', 'id');
    }
}
