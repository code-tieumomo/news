<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => $this->faker->sentence(5),
            'sumary' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraph(10),
            'thumbnail' => $this->faker->imageUrl($width = 640, $height = 480),
            'user_id' => User::where('role_id', '2')->get()->random()->id,
            'sub_category_id' => SubCategory::all()->random()->id
        ];
    }
}
