<?php 

namespace App\Models;

use Illuminate\Support\Arr;

class Post {
    public static function all()
    {
        return [
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
    }

    public static function find($slug): array
    {
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);
        
        if (!$post) {
            abort(404);
        }
    
        return $post;
    }
}