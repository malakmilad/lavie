@extends("layouts.app")
@section('content')
    
<!-- Start breadcrumb Area -->
<div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h2 class="title">{{ __('Book Your Consultation') }}</h2>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">{{ __('Book Your Consultation') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area -->

<div class="rbt-contact-address rbt-section-gap">
    <div class="container">
        <div class="row justify-content-center g-5">

            <div class="col-lg-8">
                <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                    <div class="section-title text-center">
                        <span class="subtitle bg-primary-opacity">{{ __('Book Your Consultation Now') }}</span>
                    </div>
                    <h3 class="title text-center">{{ __('La Vie Dental Implant and Aesthetic Clinics') }}</h3>
                    <form id="consultation-form" class="rainbow-dynamic-form max-width-auto" data-url="{{route('insertConsultation')}}">
                        @csrf
                        <div class="form-group">
                            <input name="fullname" id="contact-name" type="text">
                            <label>{{ __('Full Name') }}</label>
                            <span class="focus-border"></span>
                        </div>
                        <div class="form-group">
                            <input name="phone" id="contact-phone" type="text">
                            <label>{{ __('Phone Number') }}</label>
                            <span class="focus-border"></span>
                        </div>
                        <div class="form-group">
                            <input name="service" type="text">
                            <label>{{ __('Required Service') }}</label>
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
                                    <span class="btn-text">{{ __('Book Now') }}</span>
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

@endsection
