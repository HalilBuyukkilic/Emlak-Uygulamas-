<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogKategori extends Model
{
    use HasFactory;
    protected $table = "blog_kategori";
    protected $guarded = [];
    public $timestamps = false;
    public function blog()
    {
        //kategori içerisindeki ürünleri çektik.
        return $this->belongsToMany('App\Models\Blog', 'blog_kat');
    }
}
