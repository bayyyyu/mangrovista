{{-- <section class="page-header bg_img padding-tb">
    <div class="overlay"></div>
    <div class="container">
        <div class="page-header-content-area">
            @foreach (['About', 'Informasi'] as $page)
			@if (session($page))
            <h4 class="ph-title">Pokdarwis Celincing {{ session($page) }}</h4>
            <ul class="lab-ul">
                <li><a href="{{ url('Home') }}">Home</a></li>
                <li><a class="active">{{ session($page) }}</a></li>
            </ul>
			@endif
			@endforeach
        </div>
    </div>
</section> --}}
<section class="page-header bg_img padding-tb">
    <div class="overlay"></div>
    <div class="container">
        <div class="page-header-content-area">
            @if(Request::is('about'))
                <h4 class="ph-title">Poultry Farm About us</h4>
                <ul class="lab-ul">
                    <li><a href="index.html">Home</a></li>
                    <li><a class="active">About</a></li>
                </ul>
            @elseif(Request::is('Informasi'))
                <h4 class="ph-title"> Pokdarwis Celincing | Informasi </h4>
                <ul class="lab-ul">
                    <li><a href="{{url('Home')}}">Home</a></li>
                    <li class="active">Informasi</li>
                </ul>
            @elseif(Request::is('Event'))
                <h4 class="ph-title">Pokdarwis Celincing | Event</h4>
                <ul class="lab-ul">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Event</li>
                </ul>
            @elseif(Request::is('Penanaman'))
                <h4 class="ph-title">Pokdarwis Celincing | Penanaman</h4>
                <ul class="lab-ul">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Penanaman</li>
                </ul>

            @endif
        </div>
    </div>
</section>
<style>

</style>

