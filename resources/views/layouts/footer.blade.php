<!-- Start Footer aera -->
<footer class="rbt-footer footer-style-1 bg-color-white overflow-hidden">
    <div class="footer-top">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('assets/images/logo/logo.png')}}" alt="{{ __('Logo') }}">
                            </a>
                        </div>

                        <div class="logo mt-3">
                            <a href="{{route('home')}}">
                                <img src="{{asset('assets/images/logo/signature.png')}}" alt="{{ __('Signature') }}">
                            </a>
                        </div>

                        <p class="description mt--20">{{ __('If you need high-quality, professional, and friendly dental care, look no further than our clinic.') }}</p>

                        <ul class="social-icon social-default justify-content-start">
                            <li><a href="https://www.facebook.com/laviedentalcenter">
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

                        <div class="contact-btn mt--30">
                            <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="{{route('contact')}}">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">{{ __('Contact Us') }}</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5 class="ft-title">{{ __('Important Links') }}</h5>
                        <ul class="ft-link">
                            <li>
                                <a href="{{route('home')}}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">{{ __('About Us') }}</a>
                            </li>
                            <li>
                                <a href="{{route('services')}}">{{ __('Our Services') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('Useful Information') }}</a>
                            </li>
                            <li>
                                <a href="{{route('articles')}}">{{ __('Articles') }}</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">{{ __('Contact Us') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5 class="ft-title">{{ __('Our Services') }}</h5>
                        <ul class="ft-link">
                            @foreach ($latest_services as $latest_service)
                            <li>
                                <a href="{{url('service')}}/{{$latest_service->slug}}">{{$latest_service->$title}}</a>
                            </li> 
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5 class="ft-title">{{ __('Stay Connected') }}</h5>
                        <ul class="ft-link">
                            <li><span>{{ __('Sheraton:') }}</span> <a href="#">01114959653 - 01114959365</a></li>
                            <li><span>{{ __('Dokki:') }}</span> <a href="#">01202226303 - 01201313923</a></li>
                            <li><span>{{ __('Email:') }}</span> <a href="mailto:info@laviedental.com">info@laviedental.com</a></li>
                        </ul>

                        <form class="newsletter-form mt--20" action="#">
                            <h6 class="w-600">{{ __('Branches') }}</h6>
                            @foreach($branches as $branch)
                            <a href='{{ url("branch/{$branch->id}") }}' class="description text-body mr--10" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> {{$branch->$name}}</a>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <p class="rbt-link-hover text-center">{{ __('Copyright © 2024 Lavie Centers. All rights reserved.') }}</p>
                    <p class="rbt-link-hover text-center">{{ __('All images used are taken from our branches.') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>
<!-- End Footer aera -->
<div class="rbt-progress-parent">
    <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
<!-- sal.js -->
<script src="{{ asset('assets/js/vendor/sal.js') }}"></script>
<script src="{{ asset('assets/js/vendor/swiper.js') }}"></script>

<script src="{{ asset('assets/js/vendor/backtotop.js') }}"></script>
<script src="{{ asset('assets/js/vendor/imageloaded.js') }}"></script>

<script src="{{ asset('assets/js/vendor/wow.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap-select.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- WhatsApp Floating Icon -->
<a href="https://wa.me/201114959653" target="_blank" id="whatsapp-icon">
  <i class="fa-brands fa-whatsapp"></i>
</a>

@yield('scripts')

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}?v1.03"></script>

</body>

</html>
