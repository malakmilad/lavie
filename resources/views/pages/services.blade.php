@extends('layouts.app')
@section('content')
    
<!-- Start breadcrumb Area -->
<div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h2 class="title">{{ __('Our Services') }}</h2>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">{{ __('Our Services') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area -->

<!-- Start Services Style -->
<div class="rbt-rbt-blog-area rbt-section-gapTop bg-color-white" id="services">
    <div class="container">
        <div class="row g-5 align-items-end mb--30">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="section-title text-start">
                    <h2 class="title">{{ __('Our Services') }}</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="load-more-btn text-start text-lg-end">
                    <a class="rbt-btn-link" href="{{route('contact')}}">{{ __('Contact Us') }} <i class="feather-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Start Card Area -->
        <div class="row g-5 mt--30">

            @foreach($services as $service)
            <!-- Start Single Card  -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mt--30">
                <div class="rbt-card variation-02 rbt-hover">
                    <div class="rbt-card-img">
                        <a href="{{url('service/'.$service->slug)}}">
                            <img src="{{config('app.uploads')}}{{$service->main_image}}" alt="Card image">
                        </a>
                    </div>
                    <div class="rbt-card-body">
                        <h5 class="rbt-card-title"><a href="{{url('service/'.$service->slug)}}">{{$service->$title}}</a></h5>
                        <p class="rbt-card-text">{{$service->$overview}}</p>
                        <div class="rbt-card-bottom">
                            <a class="transparent-button" href="{{url('service/'.$service->slug)}}">{{ __('Read More') }}
                                <i>
                                    <svg width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                            <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                            <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                        </g>
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card -->
            @endforeach

        </div>
        <!-- End Card Area -->
    </div>
</div>
<!-- End Services Style -->


@endsection
