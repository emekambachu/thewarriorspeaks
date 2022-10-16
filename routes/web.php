<?php

use App\Http\Controllers\GithubDeploymentController;
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

Route::get('/', static function () {
    return view('home.index');
})->name('home.index');

Route::get('/author', static function () {
    return view('home.author');
})->name('home.author');

Route::get('/podcast', static function () {
    return view('home.podcast.index');
})->name('home.podcast');

Route::get('/blog', static function () {
    return view('home.blog.index');
})->name('home.blog');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// Admin Account SPA
Route::get('/admin/{any}', static function () {
    return view('admin.index');
})->where('any', '.*');

//Github Deployment
Route::post('/github/deploy', [GithubDeploymentController::class, 'deploy']);
