@extends('layouts.app')
@section('content')
    
<!-- Start breadcrumb Area -->
<div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h2 class="title">{{ __('Frequently Asked Questions') }}</h2>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">{{ __('Frequently Asked Questions') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area -->

<!-- Start Faq Area  -->
<div class="rbt-accordion-area accordion-style-1 bg-color-white rbt-section-gapTop">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title">{{ __('Frequently Asked Questions') }}</h2>
                </div>
            </div>
        </div>
        <div class="row g-5 align-items-start">
            <div class="col-lg-7 order-2 order-lg-1">
                <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                    <div class="accordion" id="tutionaccordionExamplea1">

                        <?php $i=1; ?>
                        @foreach($faqs as $faq)

                        <div class="accordion-item card">
                            <h2 class="accordion-header card-header" id="tutionheading{{$i}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tutioncollapse{{$i}}" aria-expanded="{{$i==1 ? 'true' : 'false'}}" aria-controls="tutioncollapse{{$i}}">
                                    {{$faq->$question}}
                                </button>
                            </h2>
                            <div id="tutioncollapse{{$i}}" class="accordion-collapse collapse {{$i==1 ? 'show' : ''}}" aria-labelledby="tutionheading{{$i}}" data-bs-parent="#tutionaccordionExamplea1">
                                <div class="accordion-body card-body">
                                    <p><?php echo (html_entity_decode($faq->$answer)); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php $i++; ?>
                        @endforeach
                        
                        <div class="accordion-item card">
                            <h2 class="accordion-header card-header" id="tutionheadingSix">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tutioncollapseSeven" aria-expanded="false" aria-controls="tutioncollapseSeven">
                                    {{ __('My inquiry is not in the FAQ!') }}
                                </button>
                            </h2>
                            <div id="tutioncollapseSeven" class="accordion-collapse collapse" aria-labelledby="tutionheadingSeven" data-bs-parent="#tutionaccordionExamplea1">
                                <div class="accordion-body card-body">
                                    <p>{{ __('A dedicated group to answer all dental-related inquiries. Join Dr. Andrew Wagdy, who personally answers any questions.') }}</p>
                                    <a href="https://www.facebook.com/laviedentalcentershare/g/fSe9yV5LPBJDLiK2/" target="_blank">https://www.facebook.com/laviedentalcentershare/g/fSe9yV5LPBJDLiK2/</a>
                                </div>
                            </div>
                        </div>


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
<!-- End Faq Area  -->


@endsection
