<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\Author\HomeAuthorController;
use App\Http\Controllers\Home\Blog\HomeBlogController;
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

// Admin Auth
Route::post('/admin/login', [LoginController::class, 'login']);

// Sanctum Web
Route::middleware('web')->group(static function (){
    // Admin Auth API
    // Get users with specific guard
    Route::get('/admin/authenticate', static function (Request $request) {
        return $request->user('web');
    });

    // User Logout
    Route::post('/admin/logout', [LoginController::class, 'logout']);
});
