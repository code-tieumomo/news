<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $categories = Category::with('subCategories.posts')->get();
        $popPosts = Post::orderByViews('desc', Period::pastDays(3))->limit(5)->get();
        $post = Post::with('subCategory.posts', 'subCategory.category', 'user')->where('slug', $slug)->first();
        $comments = Comment::with('user')->where('post_id', '=', $post->id)->orderBy('id', 'desc')->simplePaginate(5);
        if (!$post) {
            abort(404);
        }
        views($post)->cooldown(1)->record();

        return view('post', [
            'categories' => $categories,
            'popPosts' => $popPosts,
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function lastest()
    {
        $popPosts = Post::orderByViews('desc', Period::pastDays(3))->limit(7)->get();
        $lastestPosts = Post::with('subCategory.category', 'user')->orderBy('id', 'desc')->simplePaginate(20);
        $categories = Category::with('subCategories.posts')->get();

        return view('lastest', [
            'popPosts' => $popPosts,
            'categories' => $categories,
            'lastestPosts' => $lastestPosts
        ]);
    }

    public function search(Request $request)
    {
        if ($request->search == '') {
            return redirect()->route('posts.lastest');
        }

        $popPosts = Post::orderByViews('desc', Period::pastDays(3))->limit(7)->get();
        $searchPosts = Post::with('subCategory.category', 'user')->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(10);
        $categories = Category::with('subCategories.posts')->get();

        return view('search', [
            'keyword' => $request->search,
            'popPosts' => $popPosts,
            'categories' => $categories,
            'searchPosts' => $searchPosts
        ]);
    }
}
