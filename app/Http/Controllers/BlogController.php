<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogKategori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $randomyazi = Blog::inRandomOrder()->first();
        $blogyazi = Blog::orderByDesc('created_at')->paginate(5);
        $blogkate= BlogKategori::orderByDesc('id')->paginate(10);

        return view('blog.blog', compact('blogyazi', 'blogkate', 'randomyazi'));
    }
    public function category($slug_blogcategoryname){
        //kategori buluyoruz
        $blogkategori = BlogKategori::whereSlug($slug_blogcategoryname)->firstorFail();
        $randomyazi = $blogkategori->blog()->inRandomOrder()->first();
        $blogkate = BlogKategori::all();

        $blogyazi = $blogkategori->blog()->distinct()->orderByDesc('created_at')->paginate(6);


        if ($randomyazi==null){
            return back()->with('mesaj', 'Kategoride hiç yazı yok, lütfen farklı bir kategori deneyin.');
        }
        return view('blog.blog_kategori' , compact('blogkategori',  'blogyazi', 'blogkate', 'randomyazi'));
    }

    public function single($slug_blog){
        $blog = Blog::whereSlug($slug_blog)->first();
        $blogkategori = $blog->blogkategoriler()->distinct()->first();
        $ikiblog = Blog::where('baslik', 'like', "%$blog->baslik%")->where('id', '!=', $blog->id)->take(2)->get();

        return view('blog.blog_tekli' , compact('blog', 'blogkategori', 'ikiblog'));
    }
}
