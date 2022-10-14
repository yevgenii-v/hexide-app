<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'price' => $this->faker->numberBetween(50, 10000),
            'updated_at' => $this->faker->date('H:i:s', rand(1,54000)),
            'created_at' => $this->faker->date('H:i:s', rand(1,54000)),
        ];
    }
}
