<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(7);
        return [
            'title' => $title,
            'sumary' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraph(100),
            'thumbnail' => $this->faker->imageUrl($width = 640, $height = 480),
            'slug' => Str::slug($title, '-'),
            'user_id' => User::where('role_id', '2')->get()->random()->id,
            'sub_category_id' => SubCategory::all()->random()->id
        ];
    }
}
