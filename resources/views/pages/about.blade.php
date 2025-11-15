@extends('layouts.app')
@section('content')
    
<!-- Start breadcrumb Area -->
<div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h2 class="title">{{ __('About Us') }}</h2>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">{{ __('About Us') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area -->

<?php $i=1; ?>
@foreach ($abouts as $about)

@if ($i%2 != 0)
<div class="rbt-about-area about-style-1 bg-color-white rbt-section-gap pattern-bg">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="content">
                    <img class="w-100 radius-10" src="{{config('app.uploads').$about->main_image}}" alt="About Images">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="inner pl--50 pl_sm--0 pl_md--0 pl_lg--0">
                    <div class="section-title text-start">
                        <h2 class="title text-primary">{{$about->$title}}</h2>
                        <p class="description mt--20 max-width-600"><?php echo (html_entity_decode($about->$description));?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@else
<div class="rbt-about-area about-style-1 bg-color-white rbt-section-gapBottom pattern-bg">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 order-2 order-lg-1">
                <div class="inner pl--50 pl_sm--0 pl_md--0 pl_lg--0">
                    <div class="section-title text-start">
                        <h2 class="title text-primary">{{$about->$title}}</h2>
                        <p class="description mt--20 max-width-600"><?php echo (html_entity_decode($about->$description));?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
                <div class="content">
                    <img class="w-100 radius-10" src="{{config('app.uploads').$about->main_image}}" alt="About Images">
                </div>
            </div>
        </div>
    </div>
</div>  
@endif

<?php $i++; ?>
@endforeach




@endsection