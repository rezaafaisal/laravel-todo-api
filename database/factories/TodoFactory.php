<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = rand(1,2);
        $bool = rand(0,1);
        return [
            'category_id' => $category,
            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'description' => $this->faker->paragraph(),
            'is_starred' => $bool,
            'is_done'=> $bool
        ];
    }
}
