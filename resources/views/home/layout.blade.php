<!doctype html>
<html lang="en" class="no-js">

<head>
    <title> @yield('title') | {{ config('app.name') }} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Amazon warriors podcast and blog">
    <meta name="keywords" content="Amazon warriors podcast and blog">

    <link rel="shortcut icon" href="{{ asset('/logo.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7CPoppins:400,600" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/assets/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">

    <style id="anii-inline-style">
        .sales-box {
            background-image: url(tmp/sample-sales-background.jpg);
        }
    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    @yield('top-assets')
</head>
<body class="home footer-sticky">
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
                    <p><a href="about.html" class="line-link">Follow us on social media</a></p>
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

<main id="content">

{{--    <div id="intro-description">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <h6 class="subtitle">Want to know more?</h6>--}}
{{--                    <h2>Anii HTML Template</h2>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-lg-4 feature-box">--}}
{{--                    <span class="mdi mdi-responsive"></span>--}}
{{--                    <h5 class="feature-box-title">Fully Responsive</h5>--}}
{{--                    <p>Was were all texts that allow this such admittance, seemed how or sisters privilege away, is with my she of is the have the couldn't odd food.</p>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-lg-4 feature-box">--}}
{{--                    <span class="mdi mdi-palette"></span>--}}
{{--                    <h5 class="feature-box-title">Unique Look &amp; Feel</h5>--}}
{{--                    <p>For possible is brief. Privilege the concepts arrange last of are, state what of return good odd him, far every trial without responded dreams.</p>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-lg-4 feature-box">--}}
{{--                    <span class="mdi mdi-heart"></span>--}}
{{--                    <h5 class="feature-box-title">Dedicated Support</h5>--}}
{{--                    <p>Tones, all stupid. Heard of well it quite were their tricoloured seven italic uninspired, model taking as, lay harder of the we the achievements their.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

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
                                <article class="entry entry-episode has-post-thumbnail">
                                    <div class="row align-items-lg-center">
                                        <div class="col-12 col-md-4 col-xl-3">
                                            <div class="entry-media">
                                                <a href="single-episode.html"><img src="tmp/sample-episode1.jpg" width="480" height="480" alt=""></a>
                                                <span class="ribbon">new</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 col-xl-9">
                                            <header class="entry-header">
                                                <div class="entry-meta">
														<span class="posted-in">
															<span class="screen-reader-text">Posted in:</span> <a href="episodes.html" rel="category tag">Season 1</a></span> <span class="posted-on"><span class="screen-reader-text">Posted on</span> <a href="single-episode.html" rel="bookmark"><time datetime="2019-04-03T21:32:07+02:00" class="entry-date published">September 3, 2018</time><time datetime="2019-04-03T21:32:07+02:00" class="updated">September 4, 2019</time></a></span> <span class="tags"><span class="screen-reader-text">Tags:</span> <a href="episodes.html" rel="tag">clothes</a><span>, </span><a href="episodes.html" rel="tag">travel</a><span>, </span><a href="episodes.html" rel="tag">solo</a>
														</span>
                                                </div>
                                                <h2 class="entry-title"><a href="single-episode.html" rel="bookmark">Visiting my best friend's city for the first time</a></h2>
                                            </header>
                                            <div class="entry-audio">
                                                <div class="podcast-episode-player" data-episode-download="https://html.liviucerchez.com/common/preview2.mp3" data-episode-download-button="Download Episode (884.3 KB)" data-episode-duration="00:43" data-episode-size="884.3 KB">
                                                    <audio class="wp-audio-shortcode" preload="none">
                                                        <source src="https://html.liviucerchez.com/common/preview2.mp3" type="audio/mpeg" />
                                                        <source src="https://html.liviucerchez.com/common/preview2.ogg" type="audio/ogg" />
                                                    </audio>
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="entry entry-episode has-post-thumbnail">
                                    <div class="row align-items-lg-center">
                                        <div class="col-12 col-md-4 col-xl-3">
                                            <div class="entry-media">
                                                <a href="single-episode.html"><img src="tmp/sample-episode2.jpg" width="480" height="480" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 col-xl-9">
                                            <header class="entry-header">
                                                <div class="entry-meta">
														<span class="posted-in">
															<span class="screen-reader-text">Posted in:</span> <a href="episodes.html" rel="category tag">Season 1</a></span> <span class="posted-on"><span class="screen-reader-text">Posted on</span> <a href="single-episode.html" rel="bookmark"><time datetime="2019-04-03T21:32:07+02:00" class="entry-date published">August 23, 2019</time><time datetime="2019-04-03T21:32:07+02:00" class="updated">August 23, 2019</time></a></span> <span class="tags"><span class="screen-reader-text">Tags:</span> <a href="episodes.html" rel="tag">coffee</a><span>, </span><a href="episodes.html" rel="tag">home</a><span>, </span><a href="episodes.html" rel="tag">relax</a>
														</span>
                                                </div>
                                                <h2 class="entry-title"><a href="single-episode.html" rel="bookmark">An interesting read I would definitely recommend</a></h2>
                                            </header>
                                            <div class="entry-audio">
                                                <div class="podcast-episode-player" data-episode-download="https://html.liviucerchez.com/common/preview1.mp3" data-episode-download-button="Download Episode (831.6 KB)" data-episode-duration="00:41" data-episode-size="831.6 KB">
                                                    <audio class="wp-audio-shortcode" preload="none">
                                                        <source src="https://html.liviucerchez.com/common/preview1.mp3" type="audio/mpeg" />
                                                        <source src="https://html.liviucerchez.com/common/preview1.ogg" type="audio/ogg" />
                                                    </audio>
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="entry entry-episode has-post-thumbnail">
                                    <div class="row align-items-lg-center">
                                        <div class="col-12 col-md-4 col-xl-3">
                                            <div class="entry-media">
                                                <a href="single-episode.html"><img src="tmp/sample-episode3.jpg" width="480" height="480" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 col-xl-9">
                                            <header class="entry-header">
                                                <div class="entry-meta">
														<span class="posted-in">
															<span class="screen-reader-text">Posted in:</span> <a href="episodes.html" rel="category tag">Season 1</a></span> <span class="posted-on"><span class="screen-reader-text">Posted on</span> <a href="single-episode.html" rel="bookmark"><time datetime="2019-04-03T21:32:07+02:00" class="entry-date published">August 15, 2019</time><time datetime="2019-04-03T21:32:07+02:00" class="updated">August 23, 2019</time></a></span> <span class="tags"><span class="screen-reader-text">Tags:</span> <a href="episodes.html" rel="tag">carefree</a><span>, </span><a href="episodes.html" rel="tag">italy</a><span>, </span><a href="episodes.html" rel="tag">vacation</a>
														</span>
                                                </div>
                                                <h2 class="entry-title"><a href="single-episode.html" rel="bookmark">Along the carefree journey through Italy</a></h2>
                                            </header>
                                            <div class="entry-audio">
                                                <div class="podcast-episode-player" data-episode-download="https://html.liviucerchez.com/common/preview2.mp3" data-episode-download-button="Download Episode (884.3 KB)" data-episode-duration="00:43" data-episode-size="884.3 KB">
                                                    <audio class="wp-audio-shortcode" preload="none">
                                                        <source src="https://html.liviucerchez.com/common/preview2.mp3" type="audio/mpeg" />
                                                        <source src="https://html.liviucerchez.com/common/preview2.ogg" type="audio/ogg" />
                                                    </audio>
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <p>Great stars and shows from the golden days of radio; entertainment, performances, and actual broadcast excerpts from the 20’s, 30’s, and 40’s.</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <div class="pagination pagination-load-more">
                                    <a href="episodes.html" class="button"><span class="mdi mdi-dots-horizontal"></span> Browse More <span class="d-none d-md-inline-block">Episodes</span></a>
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
                                    <div class="col-12 col-md-6 col-lg-4 grid-item">
                                        <article class="entry entry-post format-gallery has-post-thumbnail">
                                            <div class="categories">
                                                <span class="screen-reader-text">Posted in:</span>
                                                <a href="#" rel="category tag">Updates</a>
                                            </div>
                                            <div class="entry-media entry-gallery">
                                                <div class="gallery gallery-columns-3">
                                                    <figure class="gallery-item"><div class="gallery-icon"><img src="tmp/sample-episode3.jpg" width="200" height="200" alt=""></div></figure><figure class="gallery-item"><div class="gallery-icon"><img src="tmp/sample-instagram1.jpg" width="200" height="200" alt=""></div></figure><figure class="gallery-item"><div class="gallery-icon"><img src="tmp/sample-instagram2.jpg" width="200" height="200" alt=""></div></figure><figure class="gallery-item"><div class="gallery-icon"><img src="tmp/sample-instagram3.jpg" width="200" height="200" alt=""></div></figure><figure class="gallery-item"><div class="gallery-icon"><img src="tmp/sample-instagram4.jpg" width="200" height="200" alt=""></div></figure><figure class="gallery-item"><div class="gallery-icon"><img src="tmp/sample-instagram5.jpg" width="200" height="200" alt=""></div></figure>
                                                </div>
                                            </div>
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="single-post.html" rel="bookmark">Branding and strategic moves</a></h2>
                                            </header>
                                            <div class="entry-content">
                                                <p>When following geared the story the my were in with to emerge a necessary you a distance anchors recently rain […]</p>
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
                                                <a href="single-post.html"><img src="tmp/sample-post5.jpg" width="750" height="500" alt=""></a>
                                            </div>
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="single-post.html" rel="bookmark">Bring out the best in people</a></h2>
                                            </header>
                                            <div class="entry-content">
                                                <p>Ad idque aeterno nominati has. Elitr inimicus reprimique vis ei. At erant labores eos, ei diam dicat iracundia sed. Quidam […]</p>
                                                <a href="single-post.html" class="read-more line-link">Read more</a>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="pagination pagination-load-more">
                                    <a href="episodes.html" class="button"><span class="mdi mdi-dots-horizontal"></span> Browse More <span class="d-none d-md-inline-block">Posts</span></a>
                                </div>
                            </div>
                        </div>
                        <div id="tab-instagram-feed" class="tab-content">
                            <div class="instagram-listing">
                                <div class="row">
                                    <div class="col">
                                        <article class="entry entry-instagram">
                                            <div class="entry-media entry-image">
                                                <a href="#" target="_blank"><img src="tmp/sample-instagram1.jpg" width="600" height="600" alt=""></a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col">
                                        <article class="entry entry-instagram">
                                            <div class="entry-media entry-image">
                                                <a href="#" target="_blank"><img src="tmp/sample-instagram2.jpg" width="600" height="600" alt=""></a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col d-none d-md-block">
                                        <article class="entry entry-instagram">
                                            <div class="entry-media entry-image">
                                                <a href="#" target="_blank"><img src="tmp/sample-instagram3.jpg" width="600" height="600" alt=""></a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col d-none d-lg-block">
                                        <article class="entry entry-instagram">
                                            <div class="entry-media entry-image">
                                                <a href="#" target="_blank"><img src="tmp/sample-instagram4.jpg" width="600" height="600" alt=""></a>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col d-none d-xl-block">
                                        <article class="entry entry-instagram">
                                            <div class="entry-media entry-image">
                                                <a href="#" target="_blank"><img src="tmp/sample-instagram5.jpg" width="600" height="600" alt=""></a>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="pagination pagination-load-more">
                                    <a href="https://instagram.com/" class="button"><span class="mdi mdi-instagram"></span> Follow on Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="sales-box">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <a href="#" class="cover-image">
                    <img src="tmp/sample-sales-cover.jpg" alt="">
                </a>
            </div>
            <div class="col-12 col-md-6">
                <h3>New Stuff Each Week!</h3>
                <p>Listen below and order your copy from Amazon, iTunes or your favorite record store. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseqa untur magni dolores eos qui ratione sequi.</p>
                <p><a href="#" class="button button-filled button-color button-small"><span class="mdi mdi-amazon"></span> Amazon</a> <a href="#" class="button button-filled button-color button-small"><span class="mdi mdi-apple"></span> iTunes</a> <a href="#" class="button button-filled button-color button-small"><span class="mdi mdi-spotify"></span> Spotify</a></p>
            </div>
        </div>
    </div>
</footer>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="widget-area col-12">
                <section class="widget widget_text">
                    <h3 class="widget-title">Don't miss our weekly episodes!</h3>
                    <div class="textwidget">
                        <form class="mc4wp-form" method="post">
                            <div class="mc4wp-form-fields">
                                <p>A theme with a simple and organized approach to presenting your content with understated charm and undeniable appeal.</p>
                                <p class="one-line">
                                    <label class="screen-reader-text" for="subscribe_email">Subscription Email</label><input id="subscribe_email" name="email" required placeholder="Your email address&hellip;" type="email"><input value="Subscribe" type="submit">
                                </p>
                            </div>
                        </form>
                    </div>
                </section>
                <section class="widget widget_nav">
                    <h3 class="screen-reader-text">Social Navigation</h3>
                    <nav>
                        <ul class="social-navigation">
                            <li class="menu-item menu-item-type-custom">
                                <a title="Facebook Profile" target="_blank" href="https://facebook.com/"><span class="screen-reader-text">Facebook Profile</span></a>
                            </li>
                            <li class="menu-item menu-item-type-custom">
                                <a title="Google Play" target="_blank" href="https://play.google.com/"><span class="screen-reader-text">Google Play</span></a>
                            </li>
                            <li class="menu-item menu-item-type-custom">
                                <a title="YouTube Channel" target="_blank" href="https://youtube.com/"><span class="screen-reader-text">YouTube Channel</span></a>
                            </li>
                            <li class="menu-item menu-item-type-custom">
                                <a title="Spotify Mixtape" target="_blank" href="https://spotify.com/"><span class="screen-reader-text">Spotify Mixtape</span></a>
                            </li>
                            <li class="menu-item menu-item-type-custom">
                                <a title="Donate via PayPal" target="_blank" href="https://paypal.me/"><span class="screen-reader-text">Donate via PayPal</span></a>
                            </li>
                        </ul>
                    </nav>
                </section>
            </div>
            <div class="copyright col-12">
                <p>&copy; Amazon Warriors Podcast. All Rights Reserved. <span class="separator" role="separator" aria-hidden="true"></span> <a class="privacy-policy-link" href="#">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('/assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/assets/js/modernizr-custom.js') }}"></script>
<script src="{{ asset('/assets/js/functions.js') }}"></script>

<!-- MediaElement.js files -->
<link rel="stylesheet" id="mediaelement-css" href="{{ asset('/assets/mediaelement/mediaelementplayer-legacy.css') }}">
<link rel="stylesheet" id="wp-mediaelement-css" href="{{ asset('/assets/mediaelement/wp-mediaelement.css') }}">
<link rel="stylesheet" id="anii-additional-mediaelement-css" href="{{ asset('/assets/css/mediaelement-anii.css') }}">
<script src="{{ asset('/assets/mediaelement/mediaelement-and-player.js') }}"></script>
<script src="{{ asset('/assets/mediaelement/mediaelement-migrate.js') }}"></script>
<script src="{{ asset('/assets/mediaelement/wp-mediaelement.js') }}"></script>
<script src="{{ asset('/assets/js/mediaelement-anii.js') }}"></script>
</body>

</html>
