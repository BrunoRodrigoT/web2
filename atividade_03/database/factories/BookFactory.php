<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'author_id' => Author::factory(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'publisher_id' => Publisher::factory(),
            'published_year' => $this->faker->year,
        ];
    }
}
