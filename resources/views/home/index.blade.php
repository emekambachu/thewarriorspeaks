@extends('home.layout')

@section('title')
    Home
@stop

@section('top-assets')

@stop

@section('top-content')
    <header id="top">
        <div class="navbar navbar-sticky">
            <div class="container">
                <div class="row align-items-center">

                    <div class="site-title col col-lg-auto order-first">
                        <h1>
                            <a href="{{ url('/') }}" class="custom-logo-link" rel="home">
                                <img src="{{ asset('/logo.png') }}" class="custom-logo" width="98" height="30" alt="Amazon warriors podcast">
                            </a>
                        </h1>
                    </div>
                    <nav id="site-menu" class="col-12 col-lg order-3 order-sm-4 order-lg-2">
                        <ul>
                            <li class="menu-item menu-item-has-children current-menu-parent">
                                <a href="{{ route('home.index') }}">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="episodes.html">Podcasts</a>
                            </li>
                            <li class="menu-item">
                                <a href="styleguide.html">Blog</a>
                            </li>
                            <li class="menu-item"><a href="contact.html">Author</a></li>
                            <li class="menu-item"><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
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
                <div class="row">
                    <div class="col-12 col-lg-7 col-xl-6">
                        <h6 class="subtitle">Latest episode</h6>
                        <h2><a href="single-episode.html">Dreams of an artist and unique ideas scattered through a deserted mind</a></h2>
                        <p>This is not meant to be pleasant or polite. It is supposed to be true and unique. Yes, that's what I try every day... to be unique.</p>
                        <div id="latest-episode-player" class="podcast-episode-player"
                             data-episode-download="https://html.liviucerchez.com/common/preview1.mp3" data-episode-download-button="Download Episode (831.6 KB)"
                             data-episode-transcript="#" data-episode-transcript-button="View Transcript" data-episode-duration="00:41" data-episode-size="831.6 KB">
                            <audio class="wp-audio-shortcode" preload="none">
                                <source src="https://html.liviucerchez.com/common/preview1.mp3" type="audio/mpeg" />
                                <source src="https://html.liviucerchez.com/common/preview1.ogg" type="audio/ogg" />
                            </audio>
                        </div>
                        <p><a href="" class="line-link">Follow us on social media</a></p>
                    </div>
                </div>
            </div>
            <div class="social-navigation">
                <a title="Facebook Profile" target="_blank" href="https://facebook.com/"><span class="screen-reader-text">Facebook Profile</span></a>
                <a title="YouTube Channel" target="_blank" href="https://youtube.com/"><span class="screen-reader-text">YouTube Channel</span></a>
            </div>
            <div id="featured-media" class="featured-media">
                <img src="{{ asset('/images/home/1.jpg') }}" alt="">
            </div>
        </div>
    </header>
@stop

