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
        $categories = Category::with('subCategories.posts')->get();
        $popPosts = Post::orderByViews('desc', Period::pastDays(3))->limit(5)->get();
        $post = Post::with('subCategory.posts', 'subCategory.category', 'user', 'comments')->where('slug', $slug)->first();
        if (!$post) {
            abort(404);
        }
        views($post)->cooldown(1)->record();

        return view('post', [
            'categories' => $categories,
            'popPosts' => $popPosts,
            'post' => $post
        ]);
    }
}
