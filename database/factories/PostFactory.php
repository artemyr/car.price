<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\City;
use App\Models\Category;

class PostFactory extends Factory
{
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
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'likes' => random_int(1,2000),
            'is_published' => 1,
            'city_id' => City::get()->random()->id,
            'category_id' => Category::get()->random()->id,
            'link' => $this->faker->word
        ];
    }
}
