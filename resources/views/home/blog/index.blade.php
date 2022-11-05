@extends('home.layout')

@section('title')
    Home
@stop

@section('top-assets')
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
@stop

@section('header')
    <header id="top">
        <div class="navbar navbar-sticky">
            <div class="container">
                <div class="row align-items-center">

                    @include('home.nav')

                    <div class="call-to-action col-12 col-lg-auto order-5 order-xl-4">
                        <a href="#" class="button button-small button-color button-filled" target="_blank"><span class="mdi mdi-rss"></span> Subscribe</a>
                        <a href="#" class="button button-small button-color button-filled" target="_blank"><span class="mdi mdi-paypal"></span> Donate</a>
                    </div>
                    <div class="site-menu-toggle col-auto order-2 order-sm-3">
                        <a href="#site-menu">
                            <span class="screen-reader-text">Toggle navigation</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="featured" class="featured-content">
            <div class="container">
                <div class="row align-items-md-center">
                    <div class="col-12 col-md">
                        <h2>Latest episodes</h2>
                    </div>
                    <div class="col-12 col-md-auto entry-description">
                        <p>We keep weekly updates, it is a promise.</p>
                    </div>
                </div>
            </div>
            <div id="featured-media" class="featured-media">
                <img src="{{ asset('/tmp/sample-post3.jpg') }}" alt="">
            </div>
        </div>
    </header>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-9">
                <div class="post-listing">
                    <div class="row masonry-grid">
                        @foreach($blog as $post)
                            <div class="col-12 col-lg-6 grid-item">
                                <article class="entry entry-post has-post-thumbnail">
                                    <div class="categories">
                                        <span class="screen-reader-text">Posted in:</span>
                                        <a href="#" rel="category tag">Updates</a>
                                    </div>
                                    <div class="entry-media entry-image">
                                        <a href="">
                                            <img src="{{ $post->image_path.$post->image }}"
                                                 width="750" height="500" alt=""></a>
                                    </div>
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="{{ route('home.blog.show', $post->id) }}" rel="bookmark">
                                                {{ $post->title }}
                                            </a>
                                        </h2>
                                    </header>
                                    <div class="entry-content">
                                        <p>{{ $post->description }}</p>
                                        <a href="{{ route('home.blog.show', $post->id) }}"
                                           class="read-more line-link">Read more</a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        <div class="grid-sizer"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <aside id="sidebar" class="widget-area">
                    <section class="widget widget_search">
                        <form role="search" method="get" class="searchform">
                            <label class="screen-reader-text">Search for:</label>
                            <input type="search" name="s" placeholder="Search&hellip;" value="">
                            <button type="submit"><span class="screen-reader-text">Search</span><span class="mdi mdi-magnify"></span></button>
                        </form>
                    </section>
                    <section class="widget widget_categories">
                        <h5 class="widget-title">Categories</h5>
                        <ul>
                            <li class="cat-item">
                                <a href="#">Blog</a> (6)
                                <ul class="children">
                                    <li class="cat-item"><a href="#">Interviews</a> (2)</li>
                                    <li class="cat-item"><a href="#">Podcast</a> (1)</li>
                                    <li class="cat-item"><a href="#">Updates</a> (3)</li>
                                </ul>
                            </li>
                            <li class="cat-item current-cat"><a href="#">Podcast</a> (6)
                                <ul class="children">
                                    <li class="cat-item"><a href="#">Season 1</a> (6)</li>
                                </ul>
                            </li>
                        </ul>
                    </section>
                    <section class="widget widget_media_gallery">
                        <h5 class="widget-title">Recent Posts</h5>
                        <div class="gallery gallery-columns-2">
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <a href="#"><img width="200" height="200" src="tmp/sample-instagram2.jpg" alt=""></a>
                                </div>
                            </figure>
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <a href="#"><img width="200" height="200" src="tmp/sample-instagram3.jpg" alt=""></a>
                                </div>
                            </figure>
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <a href="#"><img width="200" height="200" src="tmp/sample-instagram4.jpg" alt=""></a>
                                </div>
                            </figure>
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <a href="#"><img width="200" height="200" src="tmp/sample-instagram5.jpg" alt=""></a>
                                </div>
                            </figure>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
@stop
