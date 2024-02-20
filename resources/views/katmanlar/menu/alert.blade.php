@if(session()->has('mesaj'))
    <div class="col-lg-12">
        <div class="alert alert-success mt-4">
            {{session('mesaj')}}
        </div>
    </div>
@endif
