@extends('layouts.app')
@section('content')
    
<div class="rbt-slider-main-wrapper position-relative">
    <!-- Start Banner Area  -->
    <div class="swiper rbt-banner-activation rbt-slider-animation rbt-arrow-between">
        <div class="swiper-wrapper">

            @foreach ($sliders as $slider)
                <!-- Start Single Banner  -->
                <div class="swiper-slide">
                    <div class="rbt-banner-area rbt-banner-6 variation-03 bg_image" style="background-image: url({{config('app.uploads').$slider->img}})" data-gradient-overlay="7">
                        <div class="wrapper w-100">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="inner text-center">
                                            <div class="section-title">
                                                <span class="subtitle bg-white-opacity d-inline-block">{{ $slider->$title }}</span>
                                            </div>
                                            <h1 class="title w-700">{{ $slider->$description }}</h1>
                                            <div class="button-group mt--30">
                                                <a class="rbt-btn btn-gradient rbt-marquee-btn" href="{{$slider->btn_url}}">
                                                    <span data-text="{{$slider->$btn_text}}">{{ $slider->$btn_text }}</span>
                                                </a>
                                            </div>
                                            <div class="social-share-wrapper mt--40">
                                                <ul class="social-icon social-default transparent-with-border">
                                                    <li><a href="https://www.facebook.com/laviedentalcenter" target="_blank">
                                                            <i class="feather-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="https://x.com/drandrewwagdy" target="_blank">
                                                            <i class="feather-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="https://www.instagram.com/laviedentalcenter" target="_blank">
                                                            <i class="feather-instagram"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="https://www.linkedin.com/company/laviedentalcenter" target="_blank">
                                                            <i class="feather-linkedin"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="https://www.tiktok.com/@laviedentalcenter" target="_blank">
                                                            <i class="fa-brands fa-tiktok"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span class="follow-us-text">{{ __('Follow us on social media') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Banner  -->
            @endforeach

            
        </div>

        <div class="rbt-swiper-arrow rbt-arrow-left">
            <div class="custom-overfolow">
                <i class="rbt-icon feather-arrow-left"></i>
                <i class="rbt-icon-top feather-arrow-left"></i>
            </div>
        </div>

        <div class="rbt-swiper-arrow rbt-arrow-right">
            <div class="custom-overfolow">
                <i class="rbt-icon feather-arrow-right"></i>
                <i class="rbt-icon-top feather-arrow-right"></i>
            </div>
        </div>

    </div>

    <div class="swiper rbt-swiper-thumb rbtmySwiperThumb">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="assets/images/bg/bg-image-1.png" alt="Banner Images" />
            </div>
            <div class="swiper-slide">
                <img src="assets/images/bg/bg-image-2.jpg" alt="Banner Images" />
            </div>
        </div>
    </div>
    <!-- End Banner Area  -->
</div>

<!-- Start Services Area  -->
<div class="rbt-category-area bg-color-white rbt-section-gapTop">
    <div class="container">
        <div class="row g-5">

            <div class="col-lg-12">
                <div class="swiper services-slider rbt-arrow-between icon-bg-gray gutter-swiper-30 ptb--20">
                    <div class="swiper-wrapper">

                        @foreach($services as $service)
                        <!-- Start Single item  -->
                        <div class="swiper-slide">
                            <div class="single-slide">
                                <div class="service-card service-card-5 variation-2">
                                    <div class="inner">
                                        <div class="icon">
                                            <a href="{{url('service/'.$service->slug)}}"><img src="{{config('app.uploads')}}{{$service->main_image}}" alt="services"></a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="{{url('service/'.$service->slug)}}">{{$service->$title}}</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single item  -->
                        @endforeach
    
                    </div>
    
                    <div class="rbt-swiper-arrow rbt-arrow-left">
                        <div class="custom-overfolow">
                            <i class="rbt-icon feather-arrow-left"></i>
                            <i class="rbt-icon-top feather-arrow-left"></i>
                        </div>
                    </div>
    
                    <div class="rbt-swiper-arrow rbt-arrow-right">
                        <div class="custom-overfolow">
                            <i class="rbt-icon feather-arrow-right"></i>
                            <i class="rbt-icon-top feather-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
<!-- End Services Area  -->

<!-- Start Advance Tab  -->
<div class="rbt-advance-tab-area rbt-section-gapTop bg-color-white pattern-bg">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title">{{ __('About Us') }}</h2>
                    <p class="description mt--30">{{ __('La Vie Dental Centers offer the latest techniques to ensure a healthy and attractive smile, with comprehensive medical care and a highly experienced medical team to achieve the best results.') }}</p>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 mt_md--30 mt_sm--30 order-2 order-lg-1">
                <div class="advance-tab-button advance-tab-button-1">
                    <ul class="nav nav-tabs tab-button-list" id="aboutmyTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#" class="nav-link tab-button active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">
                                <div class="tab">
                                    <h4 class="title">{{ __('Best Care for Your Teeth') }}</h4>
                                    <p class="description">{{ __('La Vie Clinics are one of the leading clinics in Egypt and the Middle East. We work to create a smile just for you, by developing a suitable treatment plan for you and taking steps towards a healthier future.') }}</p>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="#" class="nav-link tab-button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <div class="tab">
                                    <h4 class="title">{{ __('What Sets Us Apart') }}</h4>
                                    <p class="description">{{ __('Our equipment is always the latest, and we rely on modern technology in dentistry. This has made us a destination for patients from both inside and outside Egypt for dental implants, treatments, and cosmetic dentistry.') }}
                                        <br>
                                        {{ __('La Vie Centers were founded by one of the most prominent dental implant and cosmetic dentistry doctors, Dr. Andrew Wagdy, who holds a Master\'s degree in dental implants from Cairo University and is an international lecturer in smile design and laser dentistry.') }}
                                    </p>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 order-1 order-lg-2">
                <div class="tab-content">
                    <div class="tab-pane fade advance-tab-content-1 active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="thumbnail">
                            <img src="{{asset('assets/images/about/about3.png')}}" alt="advance-tab-image">
                        </div>

                    </div>
                    <div class="tab-pane fade advance-tab-content-1" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="thumbnail">
                            <img src="{{asset('assets/images/about/about1.jpg')}}" alt="advance-tab-image">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Advance Tab  -->

<!-- Start Blog Style -->
<div class="rbt-rbt-blog-area rbt-section-gapTop bg-color-white" id="blog">
    <div class="container">
        <div class="row g-5 align-items-end mb--30">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="section-title text-start">
                    <h2 class="title">{{ __('Latest Medical Articles') }}</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="load-more-btn text-start text-lg-end">
                    <a class="rbt-btn-link" href="{{ route('articles') }}">{{ __('Browse All Articles') }} <i class="feather-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Start Card Area -->
        <div class="row g-5 mt--30">
            <div class="col-lg-12">
                <div class="swiper articles-slider rbt-arrow-between icon-bg-gray gutter-swiper-30 ptb--20">
                    <div class="swiper-wrapper">
                        @foreach($articles as $article)
                        <!-- Start Single item  -->
                        <div class="swiper-slide">
                            <div class="single-slide">
                                <div class="rbt-card variation-02 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ url('article/'.$article->slug) }}">
                                            <img src="{{ config('app.uploads') . $article->main_image }}" alt="Card image"> 
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h5 class="rbt-card-title">
                                            <a href="{{ url('article/'.$article->slug) }}">{{ $article->$title }}</a>
                                        </h5>
                                        <p class="rbt-card-text">{{ $article->$overview }}</p>
                                        <div class="rbt-card-bottom">
                                            <a class="transparent-button" href="{{ url('article/'.$article->slug) }}">
                                                {{ __('Read More') }}
                                                <i>
                                                    <svg width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                            <path d="M10.614 0l5.629 5.629-5.63 5.629"/>
                                                            <path stroke-linecap="square" d="M.663 5.572h14.594"/>
                                                        </g>
                                                    </svg>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single item  -->
                        @endforeach
                    </div>

                    <div class="rbt-swiper-arrow rbt-arrow-left">
                        <div class="custom-overfolow">
                            <i class="rbt-icon feather-arrow-left"></i>
                            <i class="rbt-icon-top feather-arrow-left"></i>
                        </div>
                    </div>

                    <div class="rbt-swiper-arrow rbt-arrow-right">
                        <div class="custom-overfolow">
                            <i class="rbt-icon feather-arrow-right"></i>
                            <i class="rbt-icon-top feather-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Area -->
    </div>
</div>
<!-- End Blog Style -->

<!-- Start Faq Area  -->
<div class="rbt-accordion-area accordion-style-1 bg-color-white rbt-section-gapTop">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title">{{ __('Frequently Asked Questions') }}</h2>
                </div>
            </div>
        </div>
        <div class="row g-5 align-items-start">
            <div class="col-lg-7 order-2 order-lg-1">
                <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                    <div class="accordion" id="tutionaccordionExamplea1">

                        <?php $i = 1; ?>
                        @foreach($faqs as $faq)
                        <div class="accordion-item card">
                            <h2 class="accordion-header card-header" id="tutionheading{{ $i }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tutioncollapse{{ $i }}" aria-expanded="{{ $i == 1 ? 'true' : 'false' }}" aria-controls="tutioncollapse{{ $i }}">
                                    {{ $faq->$question }}
                                </button>
                            </h2>
                            <div id="tutioncollapse{{ $i }}" class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}" aria-labelledby="tutionheading{{ $i }}" data-bs-parent="#tutionaccordionExamplea1">
                                <div class="accordion-body card-body">
                                    <p>{!! html_entity_decode($faq->$answer) !!}</p>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                        @endforeach

                        <div class="accordion-item card">
                            <h2 class="accordion-header card-header" id="tutionheadingSix">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tutioncollapseSeven" aria-expanded="false" aria-controls="tutioncollapseSeven">
                                    {{ __('My question is not listed here!') }}
                                </button>
                            </h2>
                            <div id="tutioncollapseSeven" class="accordion-collapse collapse" aria-labelledby="tutionheadingSeven" data-bs-parent="#tutionaccordionExamplea1">
                                <div class="accordion-body card-body">
                                    <p>{{ __('A dedicated group is available to answer all dental inquiries. Join the group where Dr. Andrew Wagdy himself answers your questions.') }}</p>
                                    <a href="#share/g/fSe9yV5LPBJDLiK2/" target="_blank">#share/g/fSe9yV5LPBJDLiK2/</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
                <div class="thumbnail">
                    <img class="radius-6" src="{{ asset('assets/images/others/faq.jpg') }}" alt="histudy image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Faq Area  -->

<!-- Start Testimonial Area  -->
<div class="rbt-testimonial-area bg-color-white rbt-section-gap overflow-hidden pattern-bg" id="testimonial">
    <div class="container">
        <div class="row align-items-center row--30">
            <div class="col-lg-6">
                <!-- Start Tab Content  -->
                <div class="rbt-testimonial-content tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="testimonial-tab1" role="tabpanel" aria-labelledby="testimonial-tab1-tab">
                        <div class="inner">
                            <div class="rating mb--30">
                                <a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <p>{{ __('My experience at the dental implant and cosmetic clinic was amazing. The team was very professional and the procedure was smooth and painless. I highly recommend visiting this clinic.') }}</p>
                        </div>
                        <div class="author-info">
                            <h6><span>{{ __('Ahmed Khaled') }}</span> - {{ __('Patient at the clinic') }}</h6>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="testimonial-tab2" role="tabpanel" aria-labelledby="testimonial-tab2-tab">
                        <div class="inner">
                            <div class="rating mb--30">
                                <a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <p>{{ __('Excellent service! I was hesitant at first about the cosmetic procedure, but the team made me feel comfortable from day one. The results exceeded my expectations.') }}</p>
                        </div>
                        <div class="author-info">
                            <h6><span>{{ __('Nayra') }}</span> - {{ __('Patient at the clinic') }}</h6>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="testimonial-tab3" role="tabpanel" aria-labelledby="testimonial-tab3-tab">
                        <div class="inner">
                            <div class="rating mb--30">
                                <a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <p>{{ __('I underwent a dental implant procedure at this clinic, and it was an incredible experience. The attention to detail and patient comfort was clear from the start.') }}</p>
                        </div>
                        <div class="author-info">
                            <h6><span>{{ __('Ziad Emad') }}</span> - {{ __('Patient at the clinic') }}</h6>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="testimonial-tab4" role="tabpanel" aria-labelledby="testimonial-tab4-tab">
                        <div class="inner">
                            <div class="rating mb--30">
                                <a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <p>{{ __('One of the best clinics I have dealt with, both in terms of service and results. My smile has become more beautiful thanks to the cosmetic treatment I had here.') }}</p>
                        </div>
                        <div class="author-info">
                            <h6><span>{{ __('Laila') }}</span> - {{ __('Patient at the clinic') }}</h6>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="testimonial-tab5" role="tabpanel" aria-labelledby="testimonial-tab5-tab">
                        <div class="inner">
                            <div class="rating mb--30">
                                <a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <p>{{ __('The professional treatment and care for my dental health gave me great confidence in the clinic. I recommend it to everyone without hesitation.') }}</p>
                        </div>
                        <div class="author-info">
                            <h6><span>{{ __('Sarah') }}</span> - {{ __('Patient at the clinic') }}</h6>
                        </div>
                    </div>

                </div>
                <!-- End Tab Content  -->
            </div>
            <div class="col-lg-6 mt_md--30 mt_sm--30">
                <!-- Start Tab Nav  -->
                <ul class="testimonial-thumb-wrapper nav nav-tabs" id="myTab" role="tablist">
                    <li>
                        <a class="active" id="testimonial-tab1-tab" data-bs-toggle="tab" data-bs-target="#testimonial-tab1" role="tab" aria-controls="testimonial-tab1" aria-selected="true">
                            <div class="testimonial-thumbnai">
                                <div class="thumb"><img src="assets/images/testimonial/client-01.png" alt="Testimonial Images"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="testimonial-tab2-tab" data-bs-toggle="tab" data-bs-target="#testimonial-tab2" role="tab" aria-controls="testimonial-tab2" aria-selected="false">
                            <div class="testimonial-thumbnai">
                                <div class="thumb"><img src="assets/images/testimonial/client-02.png" alt="Testimonial Images"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="testimonial-tab3-tab" data-bs-toggle="tab" data-bs-target="#testimonial-tab3" role="tab" aria-controls="testimonial-tab3" aria-selected="false">
                            <div class="testimonial-thumbnai">
                                <div class="thumb"><img src="assets/images/testimonial/client-03.png" alt="Testimonial Images"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="testimonial-tab4-tab" data-bs-toggle="tab" data-bs-target="#testimonial-tab4" role="tab" aria-controls="testimonial-tab4" aria-selected="false">
                            <div class="testimonial-thumbnai">
                                <div class="thumb"><img src="assets/images/testimonial/client-04.png" alt="Testimonial Images"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="testimonial-tab5-tab" data-bs-toggle="tab" data-bs-target="#testimonial-tab5" role="tab" aria-controls="testimonial-tab5" aria-selected="false">
                            <div class="testimonial-thumbnai">
                                <div class="thumb"><img src="assets/images/testimonial/client-05.png" alt="Testimonial Images"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- End Tab Content  -->
            </div>
        </div>
    </div>
</div>
<!-- End Testimonial Area  -->


<div class="rbt-separator-mid">
    <div class="container">
        <hr class="rbt-separator m-0">
    </div>
</div>
    
@endsection
