<?php

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
        'posts' => [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Riza',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est odit laudantium earum cumque pariatur facilis vitae nulla esse quasi accusantium! Est iste facilis magnam dolor soluta, maxime quo architecto earum!'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Riza',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate esse architecto dolorum dicta accusamus fugit id culpa atque, aut explicabo a voluptatibus sit mollitia ipsam natus quod nostrum nobis ut.'
            ]
        ]
    ]);
});

// Route for a single post, e.g. /posts/{slug}
Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Riza',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est odit laudantium earum cumque pariatur facilis vitae nulla esse quasi accusantium! Est iste facilis magnam dolor soluta, maxime quo architecto earum!'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Riza',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate esse architecto dolorum dicta accusamus fugit id culpa atque, aut explicabo a voluptatibus sit mollitia ipsam natus quod nostrum nobis ut.'
        ]
    ];

    // Use the slug to find the post
    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;  // Compare with the slug
    });

    if ($post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    } else {
        return redirect('/posts'); // Redirect to the list of posts if post is not found
    }
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
