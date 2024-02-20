<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blog";
    protected $guarded = [];

    public function blogkategoriler()
    {
        //ürünün kategorisini çektik.
        return $this->belongsToMany('App\Models\BlogKategori', 'blog_kat');
    }
}
