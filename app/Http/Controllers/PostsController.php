<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(12);

        return view('blog-listing')->with('posts', $posts);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $slug, Post $post)
    {
        if (! empty($post->wp_url)) {
            return redirect($post->wp_json['link']);
        }

        return view('blog-reader')->with('post', $post);
    }

    public function showTag(string $tag)
    {
        $posts = Post::where('tags', 'like', "%$tag%")
            ->orderBy('created_at', 'desc')
            ->simplePaginate(12);

        return view('blog-listing')->with('posts', $posts);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
