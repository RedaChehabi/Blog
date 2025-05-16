<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])->get();
        return view('posts.index', compact('posts'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('title', 'LIKE', "%{$query}%")->get();

        return view('posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        $users = \App\Models\User::all();
        return view('posts.create', compact('categories', 'users'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->findOrFail(['user', 'category', 'comments']);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = \App\Models\Category::all();
        $users = \App\Models\User::all();
        return view('posts.edit', compact('post', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
