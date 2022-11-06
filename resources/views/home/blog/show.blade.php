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

        <div id="featured" class="featured-content" style="">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-center">
                        <h2>{{ $post->title }}</h2>
                        <div class="entry-meta">
                            <span class="posted-by">
                                <span class="screen-reader-text">Posted by: {{ $post->author }}</span>
                            </span>
                            <span class="posted-on">
                                <span class="screen-reader-text">Posted on: </span>
                                <a>
                                    <time datetime="2019-04-03T21:32:07+02:00" class="entry-date published">
                                        {{ $post->created_at }}</time>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="featured-media" class="featured-media">
                <img src="{{ asset('/tmp/sample-header2.jpg') }}" alt="">
            </div>
        </div>

    </header>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-9">
                <article class="entry entry-post episode-type-audio type-episode">
                    <div class="entry-content">
                        <p>
                           {!! $post->description !!}
                        </p>
                    </div>
                    <div class="entry-footer">
                        <aside class="share-entry">
                            <div class="row align-items-lg-center">
                                <div class="col-12 col-lg-auto">
                                    <h5 class="share-title">Share it:</h5>
                                    <p class="share-links"><a href="https://www.facebook.com/" target="_blank" title="Share via Facebook"><span class="mdi mdi-facebook"></span>
                                            <span class="screen-reader-text">Facebook</span></a>
                                        <a href="https://twitter.com/" target="_blank" title="Share via Twitter"><span class="mdi mdi-twitter"></span>
                                            <span class="screen-reader-text">Twitter</span></a> <a href="http://pinterest.com/" target="_blank" title="Share via Pinterest"><span class="mdi mdi-pinterest"></span> <span class="screen-reader-text">Pinterest</span></a></p>
                                </div>
                                <div class="col-12 col-lg">
                                    <div class="categories">
                                        <span class="screen-reader-text">Posted in:</span> <a href="#" rel="category tag">Updates</a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="author-box has-description">
                            <div class="row align-items-lg-center">
                                <figure class="col-4 col-md-3 col-xl-2 author-box-image">
                                    <img alt="" src="{{ asset('/tmp/sample-avatar.jpg') }}"
                                         class="avatar" width="80" height="80">
                                </figure>
                                <div class="col-8 col-md-9 col-xl-10">
                                    <h5 class="author-box-title">Published by <a href="https://liviucerchez.com/" title="Visit Liviu Cerchez’s website" rel="author external">Liviu Cerchez</a></h5>
                                </div>
                            </div>
                        </aside>

                        <aside class="post-controls">
                            <div class="row">
                                <div class="prev-post col-12 col-lg-6 col-xl-5">
                                    <a href="#" rel="prev"><span class="zmdi mdi mdi-arrow-left"></span> Prev</a>
                                    <h5><a href="#">Visiting my best friend's city for the first time</a></h5>
                                </div>
                                <div class="next-post col-12 col-lg-6 col-xl-5 offset-xl-2">
                                    <a href="#" rel="next">Next <span class="zmdi mdi mdi-arrow-right"></span></a>
                                    <h5><a href="#">Along the carefree journey through Italy</a></h5>
                                </div>
                            </div>
                        </aside>

                    </div>
                </article>
                <div id="comments">
                    <div id="respond" class="comment-respond">
                        <h5 id="reply-title" class="comment-reply-title">Leave a Reply</h5>

                        <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                            <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                            <p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>
                            <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" maxlength="245" required="required"></p>
                            <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required"></p>
                            <p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url" value="" size="30" maxlength="200"></p>
                            <p class="form-submit"><input name="submit" type="submit" id="submit" class="button-color button-filled" value="Post Comment"></p>
                        </form>

                    </div>
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
                                    <li class="cat-item current-cat"><a href="#">Updates</a> (3)</li>
                                </ul>
                            </li>
                            <li class="cat-item"><a href="#">Podcast</a> (6)
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
