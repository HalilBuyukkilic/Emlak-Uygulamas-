<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHarcama extends Model
{
    use HasFactory;
    protected $table = "user_harcama";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function hizmet(){
        return $this->belongsTo('App\Models\Hizmet');
    }
}
