@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | Blog Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.blog')}}">Blog</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Yazı Ekle - Düzenle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- Your Block -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                                <i class="si si-pin"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="col-md-12">
                            <form action="{{route('yonetim.blog.kaydet', @$entry->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Ürün {{@$entry->id>0 ? "Düzenle" : "Ekle"}} </h3>
                                        <!-- Hatalar -->

                                        <div class="block-options">
                                            <button type="button" class="btn-block-option">
                                                <i class="si si-settings"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="row justify-content-center py-sm-3 py-md-5">
                                            <div class="col-sm-10 col-md-8">
                                                @if(count($errors)>0)
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li>{{$error}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="baslik">Başlık</label>
                                                    <input type="text" class="form-control form-control-alt" id="baslik" name="baslik" placeholder="Başlık" value="{{old('baslik', $entry->baslik)}}" required>
                                                </div>
                                                <div class="form-group">
                                                        <label for="icerik">Yazı</label>
                                                        <textarea class="form-control form-control-alt" id="icerik" name="icerik" rows="7" placeholder="Yazı" >{{old('icerik', $entry->icerik)}}</textarea>
                                                    </div>
                                                    <br>

                                                    @if($entry->blog_resmi!=null)
                                                        <img src="/yuklemeler/blog/{{$entry->blog_resmi}}" alt="" style="height: 250px" class="thumbnail pull-left">
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="blog_resmi">Blog Resmi:</label>
                                                        <input type="file" id="blog_resmi" name="blog_resmi">
                                                    </div>


                                                <div class="form-group">
                                                    <label for="slug">SEO</label>
                                                    <input type="hidden" name="original_slug" value="{{old('slug', $entry->slug)}}">
                                                    <input type="text" class="form-control form-control-alt" id="slug" name="slug" placeholder="SEO Adresi" value="{{old('slug', $entry->slug)}}">
                                                    <p>Burası siteadi.com/blog-basligi şeklindeki SEO ayarlamaları içindir. Örn: kosu-bandi-nedir

                                                        <br>Boş bırakılırsa otomatik oluşturulacaktır. Başlık:Koşu Bandı Nedir? ise bu değer kosu-bandi-nedir olacaktır </p>
                                                </div>

                                                            <div class="form-group">
                                                                <label for="blogkategoriler">Kategoriler</label>
                                                                <select name="blogkategoriler[]" class="form-control" id="blogkategoriler" multiple>
                                                                    @foreach($blogkategoriler as $kategori)
                                                                        <!-- collect komutu: verilen değeri koleksiyona dönüştürüyor. contains-->
                                                                    <option value="{{$kategori->id}}" {{ collect(old('blogkategoriler', $blog_kategorileri))->contains($kategori->id) ? 'selected' : '' }}>{{$kategori->kategori_adi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <p>Birden çok kategori ekleyebilirsiniz</p> <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full block-content-sm bg-body-light text-center">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fa fa-check"></i>
                                            {{@$entry->id>0 ? "Güncelle" : "Kaydet"}}
                                        </button>
                                        <button type="reset" class="btn btn-sm btn-light">
                                            <i class="fa fa-repeat"></i> Sıfırla
                                        </button>
                                    </div>
                                </div>
                                <script>
                                    var options = {
                                        uiColor: '#f4645f',
                                        language: 'tr',
                                        extraPlugins: 'autogrow',
                                        autoGrow_minHeight: 250,
                                        autoGrow_maxHeight: 600,
                                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='

                                    };
                                    CKEDITOR.replace('icerik', options);
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Your Block -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

    </div>
@section('script')

    <script>
        $(function () {
            $('#blogkategoriler').select2({
                placeholder: 'Kategori Seçiniz'
            });

        });
    </script>
@endsection
@endsection
