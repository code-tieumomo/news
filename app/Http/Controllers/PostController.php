<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $menuCategories = Category::limit(7)->get();
        $categories = Category::all();
        $popPosts = Post::orderByViews('desc', Period::pastDays(3))->limit(5)->get();
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            abort(404);
        }
        $relatedPosts = $post->subCategory->posts->where('id' ,'!=', $post->id)->take(3);
        views($post)->cooldown(1)->record();

        return view('post', [
            'menuCategories' => $menuCategories,
            'categories' => $categories,
            'popPosts' => $popPosts,
            'post' => $post,
            'relatedPosts' => $relatedPosts
        ]);
    }
}
