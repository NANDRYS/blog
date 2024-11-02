<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function get_posts()
    {   
        //ленивая загрузка

        // $posts = Post::all(); 
        // foreach ($posts as  $post) {
        //     $post->category_id = $post->category->name;
        // }

        //жадная загрузка
        $posts = Post::with('category:id,name')->get();


        return $posts;
    }
}