@section('content')
    <div id="latest-tab-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-container">
                        <ul class="tabs">
                            <li class="active"><a href="#tab-episodes"><span class="d-none d-md-inline-block">Podcast</span> Episodes</a></li>
                            <li><a href="#tab-news"><span class="d-none d-md-inline-block">Blog</span> Posts</a></li>
                            <li><a href="#tab-instagram-feed"> <span class="d-none d-md-inline-block">Latest</span> From Instagram</a></li>
                        </ul>
                        <div id="tab-episodes" class="tab-content active">
                            <div class="episodes-listing">
                                @foreach($podcast as $post)
                                <article class="entry entry-episode has-post-thumbnail">
                                    <div class="row align-items-lg-center">
                                        <div class="col-12 col-md-4 col-xl-3">
                                            <div class="entry-media">
                                                <a href="{{ route('podcast.show', $post->id) }}">
                                                <img src="{{ $post->image_path.$post->image }}"
                                                     width="480" height="480" alt=""></a>
                                                <span class="ribbon">new</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 col-xl-9">
                                            <header class="entry-header">
                                                <div class="entry-meta">
                                                    <span class="posted-in">
                                                        <span class="screen-reader-text">
                                                            Posted in:</span>
                                                        <a href="" rel="category tag">
                                                            {{ $post->category->name ?? null }}
                                                        </a>
                                                    </span> <span class="posted-on"><span class="screen-reader-text">Posted on</span> <a href="" rel="bookmark">
                                                            <time datetime="{{ $post->created_at }}" class="entry-date published">
                                                                {{ $post->created_at }}</time>
                                                        </a></span>
                                                </div>
                                                <h2 class="entry-title">
                                                    <a href="" rel="bookmark">
                                                        {{ $post->title }}</a>
                                                </h2>
                                            </header>
                                            <div class="entry-audio">
                                                <div class="podcast-episode-player"
                                                     data-episode-download="{{ $post->path.$post->podcxast }}" data-episode-download-button="Download Episode (884.3 KB)" data-episode-duration="00:43" data-episode-size="884.3 KB">
                                                    <audio class="wp-audio-shortcode" preload="none">
                                                        <source src="{{ $post->path.$post->podcxast }}" type="audio/mpeg" />
                                                        <source src="{{ $post->path.$post->podcxast }}" type="audio/ogg" />
                                                    </audio>
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <p>{{ $post->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                                <div class="pagination pagination-load-more">
                                    <a href="" class="button">
                                        <span class="mdi mdi-dots-horizontal"></span> Browse More <span class="d-none d-md-inline-block">Episodes</span></a>
                                </div>
                            </div>
                        </div>
                        <div id="tab-news" class="tab-content">
                            <div class="post-listing">
                                <div class="row masonry-grid">
                                    <div class="col-12 col-md-6 col-lg-4 grid-item">
                                        <article class="entry entry-post has-post-thumbnail">
                                            <div class="categories">
                                                <span class="screen-reader-text">Posted in:</span>
                                                <a href="#" rel="category tag">Updates</a>
                                            </div>
                                            <div class="entry-media entry-image">
                                                <a href="single-post.html"><img src="tmp/sample-post1.jpg" width="750" height="500" alt=""></a>
                                            </div>
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="single-post.html" rel="bookmark">Lessons learned from the big guys</a></h2>
                                            </header>
                                            <div class="entry-content">
                                                <p>Turnip greens yarrow ricebean rutabaga endive cauliflower sea lettuce kohlrabi amaranth water spinach avocado daikon napa cabbage asparagus winter purslane […]</p>
                                                <a href="single-post.html" class="read-more line-link">Read more</a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 grid-item">
                                        <article class="entry entry-post format-image has-post-thumbnail">
                                            <div class="categories">
                                                <span class="screen-reader-text">Posted in:</span>
                                                <a href="#" rel="category tag">Interviews</a>
                                            </div>
                                            <div class="entry-media entry-image">
                                                <a href="single-post.html"><img src="tmp/sample-post2.jpg" width="750" height="500" alt=""></a>
                                            </div>
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="single-post.html" rel="bookmark">Start fresh one of these days</a></h2>
                                            </header>
                                            <div class="entry-content">
                                                <p>Sit te oporteat antiopam, cu decore alterum splendide ius. Pro atomorum petentium id. Vix brute erant forensibus ei, assum […]</p>
                                                <a href="single-post.html" class="read-more line-link">Read more</a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 grid-item">
                                        <article class="entry entry-post has-post-thumbnail">
                                            <div class="categories">
                                                <span class="screen-reader-text">Posted in:</span>
                                                <a href="#" rel="category tag">Podcast</a>
                                            </div>
                                            <div class="entry-media entry-image">
                                                <a href="single-post.html"><img src="tmp/sample-post3.jpg" width="1314" height="921" alt=""></a>
                                            </div>
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="single-post.html" rel="bookmark">Yes, let's start a new project</a></h2>
                                            </header>
                                            <div class="entry-content">
                                                <p>Intellegat definitiones vix cu. Pro mazim inimicus dissentias id. Graeci urbanitas pri at. Paulo fabulas mentitum cu sed, ut vix […]</p>
                                                <a href="single-post.html" class="read-more line-link">Read more</a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 grid-item">
                                        <article class="entry entry-post format-status has-post-thumbnail">
                                            <div class="categories">
                                                <span class="screen-reader-text">Posted in:</span>
                                                <a href="#" rel="category tag">Podcast</a>
                                            </div>
                                            <div class="entry-media entry-image">
                                                <a href="single-post.html"><img src="tmp/sample-post4.jpg" width="750" height="500" alt=""></a>
                                            </div>
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="single-post.html" rel="bookmark">Tokyo night adventures</a></h2>
                                            </header>
                                            <div class="entry-content">
                                                <p>Ea mundi nominati pericula nam, ius prompta recusabo te, ea eos alia omnes. Vix quem verterem eu, eam verear vivendum […]</p>
                                                <a href="single-post.html" class="read-more line-link">Read more</a>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="pagination pagination-load-more">
                                    <a href="" class="button"><span class="mdi mdi-dots-horizontal"></span> Browse More <span class="d-none d-md-inline-block">Posts</span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
