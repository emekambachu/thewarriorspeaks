<!doctype html>
<html lang="en" class="no-js">

<head>
    <title> @yield('title') | {{ config('app.name') }} </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>

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
            background-image: url({{ asset('/tmp/sample-sales-background.jpg') }});
        }
    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    @yield('top-assets')
</head>
<body class="home footer-sticky expand-featured-media">

@yield('header')

<main id="content">
    @yield('content')
</main>

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
<link rel="stylesheet" id="mediaelement-css"
      href="{{ asset('/assets/mediaelement/mediaelementplayer-legacy.css') }}">
<link rel="stylesheet" id="wp-mediaelement-css"
      href="{{ asset('/assets/mediaelement/wp-mediaelement.css') }}">
<link rel="stylesheet" id="anii-additional-mediaelement-css"
      href="{{ asset('/assets/css/mediaelement-anii.css') }}">
<script src="{{ asset('/assets/mediaelement/mediaelement-and-player.js') }}"></script>
<script src="{{ asset('/assets/mediaelement/mediaelement-migrate.js') }}"></script>
<script src="{{ asset('/assets/mediaelement/wp-mediaelement.js') }}"></script>
<script src="{{ asset('/assets/js/mediaelement-anii.js') }}"></script>

</body>

</html>
