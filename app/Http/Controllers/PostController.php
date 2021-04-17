<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $menuCategories = Category::limit(7)->get();
        $popPosts = Post::orderBy('id', 'desc')->limit(5)->get();

        return view('post', [
            'menuCategories' => $menuCategories,
            'popPosts' => $popPosts
        ]);
    }
}
