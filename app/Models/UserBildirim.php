<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBildirim extends Model
{
    use HasFactory;
    protected $table = "user_bildirim";
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
