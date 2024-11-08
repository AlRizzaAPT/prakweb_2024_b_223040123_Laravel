<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Riza', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = Post::all();

    $post = Post ::find($slug);

    if ($post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    } else {
        return redirect('/posts');
    }
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
