<div class="site-title col col-lg-auto order-first">
    <h1><a href="{{ route('home.index') }}" class="custom-logo-link" rel="home">
            <img src="{{ asset('/logo.png') }}" class="custom-logo"
                 width="98" height="30"></a></h1>
</div>
<nav id="site-menu" class="col-12 col-lg order-3 order-sm-4 order-lg-2">
    <ul>
        <li class="menu-item">
            <a href="{{ route('home.index') }}">Home</a>
        </li>
        <li class="menu-item">
            <a href="{{ route('home.podcast.index') }}">Podcast</a>
        </li>
        <li class="menu-item">
            <a href="{{ route('home.blog.index') }}">Blog</a>
        </li>
        <li class="menu-item">
            <a href="{{ route('home.author') }}">Author</a>
        </li>
    </ul>
</nav>
