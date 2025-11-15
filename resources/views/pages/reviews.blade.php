@extends('layouts.app')

@section('content')

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">{{ __('Reviews and Interactions') }}</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">{{ __('Reviews and Interactions') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- start screenshots -->
    <div class="row">

        <div class="col-lg-12 mt--50">
            <div class="section-title text-center">
                <h3 class="title">{{ __('Some Opinions') }}</h3>
            </div>
        </div>
            
        <div class="col-lg-12">
            <div class="swiper category-activation-three rbt-arrow-between icon-bg-gray gutter-swiper-30 ptb--20">
                <div class="swiper-wrapper">
                    @foreach($reviews_images as $review_i)
                    <!-- Start Single review  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="{{config('app.uploads')}}{{$review_i->media_src}}">
                                            <img src="{{config('app.uploads')}}{{$review_i->media_src}}" alt="{{ __('Review Images') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single review  -->
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
    <!-- end screenshots -->

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

                    @foreach($reviews_videos as $review_v)
                    <!-- Start Single video  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                                <div class="inner">
                                    <div style="max-width: 100%; height:500px ; position: relative">
                                        <iframe style="position: absolute; left: 10%; top: 0; width: 80%; height: 100%" src="{{$review_v->media_src}}" title="{{ __('YouTube video player') }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
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

@endsection
