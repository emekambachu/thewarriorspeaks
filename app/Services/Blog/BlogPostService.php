<?php

namespace App\Services\Blog;

use App\Models\Blog\BlogPost;

/**
 * Class BlogPostService.
 */
class BlogPostService
{
    public function blogPost(){
        return new BlogPost();
    }

    public function blogPostWithRelations(){
        return $this->blogPost();
    }

    public function blogPostById($id){
        return $this->blogPostWithRelations()->findOrFail($id);
    }

    public function createPost($request){

    }

    public function updatePost($request, $id){

    }

    public function publishPost($id){

    }
}
