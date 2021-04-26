<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	'News',
        	'View',
        	'World',
        	'Video',
        	'Business',
        	'Entertainment',
        	'Sport',
        	'Law',
        	'Education',
        	'Health',
        	'Life',
        	'Travel',
        	'Science',
        	'Digitizing',
        	'Vehicle',
        	'Opinion',
        	'Talk',
        	'Comedy'
        ];

        $subCategories = [
        	'News' => [
        		'Politic',
        		'Traffic',
        		'Mekong',
                'Population',
        	],
            'View' => [
                'View'
            ],
        	'World' => [
        		'Data',
        		'Analysis',
        		'Life Around Us',
                'Military'
        	],
        	'Video' => [
        		'News',
        		'Lifestyle',
        		'Sports Life',
        		'Food',
                'Life 4.0',
                'Talk',
                'Mountain & Forest Story',
                'Econimic Seminar',
                'Entertainment',
                'Travel',
                'World',
                'Law',
                'Business',
                'Science',
                'Education',
                'Health',
                'Kid-lab'
        	],
        	'Business' => [
        		'International',
        		'Enterprise',
        		'Stock',
        		'Real Estate',
                'Ebank',
                'Macro',
                'My Money',
                'Insurrance',
                'Goods',
                'Startup',
                'Vhome'
        	],
        	'Entertainment' => [
        		'World Stars',
        		'Video',
        		'Movie',
        		'Music',
                'Fashion',
                'Make Up',
                'Book',
                'Theater - Fine Arts'
        	],
        	'Sport' => [
        		'Video',
        		'Soccer',
        		'Schedule',
        		'Bundesliga',
                'Tennis',
                'VM 2021',
                'Other Subjects',
                'Behind The Scenes',
                'Image',
                'Report',
                'V-race',
                'Multiple-choise'
        	],
        	'Law' => [
        		'Criminal',
        		'Advisory'
        	],
        	'Education' => [
        		'Admissions',
        		'Test Score',
                'Look Up University',
        		'Study Aboard',
        		'Learn English',
                'Multiple-choise',
                'Education 4.0',
                'Kid-lab',
        	],
        	'Health' => [
        		'News',
        		'Advisory',
        		'Nutrition',
        		'Health and Beauty',
                'Man',
                'Diseases',
                'Cancer',
                'Vaccine'
        	],
        	'Life' => [
        		'Home',
        		'Life Lessons',
        		'House',
        		'Consumption'
        	],
        	'Travel' => [
        		'Destination',
        		'Footprint',
        		'Advisory',
        		'Safe Go',
                'Image',
                'Eat & Play'
        	],
        	'Science' => [
        		'News',
        		'Invention',
        		'Application',
        		'Natural World',
                'Conventional',
                'Science In The Country'
        	],
        	'Digitizing' => [
        		'Technology',
        		'Product',
        		'Forum',
        		'Tech Award 2021'
        	],
        	'Vehicle' => [
        		'Market',
        		'Advisory',
        		'Forum',
        		'Evaluate',
                'Video',
                'Car Price List',
                'Tram',
                'License Test',
                'Purchase'
        	],
        	'Opinion' => [
        		'News',
        		'Life'
        	],
        	'Talk' => [
        		'Troubleshooting',
        		'Dating'
        	],
        	'Comedy' => [
        		'Laugh',
        		'Funny Question',
        		'Strange Story',
        		'Pet'
        	],
        ];

        foreach ($categories as $category) {
        	$categoryCreated = Category::create([
        		'name' => $category,
                'slug' => Str::slug($category, '-')
        	]);

        	if (isset($subCategories[$category])) {
        		foreach ($subCategories[$category] as $subCategory) {
        			SubCategory::create([
        				'name' => $subCategory,
                        'slug' => Str::slug($subCategory, '-'),
        				'category_id' => $categoryCreated->id
        			]);
        		}
        	}
        }
    }
}
