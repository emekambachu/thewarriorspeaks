<?php

use App\Http\Controllers\Admin\Author\AdminAuthorController;
use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Http\Controllers\Admin\Podcast\AdminPodcastController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\Author\HomeAuthorController;
use App\Http\Controllers\Home\Blog\HomeBlogController;
use App\Http\Controllers\Home\HomeCategoryController;
use App\Http\Controllers\Home\Podcast\HomePodcastController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Home Blog
Route::get('/blog/posts', [HomeBlogController::class, 'index']);
Route::post('/blog/search', [HomeBlogController::class, 'search']);
Route::get('/blog/{id}/show', [HomeBlogController::class, 'show']);

// Home Podcast
Route::get('/podcast', [HomePodcastController::class, 'index']);
Route::post('/podcast/search', [HomePodcastController::class, 'search']);
Route::get('/podcast/{id}/show', [HomePodcastController::class, 'show']);

// Home Author
Route::get('/author/bio', [HomeAuthorController::class, 'bio']);
Route::get('/author/social', [HomeAuthorController::class, 'social']);

// Home Category
Route::get('/categories', [HomeCategoryController::class, 'index']);

// Admin Auth
Route::post('/admin/login', [LoginController::class, 'login']);

// Sanctum Web
Route::middleware('web')->group(static function (){
    // Admin Auth API
    // Get users with specific guard
    Route::get('/admin/authenticate', static function (Request $request) {
        return $request->user();
    });

    // Admin blog post
    Route::get('/admin/blog/posts/{limit}/recent', [AdminBlogController::class, 'recentPosts']);
    Route::get('/admin/blog/posts', [AdminBlogController::class, 'index']);
    Route::post('/admin/blog/posts/search', [AdminBlogController::class, 'search']);
    Route::post('/admin/blog/posts/create', [AdminBlogController::class, 'store']);
    Route::get('/admin/blog/posts/{id}/show', [AdminBlogController::class, 'show']);
    Route::post('/admin/blog/posts/{id}/publish', [AdminBlogController::class, 'publish']);
    Route::post('/admin/blog/posts/{id}/update', [AdminBlogController::class, 'update']);
    Route::delete('/admin/blog/posts/{id}/delete', [AdminBlogController::class, 'delete']);

    // Admin Podcast
    Route::get('/admin/podcasts/{limit}/recent', [AdminPodcastController::class, 'recentPodcast']);
    Route::get('/admin/podcasts', [AdminPodcastController::class, 'index']);
    Route::post('/admin/podcasts/search', [AdminPodcastController::class, 'search']);
    Route::post('/admin/podcasts/create', [AdminPodcastController::class, 'store']);
    Route::post('/admin/podcasts/{id}/show', [AdminPodcastController::class, 'show']);
    Route::post('/admin/podcasts/{id}/publish', [AdminPodcastController::class, 'publish']);
    Route::post('/admin/podcasts/{id}/update', [AdminPodcastController::class, 'update']);
    Route::delete('/admin/podcasts/{id}/delete', [AdminPodcastController::class, 'delete']);

    // Admin Author
    Route::get('/admin/author', [AdminAuthorController::class, 'index']);
    Route::post('/admin/author', [AdminAuthorController::class, 'update']);

    // User Logout
    Route::post('/admin/logout', [LoginController::class, 'logout']);
});
