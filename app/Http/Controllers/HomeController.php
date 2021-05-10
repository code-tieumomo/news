<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $factory = (new Factory())->withDatabaseUri('https://uet-news-2021-default-rtdb.firebaseio.com/');            
        $database = $factory->createDatabase();
        $quotes = Collection::make([
            'An unexamined life is not worth living. - Socrates',
            'Be present above all else. - Naval Ravikant',
            'He who is contented is rich. - Laozi',
            'No surplus words or unnecessary actions. - Marcus Aurelius',
            'Order your soul. Reduce your wants. - Augustine',
            'Simplicity is an acquired taste. - Katharine Gerould',
            'Simplicity is the essence of happiness. - Cedric Bledsoe',
            'Simplicity is the ultimate sophistication. - Leonardo da Vinci',
            'Smile, breathe, and go slowly. - Thich Nhat Hanh',
            'Well begun is half done. - Aristotle',
        ]);
        $featureCategoriesRef = $database->getReference('featureCategories')->getSnapshot();
        $featureCategoriesId = $featureCategoriesRef->getValue();
        $featureCategories = Category::with('subCategories')->whereIn('id', $featureCategoriesId)->get();
        $popPosts = Post::with('subCategory')->orderByViews('desc', Period::pastDays(3))->limit(5)->get();
        $lastestPosts = Post::with('subCategory')->orderBy('id', 'desc')->limit(6)->get();
        $topWriters = User::role('writer')->limit(10)->get();
        $categories = Category::with('subCategories')->get();

        return view('home', [
            'quotes' => $quotes,
            'featureCategories' => $featureCategories,
            'popPosts' => $popPosts,
            'lastestPosts' => $lastestPosts,
            'topWriters' => $topWriters,
            'categories' => $categories,
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
