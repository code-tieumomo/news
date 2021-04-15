<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $popularCategories = Category::limit(8)->get();
        $trendingCategories = SubCategory::limit(8)->get();
        $allCategories = Category::all();
        $lastestPosts = Post::orderBy('id', 'desc')->limit(4)->get();
        $hotestPosts = Post::orderBy('id', 'desc')->limit(8)->get();
        $anotherPosts = Post::orderBy('id', 'desc')->skip(8)->take(4)->get();
        $firstColumnLastestPosts = Post::orderBy('id', 'desc')->skip(4)->take(2)->get();
        $secondColumnLastestPosts = Post::orderBy('id', 'desc')->skip(6)->take(2)->get();

        return view('home', [
            'popularCategories' => $popularCategories,
            'trendingCategories' => $trendingCategories,
            'allCategories' => $allCategories,
            'lastestPosts' => $lastestPosts,
            'hotestPosts' => $hotestPosts,
            'anotherPosts' => $anotherPosts,
            'firstColumnLastestPosts' => $firstColumnLastestPosts,
            'secondColumnLastestPosts' => $secondColumnLastestPosts
        ]);
    }
}
