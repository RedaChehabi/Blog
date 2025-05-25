<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;


class Post2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $category_id = $request->input('category_id');

        $query = Post::query();

        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%");
        }
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        $posts = $query->with('category', 'user')->get();

        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'tags', 'categories'));
    }
    public function search(Request $request)
    {
        dd($request->all());
        $query = $request->input('query');
        $posts = Post::where('title', 'LIKE', "%{$query}%")->with('tags')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $users = User::all();

        return view('posts.create', compact('tags', 'categories', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        $validated = $request->validated();
        $tagsToAttach = $validated['tags'] ?? [];
        if (!empty($tagsToAttach)) {
            $post->tags()->attach($tagsToAttach);
        }

        return redirect()->route('posts.index', $post)
            ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('tags');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->load('tags');
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $post->update($validated);
        $tags = $validated['tags'] ?? [];
        $post->tags()->sync($tags);
        return redirect()->route('posts.index', $post)
            ->with('success', 'Post updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
