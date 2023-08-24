<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ru_RU');

        $description = "<p>" . $faker->realText() . "</p>";

        $title = $faker->catchPhrase();
        $slug = \Illuminate\Support\Str::slug($title);

        $hit = random_int(0, 1);
        
        return [
            'title' => $title,
            'slug' => $slug,
            'category_id' => random_int(0, 20),
            'image' => 'public/uploads/products/' . random_int(0, 10) . '.jpg',
            'description' => $description,
            'stock' => random_int(0, 100),
            'price' => random_int(50, 5000),
            'hit' => $hit ? 1 : NULL,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
