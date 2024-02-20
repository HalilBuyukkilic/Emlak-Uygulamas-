<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = "user_rating";
    protected $guarded = [];

    public function hizmetveren(){
        return $this->belongsTo('App\Models\User','hizmet_veren_id', 'id');
    }
    public function hizmetalan(){
        return $this->belongsTo('App\Models\User','hizmet_alan_id', 'id');
    }
    public function hizmet(){
        return $this->belongsTo('App\Models\Hizmet');
    }
}
