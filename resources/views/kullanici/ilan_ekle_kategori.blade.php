@extends('katmanlar.usermaster')
@section('title', 'Toprak Konut - İlan Kategorisi Seç')
@section('content')
    <div class="dashboard-container">
    @include('kullanici.sidebar')
    <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>İlan Kategori Seçimi</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{route('dashboard')}}">Profilim</a></li>
                            <li>İlan Ekle</li>
                        </ul>
                    </nav>
                </div>


                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-feather-folder-plus"></i> Kategori ve Konum Seçimi</h3>
                            </div>

                            @include('katmanlar.menu.alert')

                            <div class="content with-padding padding-bottom-10">
                                <form action="{{route('ilan.ekle')}}" method="get" id="snackbar-place-bid">

                                <div class="row">

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>İlan Kategorisi</h5>
                                            <select class="selectpicker with-border" name="kategori_id" data-size="7" title="Kategori Seçiniz" required="true">
                                                <option value="1">Konut</option>
                                                <option value="10">İşyeri</option>
                                                <option value="39">Arsa</option>
                                                <option value="40">Bina</option>
                                                <option value="41">Devremülk</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Satılık / Kiralık </h5>
                                            <select class="selectpicker with-border" name="durum" data-size="7" title="Durumunu Seçiniz" required="true">
                                                <option value="1">Satılık</option>
                                                <option value="2">Kiralık</option>
                                                <option value="3">Devren Satılık</option>
                                                <option value="4">Devren Kiralık</option>
                                            </select>
                                        </div>
                                    </div>





                                </div>


                                    <hr/>


                                    <div class="form-group">
                                        <label for="country">Ülke</label>
                                        <select class="form-control" id="country-dropdown" name="ulke" required="true">
                                            <option value="">Ülke Seçiniz</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}">
                                                    {{$country->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">İl</label>
                                        <select class="form-control" name="il" id="state-dropdown" required="true">
                                            <option value="">Ülke Seçiniz</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">İlçe - Mahalle</label>
                                        <select class="form-control" name="ilce" id="city-dropdown" required="true">
                                            <option value="">İl Seçiniz</option>
                                        </select>
                                    </div>


                                        <div class="form-group">
                                            <h5>Cadde Sokak Giriniz</h5>
                                            <input id="autocomplete-input" type="text" placeholder="Cadde Sokak Adı Giriniz">
                                            <input type="hidden" id="city2" name="city2" />
                                            <input type="hidden" id="cityLat" name="cityLat" />
                                            <input type="hidden" id="cityLng" name="cityLng" />
                                        </div>



                                    <div class="form-group">
                                        <input type="submit" id="snackbar-place-bid" class="button uploadButton-button ripple-effect move-on-hover full-width margin-top-30" onsubmit="this.disabled=true;this.value='Lütfen Bekleyiniz...'; this.form.submit();" value="İlerle">
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- Row / End -->
                <!-- Footer -->
            @include('kullanici.copyright')
            <!-- Footer / End -->

            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->
@endsection
@section('footer')
    <script type=text/javascript>
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {
                var country_id = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url:"{{url('get-states-by-country')}}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#state-dropdown').html('<option value="">İl Seçiniz</option>');
                        $.each(result.states,function(key,value){
                            $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                        $('#city-dropdown').html('<option value="">Önce İl Seçiniz</option>');
                    }
                });
            });
            $('#state-dropdown').on('change', function() {
                var state_id = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url:"{{url('get-cities-by-state')}}",
                    type: "POST",
                    data: {
                        state_id: state_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#city-dropdown').html('<option value="">İlçe - Mahalle Seçiniz</option>');
                        $.each(result.cities,function(key,value){
                            $("#city-dropdown").append('<option value="'+value.id+'">'+value.ilce+' - '+value.mahalle+'</option>');
                        });
                    }
                });
            });
        });
    </script>


@endsection
