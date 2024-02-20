<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMesaj extends Model
{
    use HasFactory;
    protected $table = "user_mesaj";
    protected $guarded = [];

    public function conversation(){
        return $this->belongsTo('App\Models\Mesaj', 'id', 'id');
    }
}
