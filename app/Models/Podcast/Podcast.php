<?php

namespace App\Models\Podcast;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'author',
      'category_id',
      'audio',
      'audio_path',
      'image',
      'image_path',
      'description',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likes(){
        return $this->hasMany(PodcastLike::class, 'podcast_id', 'id');
    }

    public function comments(){
        return $this->hasMany(PodcastComment::class, 'podcast_id', 'id');
    }
}
