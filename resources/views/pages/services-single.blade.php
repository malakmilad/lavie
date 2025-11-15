@extends('layouts.app')
@section('content')
    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">{{ __('Services') }}</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">{{ __('Services') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-single-product-area rbt-single-product rbt-section-gap">
        <div class="container">
            <div class="row g-5 row--30 align-items-center">
                <div class="col-lg-6">
                    <div class="thumbnail">
                        <img class="w-100 radius-10" src="{{config('app.uploads')}}{{$service->main_image}}" alt="Product Images">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content">

                        <h2 class="title mt--10 mb--10">{{ $service->$title }}</h2>

                        <p class="mt--20"><?php echo (html_entity_decode($service->$description)); ?></p>

                        <div class="product-action mb--20">
                            <div class="addto-cart-btn">
                                <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{route('contact')}}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">{{ __('Contact Us') }}</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($service_faqs))
    <!-- Start faq Area  -->
    <div class="rbt-accordion-area accordion-style-1 bg-color-white rbt-section-gapTop">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-7 order-2 order-lg-1">
                    <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                        <div class="accordion" id="tutionaccordionExamplea1">

                        <?php $i=1; ?>
                        @foreach($service_faqs as $faq)

                        <div class="accordion-item card">
                            <h2 class="accordion-header card-header" id="tutionheading{{$i}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tutioncollapse{{$i}}" aria-expanded="{{$i==1 ? 'true' : 'false'}}" aria-controls="tutioncollapse{{$i}}">
                                    {{$faq->$question}}
                                </button>
                            </h2>
                            <div id="tutioncollapse{{$i}}" class="accordion-collapse collapse {{$i==1 ? 'show' : ''}}" aria-labelledby="tutionheading{{$i}}" data-bs-parent="#tutionaccordionExamplea1">
                                <div class="accordion-body card-body">
                                    <p><?php echo (html_entity_decode($faq->$answer)); ?></p>
                                    @if($faq->link)
                                    <div style="max-width: 100%; height:315px ; position: relative">
                                        <iframe style="position: absolute; left: 0; top: 0; width: 100%; height: 100%" src="{{$faq->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    @endif
                                    @if($faq->video)
                                    <a href="{{config('app.uploads').$faq->video}}" target="_blank" class="text-primary"><i class="fa fa-play"></i> {{ __('Watch Video') }}</a> 
                                    @endif
                                </div>
                            </div>
                        </div>

                        <?php $i++; ?>
                        @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2">
                    <div class="thumbnail">
                        <img class="radius-6" src="{{asset('assets/images/others/faq.jpg')}}" alt="histudy image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End faq Area  -->
    @endif

    @if (isset($service->imgs))
    <!-- start images -->
    <div class="row">

        <div class="col-lg-12 mt--50">
            <div class="section-title text-center">
                <h3 class="title">{{ __('Images') }}</h3>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="swiper category-activation-three rbt-arrow-between icon-bg-gray gutter-swiper-30 ptb--20">
                <div class="swiper-wrapper">

                    @foreach(explode(', ', $service->imgs) as $img)
                    <!-- Start Single image  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <img class="radius-10" width="290px" src="{{config('app.uploads')}}{{$img}}" alt="Product Images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single image  -->
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
    <!-- end images -->
    @endif

    @if($service->youtube_urls)
    <!-- start videos -->
    <div class="row">

        <div class="col-lg-12 mt--50">
            <div class="section-title text-center">
                <h3 class="title">{{ __('Videos') }}</h3>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="swiper video-slider rbt-arrow-between icon-bg-gray gutter-swiper-30 ptb--20">
                <div class="swiper-wrapper">

                    @foreach(explode(", ", $service->youtube_urls) as $service_video)
                    <!-- Start Single video  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                                <iframe class="youtube-video" width="860" height="400" src="{{$service_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- End Single video  -->
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
    <!-- end videos -->
    @endif

    @if (isset($service_reviews))
    <!-- start reviews -->
    <div class="row">

        <div class="col-lg-12 mt--50">
            <div class="section-title text-center">
                <h3 class="title">{{ __('Reviews') }}</h3>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="swiper category-activation-three rbt-arrow-between icon-bg-gray gutter-swiper-30 ptb--20">
                <div class="swiper-wrapper">

                    @foreach($service_reviews as $service_review)
                    <!-- Start Single image  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <img class="w-100 radius-10" src="{{config('app.uploads')}}{{$service_review->img}}" alt="Product Images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single image  -->
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
    <!-- end reviews -->
    @endif

@endsection
