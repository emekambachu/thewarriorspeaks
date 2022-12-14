<?php

namespace App\Models\Author;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBio extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'title',
      'occupation',
      'description',
      'email',
      'mobile',
    ];
}
