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
    $query->orWhereRaw('jsonbdata &` \'query("string", "ジョバンニ OR お魚 OR 銀河")\''); 
    $posts = $query->paginate(15);
    return view('result', compact('posts'));
})->name('withoutoptional');

Route::get('/woopt', function () {
    $query = Post::query();
    $query->orWhereRaw('jsonbdata &` \'query("string", "ジョバンニ OR お魚 OR 銀河") && query("paths", "title OR author OR body")\''); 
    $posts = $query->paginate(15);
    return view('result', compact('posts'));
})->name('withoptional');

Route::get('/sortopt', function () {
    $query = Post::query();
    $query->orWhereRaw('jsonbdata &` \'query("string", "ジョバンニ OR お魚 OR 銀河")\''); 
    $posts = $query->orderBy('dataid')->paginate(15);
    return view('result', compact('posts'));
})->name('sortopt');

Route::get('/sortwoopt', function () {
    $query = Post::query();
    $query->orWhereRaw('jsonbdata &` \'query("string", "ジョバンニ OR お魚 OR 銀河") && query("paths", "title OR author OR body")\''); 
    $posts = $query->orderBy('dataid')->paginate(15);
    return view('result', compact('posts'));
})->name('sortwoopt');