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
                <div class="episodes-listing">
                    @foreach($podcasts as $podcast)
                        <article class="entry entry-episode has-post-thumbnail">
                            <div class="row align-items-lg-center">
                                <div class="col-12 col-lg-4">
                                    <div class="entry-media">
                                        <a href="/{{ route('home.podcast.show', $podcast->id) }}">
                                            <img src="{{ $podcast->image_path.$podcast->image }}"
                                                 alt="" width="480" height="480">
                                        </a>
                                        <span class="ribbon">new</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <header class="entry-header">
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                <span class="screen-reader-text">Posted on</span>
                                                <a href="" rel="bookmark">
                                                    <time datetime="2019-04-03T21:32:07+02:00"
                                                          class="entry-date published">September 3, 2018</time>
                                                    <time datetime="2019-04-03T21:32:07+02:00" class="updated">
                                                        September 4, 2019</time>
                                                </a>
                                            </span>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="" rel="bookmark">
                                                Visiting my best friend's city for the first time</a>
                                        </h2>
                                    </header>
                                    <div class="entry-audio">
                                        <!-- audio tag starts here -->
                                        <audio controls autoplay style="width: 100%;">
                                            <source src="/{{ $podcast->audio_path.$podcast->audio }}"
                                                    type="audio/mp3">
                                            <source src="/{{ $podcast->audio_path.$podcast->audio }}"
                                                    type="audio/ogg">
                                            <source src="/{{ $podcast->audio_path.$podcast->audio }}"
                                                    type="audio/ogg">
                                        </audio>
                                    </div>
                                    <div class="entry-content">
                                        <p>{{ $podcast->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <aside id="sidebar" class="widget-area">
                    <section class="widget widget_search">
                        <form role="search" method="get" class="searchform">
                            <label class="screen-reader-text">Search for:</label>
                            <input type="search" name="s" placeholder="Search…" value="">
                            <button type="submit"><span class="screen-reader-text">Search</span><span class="mdi mdi-magnify"></span></button>
                        </form>
                    </section>
                    <section class="widget widget_text widget_subscribe">
                        <h5 class="widget-title">Subscribe now!</h5>
                        <div class="textwidget">
                            <p>
                                <img style="display: block; margin: 0.5em auto 1em;" src="tmp/itunes-subcribe.png" alt="subscribe-itunes" width="108" height="108">
                            </p>
                            <p>
                                <a class="button button-underline" href="#" target="_blank" rel="noopener noreferrer"><span class="mdi mdi-apple"></span> iTunes</a> <a class="button button-underline" href="#" target="_blank" rel="noopener noreferrer"><span class="mdi mdi-podcast"></span> Stitcher</a> <a class="button button-underline" href="#" target="_blank" rel="noopener noreferrer"><span class="mdi mdi-google-play"></span> Google Play</a> <a class="button button-underline" href="#" target="_blank" rel="noopener noreferrer"><span class="mdi mdi-rss"></span> RSS</a>
                            </p>
                        </div>
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
                        <h5 class="widget-title">Recent photos</h5>
                        <div class="gallery gallery-columns-2">
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <a href="#"><img src="tmp/sample-instagram2.jpg" alt="" width="200" height="200"></a>
                                </div>
                            </figure>
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <a href="#"><img src="tmp/sample-instagram3.jpg" alt="" width="200" height="200"></a>
                                </div>
                            </figure>
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <a href="#"><img src="tmp/sample-instagram4.jpg" alt="" width="200" height="200"></a>
                                </div>
                            </figure>
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <a href="#"><img src="tmp/sample-instagram5.jpg" alt="" width="200" height="200"></a>
                                </div>
                            </figure>
                        </div>
                    </section>
                    <section class="widget widget_tag_cloud">
                        <h5 class="widget-title">Tags</h5>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">adventure</a> <a href="#" class="tag-cloud-link">audio</a> <a href="#" class="tag-cloud-link">branding</a> <a href="#" class="tag-cloud-link">citrus</a> <a href="#" class="tag-cloud-link">gallery</a> <a href="#" class="tag-cloud-link">goodbyes</a> <a href="#" class="tag-cloud-link">handmade</a> <a href="#" class="tag-cloud-link">lessons</a> <a href="#" class="tag-cloud-link">life</a> <a href="#" class="tag-cloud-link">power</a> <a href="#" class="tag-cloud-link">project</a> <a href="#" class="tag-cloud-link">seed</a> <a href="#" class="tag-cloud-link">talk</a> <a href="#" class="tag-cloud-link">zen</a>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
@stop
