<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function show($slug, $subSlug = null,Request $request)
    {
        $categories = Category::with('subCategories.posts')->get();
        $popPosts = Post::orderByViews('desc', Period::pastDays(3))->limit(7)->get();

        if (!$subSlug) {
            $category = Category::where('slug', $slug)->first();
            if (!$category) {
                abort(404);
            }
            $posts = $category->posts()->sortByDesc('id')->paginate(8);

            return view('category-detail', [
                'categories' => $categories,
                'popPosts' => $popPosts,
                'category' => $category,
                'posts' => $posts,
            ]);
        } else {
            $category = Category::where('slug', $slug)->first();
            if (!$category) {
                abort(404);
            }
            $subCategory = SubCategory::with('posts')->where([
                'slug' => $subSlug,
                'category_id' => $category->id
            ])->first();
            if (!$subCategory) {
                abort(404);
            }
            $popPosts = Post::where('sub_category_id', $subCategory->id)->orderByViews('desc', Period::pastDays(3))->limit(5)->get();
            $posts = $subCategory->posts->paginate(8);

            return view('sub-category-detail', [
                'popPosts' => $popPosts,
                'category' => $category,
                'categories' => $categories,
                'subCategory' => $subCategory,
                'popPosts' => $popPosts,
                'posts' => $posts,
            ]);
        }
    }
}
