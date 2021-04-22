<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
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
            $category = Category::where('slug', $slug)->first();
            if (!$category) {
                abort(404);
            }
            $posts = $category->posts()->paginate(8);

            return view('category-detail', [
                'menuCategories' => $menuCategories,
                'popPosts' => $popPosts,
                'category' => $category,
                'posts' => $posts,
            ]);
        } else {
            $category = Category::where('slug', $slug)->first();
            if (!$category) {
                abort(404);
            }
            $subCategory = SubCategory::where([
                'slug' => $subSlug,
                'category_id' => $category->id
            ])->first();
            if (!$subCategory) {
                abort(404);
            }
            $popPosts = Post::where('sub_category_id', $subCategory->id)->orderByViews('desc', Period::pastDays(3))->limit(5)->get();
            $posts = $subCategory->posts->paginate(8);

            return view('sub-category-detail', [
                'menuCategories' => $menuCategories,
                'popPosts' => $popPosts,
                'category' => $category,
                'subCategory' => $subCategory,
                'popPosts' => $popPosts,
                'posts' => $posts,
            ]);
        }
    }
}
