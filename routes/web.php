<?php

use App\Http\Controllers\GithubDeploymentController;
use App\Http\Controllers\Home\Blog\HomeBlogController;
use App\Http\Controllers\Home\HomePageController;
use App\Http\Controllers\Home\Podcast\HomePodcastController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/author', static function () {
    return view('home.author');
})->name('home.author');

Route::get('/blog', static function () {
    return view('home.blog.index');
})->name('home.blog');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', [HomePageController::class, 'homePage'])->name('home.index');

Route::get('/blog', [HomeBlogController::class, 'index'])->name('home.blog.index');
Route::get('/blog/{id}/post', [HomeBlogController::class, 'show'])->name('home.blog.show');

Route::get('/podcast', [HomePodcastController::class, 'index'])->name('home.podcast.index');
Route::get('/podcast/{id}/post', [HomePodcastController::class, 'show'])->name('home.podcast.show');

// Admin Account SPA
Route::get('/admin/{any}', static function () {
    return view('admin.index');
})->where('any', '.*');

//Github Deployment
Route::post('/github/deploy', [GithubDeploymentController::class, 'deploy']);
