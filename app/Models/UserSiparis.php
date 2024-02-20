<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSiparis extends Model
{
    use HasFactory;
    protected $table = "user_siparis";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function ilan(){
        return $this->belongsTo('App\Models\Ilan', 'ilan_id', 'id');
    }
}
