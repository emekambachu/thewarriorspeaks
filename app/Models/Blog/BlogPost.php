<?php

namespace App\Models\Blog;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'author',
      'category_id',
      'image',
      'image_path',
      'description',
      'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likes(){
        return $this->hasMany(BlogLike::class, 'blog_post_id', 'id');
    }

    public function comments(){
        return $this->hasMany(BlogComment::class, 'blog_post_id', 'id');
    }

}
