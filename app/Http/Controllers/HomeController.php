<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

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

    public function test()
    {
        $factory = (new Factory())->withDatabaseUri('https://uet-news-2021-default-rtdb.firebaseio.com/');

        $database = $factory->createDatabase();
        for($i = 22;$i <= 25;$i++) {
            $database->getReference('featurePosts/' . $i)->set([
                'subCategory' => 'Entertaimain > Movie',
                'thumbnail' => 'https://via.placeholder.com/640x240.png',
                'title' => 'Omnis sunt eos animi.',
                'writer' => 'Admin',
                'time' => 'April 15, 2021'
            ]);
        }
    }
}
