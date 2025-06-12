<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublisherFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->company,
            'address' => $this->faker->address,
        ];
    }
}