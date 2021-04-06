<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

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
        	'Perspectives',
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
        	'Digital',
        	'Car',
        	'Opinion',
        	'Talk',
        	'Comedy'
        ];

        $subCategories = [
        	'News' => [
        		'Politic',
        		'Traffic',
        		'Mekong'
        	],
        	'World' => [
        		'Data',
        		'Analysis',
        		'Life Around Us'
        	],
        	'Video' => [
        		'News',
        		'Lifestyle',
        		'Sports Life',
        		'Food'
        	],
        	'Business' => [
        		'International',
        		'Enterprise',
        		'Stock',
        		'Real Estate'
        	],
        	'Entertainment' => [
        		'World Stars',
        		'Video',
        		'Movie',
        		'Music'
        	],
        	'Sport' => [
        		'Video',
        		'Soccer',
        		'Schedule',
        		'Bundesliga'
        	],
        	'Law' => [
        		'Criminal',
        		'Advisory'
        	],
        	'Education' => [
        		'Admissions',
        		'Exam Score',
        		'Study Aboard',
        		'Learn English'
        	],
        	'Health' => [
        		'News',
        		'Advisory',
        		'Nutrition',
        		'Health and Beauty'
        	],
        	'Life' => [
        		'Home',
        		'Life Lessons',
        		'Home',
        		'Consumption'
        	],
        	'Travel' => [
        		'Destination',
        		'Footprint',
        		'Advisory',
        		'Safe Go'
        	],
        	'Science' => [
        		'News',
        		'Invention',
        		'Application',
        		'Natural World'
        	],
        	'Digital' => [
        		'Technology',
        		'Product',
        		'Forum',
        		'Tech Award 2021'
        	],
        	'Car' => [
        		'Market',
        		'Advisory',
        		'Forum',
        		'Evaluate'
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
        		'name' => $category
        	]);

        	if (isset($subCategories[$category])) {
        		foreach ($subCategories[$category] as $subCategory) {
        			SubCategory::create([
        				'name' => $subCategory,
        				'category_id' => $categoryCreated->id
        			]);
        		}
        	}
        }
    }
}
