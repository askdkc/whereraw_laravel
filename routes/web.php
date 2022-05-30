<?php

use App\Models\Post;
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

Route::get('/opt', function () {
    $query = Post::query();
    $query->whereRaw('jsonbdata &` \'(paths @ "title" || paths @ "body") && query("string", "cat alice")\''); 
    $posts = $query->orderBy('id')->paginate(5);
    return view('result', compact('posts'));
})->name('withoutoptional');

Route::get('/woopt', function () {
    $query = Post::query();
    $input = 'cat alice';
    $query->whereRaw('jsonbdata &` ?', [
        '(paths @ "title" || paths @ "body") && query("string", "'. addslashes($input) .'")'
    ]);
    $posts = $query->orderBy('id')->paginate(5);
    return view('result', compact('posts'));
})->name('withoptional');
