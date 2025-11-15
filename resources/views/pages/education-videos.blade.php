@extends('layouts.app')

@section('content')

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">{{ __('Educational Videos') }}</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">{{ __('Educational Videos') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- start videos -->
    <div class="row">

        <div class="col-lg-12">
            <div class="swiper video-slider rbt-arrow-between icon-bg-gray gutter-swiper-30 ptb--40">
                <div class="swiper-wrapper" id="education-video">

                    @foreach ($videos as $video)
                    <!-- Start Single video  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                                <div class="inner">
                                    <div style="max-width: 100%; height:500px ; position: relative">
                                        <iframe src="{{$video->media_src}}" title="{{ __('YouTube video player') }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
