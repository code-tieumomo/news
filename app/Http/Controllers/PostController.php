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

        return view('post', [
            'menuCategories' => $menuCategories,
            'popPosts' => $popPosts,
            'post' => $post
        ]);
    }
}
