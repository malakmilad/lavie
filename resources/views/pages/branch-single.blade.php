@extends("layouts.app")
@section('content')
    
<div class="rbt-conatct-area bg-gradient-1 rbt-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb--60">
                    <span class="subtitle bg-secondary-opacity">{{ __('Contact Us') }}</span>
                    <h2 class="title text-white">{{ $branch->$name }}</h2>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                <div class="rbt-address">
                    <div class="icon">
                        <i class="feather-headphones"></i>
                    </div>
                    <div class="inner">
                        <h4 class="title">{{ __('Branch Numbers') }}</h4>
                        <p><a href="tel:+444555666777">{{ $branch->phone_1 }} - {{ $branch->phone_2 }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                <div class="rbt-address">
                    <div class="icon">
                        <i class="feather-mail"></i>
                    </div>
                    <div class="inner">
                        <h4 class="title">{{ __('Email') }}</h4>
                        <p><a href="mailto:example@gmail.com">{{ $branch->email }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
                <div class="rbt-address">
                    <div class="icon">
                        <i class="feather-map-pin"></i>
                    </div>
                    <div class="inner">
                        <h4 class="title">{{ __('Detailed Address') }}</h4>
                        <p>{{ $branch->$address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rbt-google-map bg-color-white rbt-section-gapTop">
    <iframe 
        class="w-100" 
        src="https://www.google.com/maps?q={{ $branch->latitude }},{{ $branch->longitude }}&hl=en&z=14&output=embed" 
        height="600" 
        style="border:0" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    $(document).ready(function() {
        var map = L.map('map').setView([{{ $branch->latitude }}, {{ $branch->longitude }}], 13); 
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { 
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' 
        }).addTo(map); 
        L.marker([{{ $branch->latitude }}, {{ $branch->longitude }}]).addTo(map)
            .bindPopup("<b>{{ __('Branch Location') }}</b><br>{{ __('Latitude') }}: {{ $branch->latitude }}<br>{{ __('Longitude') }}: {{ $branch->longitude }}")
            .openPopup();
    });
</script>
@endsection
