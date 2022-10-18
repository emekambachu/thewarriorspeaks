<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\AdminStorePostRequest;
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

    public function recentPosts($limit){
        try {
            $data = $this->blog->blogPostWithRelations();
            return response()->json([
                'success' => true,
                'posts' => $data->latest()->limit($limit)->get(),
                'total' => $data->count(),
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

    public function publish($id): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->blog->publishPost($id);
            return response()->json([
                'success' => true,
                'post' => $data['item'],
                'message' => $data['message'],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $posts = $this->post->searchBlogPost($request);
            return response()->json([
                'success' => true,
                'posts' => $posts['posts'],
                'total' => $posts['total'],
                'search_values' => $posts['search_values'],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function store(AdminStorePostRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $post = $this->blog->createPost($request);
            return response()->json([
                'success' => true,
                'post' => $post,
                'message' => "Created",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function show($id){
        try {
            $data = $this->blog->blogPostById($id);
            return response()->json([
                'success' => true,
                'post' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function update(AdminStorePodcastRequest $request, $id){
        try {
            $data = $this->blog->updatePost($request, $id);
            return response()->json([
                'success' => true,
                'post' => $data,
                'message' => 'Updated',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id){
        try {
            $data = $this->blog->deletePost($id);
            return response()->json([
                'success' => true,
                'message' => 'Deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
