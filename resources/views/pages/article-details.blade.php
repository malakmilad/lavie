@extends('layouts.app')
@section('content')

    <div class="rbt-overlay-page-wrapper">
        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="breadcrumb-image-wrapper">
                <img src="assets/images/bg/bg-image-10.jpg" alt="Education Images">
            </div>
            <div class="breadcrumb-content-top text-center">
                <ul class="meta-list justify-content-center mb--10">
                    <li class="list-item">
                        <div class="author-thumbnail">
                            <img src="{{asset('assets/images/team/avatar.jpg')}}" alt="blog-image">
                        </div>
                        <div class="author-info">
                            <a href="#">{{ __('By Dr. Andrew Wagdy') }}</a>
                        </div>
                    </li>
                    <li class="list-item">
                        <i class="feather-clock"></i>
                        <span>{{ date("d-m-Y", strtotime($article->created_at)) }}</span>
                    </li>
                </ul>
                <h1 class="title">{{ $article->$title }}</h1>
            </div>
        </div>

        <div class="rbt-blog-details-area rbt-section-gapBottom breadcrumb-style-max-width">
            <div class="blog-content-wrapper rbt-article-content-wrapper">
                <div class="content">
                    <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                        <figure>
                            <img src="{{ config('app.uploads'). $article->banner_image}}" class="max-height-500" alt="Blog Images">
                            <figcaption>{{ $article->$title }}</figcaption>
                        </figure>
                    </div>

                    <p><?php echo (html_entity_decode($article->$description)); ?></p>

                </div>
               
            </div>
        </div>
    </div>

@endsection