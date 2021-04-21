<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $menuCategories = Category::limit(7)->get();
        $popPosts = Post::orderByViews('desc', Period::pastDays(3))->limit(5)->get();
        $categories = Category::all();

        return view('category', [
            'menuCategories' => $menuCategories,
            'popPosts' => $popPosts,
            'categories' => $categories
        ]);
    }

    public function show($slug, $subSlug = null,Request $request)
    {
        $menuCategories = Category::limit(7)->get();
        $popPosts = Post::orderByViews('desc', Period::pastDays(3))->limit(5)->get();

        if (!$subSlug) {
            if (!$request->page) {
                $request->page = 1;
            }
            $category = Category::where('slug', $slug)->first();
            $posts = $category->posts()->paginate(8);

            return view('category-detail', [
                'menuCategories' => $menuCategories,
                'popPosts' => $popPosts,
                'category' => $category,
                'posts' => $posts,
                'nextPage' => $request->page
            ]);
        } else {
            return $slug . '/' . $subSlug;
        }
    }
}
