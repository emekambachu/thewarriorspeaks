<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Podcast\AdminStorePodcastRequest;
use App\Services\Blog\BlogPostService;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    protected $blog;
    public function __construct(BlogPostService $blog){
        $this->blog = $blog;
        $this->middleware('auth:web');
    }

    public function recentPosts(){
        try {
            $posts = $this->blog->blogPostWithRelations()->latest()->limit(7)->get();
            return response()->json([
                'success' => true,
                'posts' => $posts,
                'total' => $posts->total(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function index(){
        try {
            $posts = $this->blog->blogPostWithRelations()->latest()->paginate(12);
            return response()->json([
                'success' => true,
                'posts' => $posts,
                'total' => $posts->total(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function store(AdminStorePodcastRequest $request){
        try {
            $posts = $this->blog->createPost($request);
            return response()->json([
                'success' => true,
                'posts' => $posts,
                'total' => $posts->total(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
