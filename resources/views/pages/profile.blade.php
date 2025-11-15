@extends('layouts.app')

@section('content')
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
    </div>
    <!-- Start Card Style -->
    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Start Dashboard Top  -->
                    <div class="rbt-dashboard-content-wrapper">
                        <div class="tutor-bg-photo bg_image height-350" style="background-image: url('{{config('app.uploads') . $profile->cover_image}}')">
                            <!-- <img src="assets/images/bg/bg-image-22.jpg" alt=""> -->
                        </div>
                        <!-- Start Tutor Information  -->
                        <div class="rbt-tutor-information">
                            <div class="rbt-tutor-information-left">
                                <div class="thumbnail rbt-avatars size-lg">
                                    <img src="{{config('app.uploads') . $profile->profile_image}}" alt="Instructor">
                                </div>
                                <div class="tutor-content">
                                    <h5 class="title">{{$profile->$name}}</h5>
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <ul class="rbt-meta rbt-meta-white mt--5">
                                        <li><i class="feather-user"></i> {{$profile->$title}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Tutor Information  -->
                    </div>
                    <!-- End Dashboard Top  -->
                </div>
                <div class="col-lg-12 mt--30">
                    <div class="profile-content rbt-shadow-box">
                        <h4 class="rbt-title-style-3">{{ __('Curriculum Vitae') }}</h4>
                        <div class="row g-5">
                            <div class="col-lg-8">
                                <?php echo (html_entity_decode($profile->$cv)); ?>
                                <ul class="social-icon social-default justify-content-start">
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
                                    <li>
                                        <a href="https://www.linkedin.com/company/laviedentalcenter" target="_blank">
                                            <i class="feather-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="rbt-information-list mt--15">
                                    <li>
                                        <a href="#"><i class="feather-phone"></i>{{$profile->phone}}</a>
                                    </li>
                                    <li>
                                        <a href="mailto:hello@example.com"><i class="feather-mail"></i>{{$profile->email}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 offset-lg-2">
                                <div class="feature-sin">
                                    <span class="image"><img src="assets/images/logo/signature.png" alt="signature"></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->

    <!-- Start Blog Style -->
    <div class="rbt-rbt-blog-area rbt-section-gapTop bg-color-white" id="blog">
        <div class="container">
            <div class="row g-5 align-items-end mb--30">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="section-title text-start">
                        <h2 class="title">{{ __('Latest Articles by Dr. Andrew') }}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="load-more-btn text-start text-lg-end">
                        <a class="rbt-btn-link" href="{{route('articles')}}">{{ __('Browse all articles') }} <i class="feather-arrow-right"></i></a>
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
                                            <a href="#">
                                                <img src="{{config('app.uploads')}}{{$article->main_image}}" alt="Card image">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <h5 class="rbt-card-title"><a href="#">{{$article->$title}}</a></h5>
                                            <p class="rbt-card-text">{{$article->$overview}}</p>
                                            <div class="rbt-card-bottom">
                                                <a class="transparent-button" href="#">{{ __('Read More') }}<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
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
                <!-- End Card Area -->
            </div>
        </div>
    </div>
    <!-- End Blog Style -->
@endsection
