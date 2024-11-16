<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::get_posts();
        $favourite = User::find(auth()->id())->posts;
        return view('home', compact('posts', 'favourite'));
    }
    public function store(Request $request)
    {

        if (!auth()->check()) {
            return back()->with('added', 'вы не можете сохранять пока не авторизируетесь');
        }
        // dump($request->post_id);
        $post = Post::find($request->post_id);


        if (!$post) {
            return redirect()->back()->with('error', 'Пост не найден');
        }
        $is_user_has_post = $post->users()->where('user_id', auth()->id())->exists();
        if (!$is_user_has_post) {
            $post->users()->attach(Auth::id());
            return back()->with('added', 'Пост добавлен');
        } else {
            return back()->with('added', 'такой пост уже есть');
        }

        // То же самое что и код сверху
        // $post->users()->syncWithoutDetaching(auth()->id());
    }

    public function delete(Request $request)
    {
        if (!auth()->check()) {
            return back()->with('added', 'вы не можете удалить пока не авторизируетесь');
        }
        dd($request);
    }
}
