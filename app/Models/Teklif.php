<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teklif extends Model
{
    use HasFactory;
    protected $table = "teklif";
    protected $guarded = [];

    public function hizmet(){
        return $this->belongsTo('App\Models\Hizmet');
    }
    public function veren()
    {
        return $this->belongsTo('App\Models\User','hizmet_veren_id', 'id');
    }
}
