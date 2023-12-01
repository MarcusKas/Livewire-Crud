<?php

use App\Http\Livewire\Post;
use App\Http\Livewire\Showpost;
use App\Models\Post as ModelsPost;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('post/', Post::class)->name('post');
// route model binding
Route::get('/post/{post}', Showpost::class);
