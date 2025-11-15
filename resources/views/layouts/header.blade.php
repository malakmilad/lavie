<!DOCTYPE html>
<html lang="{{$locale}}" dir="{{__('ltr')}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>La Vie Dental Centers  – Dr Andrew Wagdy</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.png')}}">

    <!-- CSS
	============================================ -->
    @if ($locale == 'ar')
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap-ltr.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animation.css') }}">
    @if ($locale == 'ar')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v1.06">
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/style-ltr.css') }}?v1.06">
    @endif

</head>


<body class="rbt-header-sticky">
    <!-- Start Header Area -->
    <header class="rbt-header rbt-header-4">
        <div class="rbt-sticky-placeholder"></div>
        <!-- Start Header Top -->
        <div class="rbt-header-top rbt-header-top-1 variation-height-50 header-space-betwween bg-color-white border-top-bar-primary-color rbt-border-bottom d-none d-xl-block">
            <div class="container-fluid">
                <div class="rbt-header-sec align-items-center ">
                    <div class="rbt-header-sec-col rbt-header-left">
                        <div class="rbt-header-content">
                            <div class="header-info">
                                <ul class="rbt-information-list">
                                    <li>
                                        <a href="#"><i class="feather-phone"></i>{{ __('01114959653 - 01202226303') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="rbt-separator"></div>
                            <div class="header-info">
                                <ul class="social-share-transparent">
                                    <li>
                                        <a href="https://www.facebook.com/laviedentalcenter" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://x.com/drandrewwagdy" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/laviedentalcenter" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://youtube.com/@laviedentalcenter?si=tz-K_yBBbFVdXlZH" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.tiktok.com/@laviedentalcenter" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="rbt-header-sec-col rbt-header-right">
                        <div class="rbt-header-content">
                            <div class="header-info">
                                <div class="header-right-btn d-flex">
                                    <a class="rbt-btn rbt-switch-btn btn-gradient btn-xs" href="{{route('consultation')}}">
                                        <span data-text="{{ __('Book Your Consultation') }}">{{ __('Book Your Consultation') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->


        <div class="rbt-header-wrapper header-space-betwween bg-color-white header-sticky">
            <div class="container-fluid">
                <div class="mainbar-row rbt-navigation-start align-items-center">
                    <div class="header-left">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="rbt-main-navigation d-none d-xl-block">
                        <nav class="mainmenu-nav">
                            <ul class="mainmenu">
                                <li class="position-static"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                                <li class="has-dropdown has-menu-child-item">
                                    <a href="#">{{ __('About Us') }}<i class="feather-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="{{route('profile')}}">{{ __('Dr. Andrew Wagdy') }}</a></li>
                                        <li><a href="{{route('about')}}">{{ __('About the Clinic') }}</a></li>
                                    </ul>
                                </li>
                                <li class="position-static"><a href="{{route('services')}}">{{ __('Our Services') }}</a></li>
                                <li class="position-static"><a href="{{route('reviews')}}">{{ __('Reviews and Interactions') }}</a></li>
                                <li class="has-dropdown has-menu-child-item">
                                    <a href="#">{{ __('Patient Guide') }}<i class="feather-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="{{route('articles')}}">{{ __('Short Articles') }}</a></li>
                                        <li><a href="{{route('faq')}}">{{ __('FAQ') }}</a></li>
                                        <li><a href="{{route('education_videos')}}">{{ __('Educational Videos') }}</a></li>
                                        <li><a href="#">{{ __('Useful Information') }}</a></li>
                                    </ul>
                                </li>
                                <li class="position-static"><a href="{{route('contact')}}">{{ __('Contact Us') }}</a></li>
                                <li class="has-dropdown has-menu-child-item">
                                    <a href="#">{{ __('Our Branches') }}<i class="feather-chevron-down"></i></a>
                                    <ul class="submenu">
                                        @foreach($branches as $branch)
                                        <li><a href='{{ url("branch/{$branch->id}") }}'>{{$branch->$name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="position-static">
                                    @if (isset($locale) && $locale == "en")
                                    <a href="{{ route('lang.change', ['locale' => 'ar']) }}" class="nav-link u-header__nav-link u-header__nav-link-border">{{ __('العربية') }} <i class="fa-solid fa-language"></i></a> 
                                    @else
                                    <a href="{{ route('lang.change', ['locale' => 'en']) }}" class="nav-link u-header__nav-link u-header__nav-link-border"><i class="fa-solid fa-language"></i> {{ __('English') }}</a> 
                                    @endif
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
        
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('assets/images/logo/signature.png')}}" alt="signature">
                            </a>
                        </div>
        
                        <!-- Navbar Icons -->
                        <ul class="quick-access">
                            <li class="access-icon rbt-user-wrapper right-align-dropdown">
                                <a class="rbt-round-btn" href="{{route('contact')}}">
                                    <i class="feather-phone"></i> 
                                </a>
                            </li>
                        </ul>
                        <!-- Start Mobile-Menu-Bar -->
                        <div class="mobile-menu-bar d-block d-xl-none">
                            <div class="hamberger">
                                <button class="hamberger-button rbt-round-btn">
                                    <i class="feather-menu"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Start Mobile-Menu-Bar -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo">
                        </a>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">{{ __('La Vie Dental Centers offer the latest technologies to ensure a healthy and attractive smile.') }}</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li>
                        <a href="#"><i class="feather-mail"></i>info@laviedental.com</a>
                    </li>
                    <li><a href="#">01114959653 - 01114959365</a></li>
                </ul>
            </div>
    
            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    <li class="position-static">
                        @if (isset($locale) && $locale == "en")
                        <a href="{{ route('lang.change', ['locale' => 'ar']) }}">{{ __('العربية') }} <i class="fa-solid fa-language"></i></a> 
                        @else
                        <a href="{{ route('lang.change', ['locale' => 'en']) }}"><i class="fa-solid fa-language"></i> {{ __('English') }}</a> 
                        @endif
                    </li>
                                
                    <li class="position-static"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                    <li class="has-dropdown has-menu-child-item">
                        <a href="#">{{ __('About Us') }}<i class="feather-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="{{route('profile')}}">{{ __('Dr. Andrew Wagdy') }}</a></li>
                            <li><a href="{{route('about')}}">{{ __('About the Clinic') }}</a></li>
                        </ul>
                    </li>
                    <li class="position-static"><a href="{{route('services')}}">{{ __('Our Services') }}</a></li>
                    <li class="position-static"><a href="#">{{ __('Useful Information') }}</a></li>
                    <li class="position-static"><a href="{{route('reviews')}}">{{ __('Reviews and Interactions') }}</a></li>
                    <li class="has-dropdown has-menu-child-item">
                        <a href="#">{{ __('Patient Guide') }}<i class="feather-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="{{route('articles')}}">{{ __('Short Articles') }}</a></li>
                            <li><a href="{{route('faq')}}">{{ __('FAQ') }}</a></li>
                            <li><a href="{{route('education_videos')}}">{{ __('Educational Videos') }}</a></li>
                        </ul>
                    </li>
                    <li class="position-static"><a href="{{route('contact')}}">{{ __('Contact Us') }}</a></li>
    
                    <li class="has-dropdown has-menu-child-item">
                        <a href="#">{{ __('Our Branches') }}<i class="feather-chevron-down"></i></a>
                        <ul class="submenu">
                            @foreach($branches as $branch)
                            <li><a href='{{ url("branch/{$branch->id}") }}'>{{$branch->$name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
    
            <div class="mobile-menu-bottom">
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="{{route('consultation')}}">
                        <span>{{ __('Book Your Consultation') }}</span>
                    </a>
                </div>
    
                <div class="social-share-wrapper">
                    <span class="rbt-short-title d-block">{{ __('Follow us on social media.') }}</span>
                    <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
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
                    </ul>
                </div>
            </div>
    
        </div>
    </div>
    

    <a class="close_side_menu" href="javascript:void(0);"></a>