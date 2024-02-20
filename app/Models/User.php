<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "user";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hizmet()
    {
        return $this->hasMany('App\Models\Hizmet');
    }
    public function kazanilan(){
        return $this->hasMany('App\Models\Hizmet', 'hizmet_veren_id', 'id');
    }
    public function hizmetalanyorumlar()
    {
        return $this->hasMany('App\Models\Rating', 'hizmet_veren_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Rating', 'hizmet_alan_id', 'id');
    }
    public function teklif()
    {
        return $this->hasMany('App\Models\Teklif', 'hizmet_veren_id', 'id');
    }
    public function mesaj(){
        return $this->hasMany('App\Models\Mesaj', 'hizmet_alan_id', 'id');
    }
    public function derece(){
        return $this->hasMany('App\Models\Rating', 'hizmet_veren_id', 'id');
    }
    public function kategori(){
        return $this->belongsToMany('App\Models\Kategori', 'user_kategori', 'user_id', 'id');
    }
    public function bildirim(){
        return $this->hasMany('App\Models\UserBildirim');
    }
    public function siparis(){
        return $this->hasMany('App\Models\UserSiparis');
    }
    public function harcama(){
        return $this->hasMany('App\Models\UserHarcama');
    }
    public function ilan()
    {
        return $this->hasMany('App\Models\Ilan');
    }
}
