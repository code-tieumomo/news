<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menuCategories = Category::limit(7)->get();
        $quotes = Inspiring::quotes();


        return view('home', [
            'menuCategories' => $menuCategories,
            'quotes' => $quotes
        ]);
    }
}
