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
        $menuCategories = Category::limit(7)->get();
        // foreach($menuCategories as $category) {
        //     foreach($category->subCategories as $subCategory) {
        //         foreach($subCategory->posts->take(5) as $post) {
        //             echo "<pre>";
        //             print_r($category->name.' - '.$subCategory->name.' - '.$post->title);
        //             echo "</pre>";
        //         }
        //     }
        // }

        return view('home', [
            'menuCategories' => $menuCategories
        ]);
    }
}
