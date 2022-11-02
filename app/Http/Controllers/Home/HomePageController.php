<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogPostService;
use App\Services\Podcast\PodcastService;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected BlogPostService $blog;
    protected PodcastService $podcast;
    public function __construct(BlogPostService $blog, PodcastService $podcast){
        $this->blog = $blog;
        $this->podcast = $podcast;
    }

    public function homePage(){
        try {
            $data['podcast'] = $this->podcast->publishedPodcasts()->latest()->limit(3)->get();
            $data['blog'] = $this->blog->publishedBlogPost()->latest()->limit(3)->get();
            return view('home.index', $data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
