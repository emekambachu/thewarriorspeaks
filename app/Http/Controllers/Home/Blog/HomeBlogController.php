<?php

namespace App\Http\Controllers\Home\Blog;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogPostService;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    protected $blog;
    public function __construct(BlogPostService $blog){
        $this->blog = $blog;
    }

    public function homePage(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->blog->publishedBlogPost()->latest()->limit(3)->get();
            return response()->json([
                'success' => true,
                'posts' => $data,
                'total' => $data->total(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->blog->publishedBlogPost()->latest()->paginate(12);
            return response()->json([
                'success' => true,
                'posts' => $data,
                'total' => $data->total(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->blog->blogPostById($id);
            return response()->json([
                'success' => true,
                'post' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
