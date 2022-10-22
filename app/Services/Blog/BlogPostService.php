<?php

namespace App\Services\Blog;

use App\Models\Blog\BlogPost;
use App\Services\Base\CrudService;

/**
 * Class BlogPostService.
 */
class BlogPostService
{
    protected string $imagePath = 'photos/blog/posts';

    protected CrudService $crud;
    public function __construct(CrudService $crud){
        $this->crud = $crud;
    }

    public function blogPost(): BlogPost
    {
        return new BlogPost();
    }

    public function blogPostWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->blogPost()->with('category', 'likes', 'comments');
    }

    public function blogPostById($id){
        return $this->blogPostWithRelations()->findOrFail($id);
    }

    public function publishedBlogPost(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->blogPostWithRelations()->where('status', 'published');
    }

    public function publishedJoinedBlogPost(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->blogPostWithRelations()->where('blog_posts.status', 'published');
    }

    public function createPost($request){
        $input = $request->all();
        if(!empty($input['image'])){
            $input['image'] = $this->crud->compressAndUploadImage($request, $this->imagePath, 700, 500);
            $input['image_path'] = config('app.url').$this->imagePath.'/';
        }
        return $this->blogPost()->create($input);
    }

    public function updatePost($request, $id){
        $input = $request->all();
        $post = $this->blogPostById($id);
        if(!empty($input['image'])){
            $input['image'] = $this->crud->compressAndUploadImage($request, $this->imagePath, 700, 500);
        }
        $post->update($input);
        return $post;
    }

    public function publishPost($id): array
    {
        return $this->crud->publishItem($this->blogPostById($id));
    }

    public function searchBlogPosts($request, $queryBuilder): array
    {
        $input = $request->all();
        // Array for storing search results
        $searchValues = [];
        if(!empty($input['term'])) {
            $searchValues['term'] = $input['term'];
        }
//        if(!empty($input['category_id'])) {
//            $searchValues['category'] = $this->blogCategoryById($input['category_id'])->first()->name;
//        }

        $posts = $queryBuilder->select(
            'blog_posts.*',
            'categories.id AS categories_id',
        )->leftjoin('categories',
            'categories.id', '=', 'blog_posts.category_id'
        )->where(function($query) use ($input){
            // The rest of the queries can come here
            $query->when(!empty($input['term']), static function($q) use($input){
                $q->where('blog_posts.title', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('categories.name', 'like' , '%'. $input['term'] .'%');
            });
        })->paginate(15);

        // if result exists return results, else return empty array
        if($posts->total() > 0){
            return [
                'posts' => $posts,
                'total' => $posts->total(),
                'search_values' => $searchValues
            ];
        }
        return [
            'posts' => [],
            'total' => 0,
            'search_values' => $searchValues
        ];
    }

    public function deletePost($id): void
    {
        $post = $this->blogPostById($id);
        $this->crud->deleteFile($post->image, $this->imagePath);
        $post->delete();
    }
}
