@extends("layouts.app")
@section('content')
    
<div class="rbt-conatct-area bg-gradient-1 rbt-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb--60">
                    <span class="subtitle bg-secondary-opacity">{{ __('Contact Us') }}</span>
                    <h2 class="title text-white">{{ __('La Vie Dental Implant and Cosmetic Clinics Dr. Andrew Wagdy') }}</h2>
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
                        <h4 class="title">{{ __('Our Numbers') }}</h4>
                        <p><a href="tel:+444555666777">01114959653 - 01114959365</a></p>
                        <p><a href="tel:+222222222333">01202226303 - 01201313923</a></p>
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
                        <p><a href="mailto:admin@gmail.com">info@laviedental.com</a></p>
                        <p><a href="mailto:example@gmail.com">contact@laviedental.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
                <div class="rbt-address">
                    <div class="icon">
                        <i class="feather-map-pin"></i>
                    </div>
                    <div class="inner">
                        <h4 class="title">{{ __('Branch Locations') }}</h4>
                            @foreach ($branches as $branch)
                            <p>- {{$branch->$address}}
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rbt-contact-address rbt-section-gap">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="thumbnail">
                    <img class="w-100 radius-6" src="assets/images/about/contact.jpg" alt="{{ __('Contact Images') }}">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                    <div class="section-title text-start">
                        <span class="subtitle bg-primary-opacity">{{ __('Bright Smile for All') }}</span>
                    </div>
                    <h3 class="title">{{ __('La Vie Dental Implant and Cosmetic Clinics') }}</h3>
                    <form id="contact-form" class="rainbow-dynamic-form max-width-auto" data-url="{{route('insertContactReq')}}">
                        @csrf
                        <div class="form-group">
                            <input name="fullname" id="contact-name" type="text">
                            <label>{{ __('Name') }}</label>
                            <span class="focus-border"></span>
                        </div>
                        <div class="form-group">
                            <input name="phone" id="contact-phone" type="text">
                            <label>{{ __('Phone Number') }}</label>
                            <span class="focus-border"></span>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email">
                            <label>{{ __('Email') }}</label>
                            <span class="focus-border"></span>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="contact-message"></textarea>
                            <label>{{ __('Message') }}</label>
                            <span class="focus-border"></span>
                        </div>
                        <div class="form-submit-group">
                            <button name="submit" type="submit" id="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">{{ __('Submit Now') }}</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rbt-google-map bg-color-white rbt-section-gapTop">
    <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1026.2758504726378!2d31.375997371919542!3d30.09513902071956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14581615fe21f3fb%3A0x5ceb4d290f792d9f!2s19%20El%20Shaheed%20Sayed%20Zakaria%2C%20Sheraton%20Al%20Matar%2C%20El%20Nozha%2C%20Cairo%20Governorate%204471341!5e0!3m2!1sen!2seg!4v1729785944789!5m2!1sen!2seg" height="600" style="border:0"></iframe>
</div>
@endsection
