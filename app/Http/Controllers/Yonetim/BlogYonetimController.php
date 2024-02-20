<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogKategori;
use Illuminate\Http\Request;

class BlogYonetimController extends Controller
{

    public function index(){

        $list2 = BlogKategori::orderByDesc('id')->get();
        $list = Blog::orderByDesc('id')->get();
        return view('yonetim.blog.anasayfa', compact('list','list2'));
    }
    //ÜRÜN DÜZENLEME SAYFASI
    public function form($id = 0)
    {
        $entry = new Blog;
        $blog_kategorileri = [];
        //DÜZENLEME AMACI İLE GELDİĞİMİZİ ANLIYORUZ
        if ($id>0)
        {
            $entry = Blog::find($id);
            //pluck belirli bir tablodan belirli bir kolonu almaya yarar
            $blog_kategorileri = $entry->blogkategoriler()->pluck('blog_kategori_id')->all();
        }
        //KATEGORİ ÇEKME
        $blogkategoriler = BlogKategori::all();
        return view('yonetim.blog.form', compact('entry', 'blogkategoriler', 'blog_kategorileri'));
    }
    //ÜRÜN GÜNCELLEME
    public function kaydet($id = 0)
    {

        //formdan gelen bilgileri dataya ekledik
        $data = request()->only('baslik', 'slug', 'icerik');

        //SLUG DEĞERİ BOŞSA OTOMATİK SLUG ATAYACAK
        if (!request()->filled('slug')) {
            $data['slug']=str_slug(request('baslik'));
            request()->merge(['slug'=> $data['slug']]);
        }

        $this->validate(request(), [
            'baslik' => 'required',
            'icerik' => 'required',
            //kategorideki slug değeri zaten eklenmişse izin vermicek
            'slug'=>(request('original_slug')!=request('slug') ? 'unique:blog,slug' : '')
        ]);

        $blogkategoriler = request('blogkategoriler');

        //KATEGORİ IDSİ VARMI YOKMU? VARSA GÜNCELLE
        if ($id>0)
        {
            $entry = Blog::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->blogkategoriler()->sync($blogkategoriler);
            $entry->blogkategoriler()->attach($blogkategoriler);
        }
        else {
            $entry = Blog::create($data);
            $entry->blogkategoriler()->attach($blogkategoriler);
            //gelen kategorileri ürünün kategorilerine ekledik


        }
        //RESİM EKLEME
        if (request()->hasFile('blog_resmi'))
        {
            $this->validate(request(), [
                'blog_resmi' => 'image|mimes:jpg,png,jpeg,gif'
            ]);
            $blog_resmi = request()->file('blog_resmi');
            $blog_resmi = request()->blog_resmi;
            $dosyaadi = $entry->id . "-" . time() . "." . $blog_resmi->getClientOriginalName();

            if ($blog_resmi->isValid())
            {
                $blog_resmi->move('upload/image/blog', $dosyaadi);
                Blog::where('id', $entry->id)->update(['blog_resmi' => $dosyaadi]);
            }
        }

        return redirect()
            ->route('yonetim.blog');
        //->with('mesaj' ($id>0 ? 'Güncellendi' : 'Kaydedildi'))
    }
    //ÜRÜN SİLME
    public function sil($id)
    {
        $blog = Blog::find($id);
        //kategorilerden kaldırdık
        $blog->blogkategoriler()->detach();
        //ürünün kaydını sildik
        $blog->delete();
        return redirect()->route('yonetim.blog');
        //->with('mesaj', 'kayıt silindi')
        //->with('mesaj_tur', 'success');
    }
    //KATEGORİ DÜZENLEME SAYFASI
    public function formk($id = 0)
    {
        $entry2 = new BlogKategori;
        //DÜZENLEME AMACI İLE GELDİĞİMİZİ ANLIYORUZ
        if ($id>0)
        {
            $entry2 = BlogKategori::find($id);
        }
        return view('yonetim.blog.formkategori', compact('entry2'));
    }
    //KATEGORİ GÜNCELLEME
    public function kaydetk($id = 0)
    {

        //formdan gelen bilgileri dataya ekledik
        $data2 = request()->only('kategori_adi', 'slug');

        //SLUG DEĞERİ BOŞSA OTOMATİK SLUG ATAYACAK
        if (!request()->filled('slug')) {
            $data2['slug']=str_slug(request('kategori_adi'));
            request()->merge(['slug'=> $data2['slug']]);
        }

        $this->validate(request(), [
            'kategori_adi' => 'required',
            //kategorideki slug değeri zaten eklenmişse izin vermicek
            'slug'=>(request('original_slug')!=request('slug') ? 'unique:blog_kategori,slug' : '')
        ]);


        //KATEGORİ IDSİ VARMI YOKMU? VARSA GÜNCELLE
        if ($id>0)
        {
            $entry2 = BlogKategori::find($id);
            $entry2->update($data2);

        }
        else {
            $entry2 = BlogKategori::create($data2);
        }

        return redirect()
            ->route('yonetim.blog');
        //->with('mesaj' ($id>0 ? 'Güncellendi' : 'Kaydedildi'))
    }
    //KATEGORİ SİLME
    public function silk($id)
    {
        $kategori = BlogKategori::find($id);
        $kategori->blog()->detach();
        $kategori->delete();
        //Kategori::destroy($id);
        return redirect()->route('yonetim.blog');
        //->with('mesaj', 'kayıt silindi')
    }
}
