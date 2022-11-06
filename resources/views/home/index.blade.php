@extends('home.layout')

@section('title')
    Home
@stop

@section('top-assets')

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
                <div class="row">
                    <div class="col-12 col-lg-7 col-xl-6">
                        <h6 class="subtitle">Welcome</h6>
                        <h2><a href="">Dreams of an artist and unique ideas scattered through a deserted mind</a></h2>
                        <p>This is not meant to be pleasant or polite. It is supposed to be true and unique. Yes, that's what I try every day... to be unique.</p>
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
                        </ul>
                        <div id="tab-episodes" class="tab-content active">
                            <div class="episodes-listing">
                                @foreach($podcasts as $podcast)
                                <article class="entry entry-episode has-post-thumbnail">
                                    <div class="row align-items-lg-center">
                                        <div class="col-12 col-md-4 col-xl-3">
                                            <div class="entry-media">
                                                <a href="{{ route('home.podcast.show', $podcast->id) }}">
                                                <img src="{{ $podcast->image_path.$podcast->image }}"
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
                                                            {{ $podcast->category->name ?? null }}
                                                        </a>
                                                    </span>
                                                    <span class="posted-on">
                                                        <span class="screen-reader-text">Posted on</span>
                                                        <a href="" rel="bookmark">
                                                        <time datetime="{{ $podcast->created_at }}" class="entry-date published">
                                                            {{ $podcast->created_at }}
                                                        </time>
                                                        </a>
                                                    </span>
                                                </div>
                                                <h2 class="entry-title">
                                                    <a href="" rel="bookmark">
                                                        {{ $podcast->title }}</a>
                                                </h2>
                                            </header>
                                            <div class="entry-audio">
                                                <!-- audio tag starts here -->
                                                <audio controls autoplay style="width: 100%;">
                                                    <source src="{{ $podcast->audio_path.$podcast->audio }}"
                                                            type="audio/mp3">
                                                    <source src="{{ $podcast->audio_path.$podcast->audio }}"
                                                            type="audio/ogg">
                                                    <source src="{{ $podcast->audio_path.$podcast->audio }}"
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
                                <div class="pagination pagination-load-more">
                                    <a href="{{ route('home.podcast.index') }}" class="button">
                                        <span class="mdi mdi-dots-horizontal"></span> Browse More <span class="d-none d-md-inline-block">Episodes</span></a>
                                </div>
                            </div>
                        </div>
                        <div id="tab-news" class="tab-content">
                            <div class="post-listing">
                                <div class="row masonry-grid">
                                    @foreach($blog as $post)
                                        <div class="col-12 col-md-6 col-lg-4 grid-item">
                                            <article class="entry entry-post has-post-thumbnail">
                                                <div class="categories">
                                                    <span class="screen-reader-text">
                                                        Posted in: {{ $post->created_at }}</span>
                                                    <a href="#" rel="category tag">Updates</a>
                                                </div>
                                                <div class="entry-media entry-image">
                                                    <a href="">
                                                        <img src="{{ $post->image_path.$post->image }}"
                                                             width="750" height="500" alt=""></a>
                                                </div>
                                                <header class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="" rel="bookmark">
                                                            {{ $post->title }}</a></h2>
                                                </header>
                                                <div class="entry-content">
                                                    <p>{{ $post->description }}</p>
                                                    <a href="{{ route('home.blog.show', $post->id) }}"
                                                       class="read-more line-link">Read more</a>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="pagination pagination-load-more">
                                    <a href="{{ route('home.podcast.index') }}" class="button">
                                        <span class="mdi mdi-dots-horizontal"></span> Browse More <span class="d-none d-md-inline-block">Posts</span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
