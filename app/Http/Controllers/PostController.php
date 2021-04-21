<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $menuCategories = Category::limit(7)->get();
        $popPosts = Post::orderBy('id', 'desc')->limit(5)->get();
        try {
            $post = Post::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            abort(404);
        }
        $relatedPosts = $post->subCategory->posts->where('id' ,'!=', $post->id)->take(3);
        views($post)->cooldown(1)->record();

        return view('post', [
            'menuCategories' => $menuCategories,
            'popPosts' => $popPosts,
            'post' => $post,
            'relatedPosts' => $relatedPosts
        ]);
    }
}
