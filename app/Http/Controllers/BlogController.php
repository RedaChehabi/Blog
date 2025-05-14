<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index()
    {
        // Eloquent
        $eloquentPosts = Post::with(['user', 'category'])->get();

        // Query Builder
        $queryBuilderPosts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'users.name as author', 'categories.name as category')
            ->get();

        return view('blog.index', [
            'eloquentPosts' => $eloquentPosts,
            'queryBuilderPosts' => $queryBuilderPosts
        ]);
    }

    public function show($id)
    {
        // Eloquent
        $eloquentPost = Post::with(['user', 'category', 'tags', 'comments'])->findOrFail($id);

        // Query Builder
        $queryBuilderPost = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.id', $id)
            ->select('posts.*', 'users.name as author', 'categories.name as category')
            ->first();

        return view('blog.show', compact('eloquentPost', 'queryBuilderPost'));
    }

    public function comments($id)
    {
        // Eloquent
        $eloquentComments = Comment::with(['user', 'post'])
            ->where('post_id', $id)
            ->get();

        // Query Builder
        $queryBuilderComments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('post_id', $id)
            ->select('comments.*', 'users.name as author')
            ->get();

        return view('blog.comments', compact('eloquentComments', 'queryBuilderComments'));
    }

    public function tags($id)
    {
        // Eloquent
        $eloquentTags = Post::findOrFail($id)->tags;

        // Query Builder
        $queryBuilderTags = DB::table('post_tag')
            ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
            ->where('post_id', $id)
            ->select('tags.*')
            ->get();

        return view('blog.tags', compact('eloquentTags', 'queryBuilderTags'));
    }

    public function roles($id)
    {
        // Eloquent
        $eloquentRoles = User::findOrFail($id)->roles;

        // Query Builder
        $queryBuilderRoles = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('user_id', $id)
            ->select('roles.*')
            ->get();

        return view('blog.roles', compact('eloquentRoles', 'queryBuilderRoles'));
    }

    public function withProfiles()
    {
        // Eloquent
        $eloquentUsers = User::has('profile')->with('profile')->get();

        // Query Builder
        $queryBuilderUsers = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->select('users.*', 'profiles.bio', 'profiles.avatar', 'profiles.website')
            ->get();

        return view('blog.withProfiles', compact('eloquentUsers', 'queryBuilderUsers'));
    }

    public function topArticles()
    {
        /// Eloquent Version (Fixed)
        $eloquentPosts = Post::withCount('comments')
            ->groupBy('id')
            ->having('comments_count', '>', 5)
            ->get();

        // Query Builder Version (Optimized)
        $queryBuilderPosts = DB::table('posts')
            ->select('posts.*', DB::raw('COUNT(comments.id) as comments_count'))
            ->join('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id')
            ->having('comments_count', '>', 5)
            ->get();

        return view('blog.topArticles', compact('eloquentPosts', 'queryBuilderPosts'));
    }

    public function latest()
    {
        // Eloquent
        $eloquentPosts = Post::with(['category', 'tags', 'comments'])
            ->withCount('comments')
            ->latest()
            ->take(5)
            ->get();

        // Query Builder
        $queryBuilderPosts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->leftJoin('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->leftJoin('tags', 'post_tag.tag_id', '=', 'tags.id')
            ->select('posts.*', 'categories.name as category', DB::raw('GROUP_CONCAT(tags.name) as tags'))
            ->groupBy('posts.id')
            ->orderBy('posts.created_at', 'desc')
            ->limit(5)
            ->get();

        return view('blog.latest', compact('eloquentPosts', 'queryBuilderPosts'));
    }
}
