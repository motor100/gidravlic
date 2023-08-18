<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Faker provider
        $faker = new \Faker\Generator();
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));
        $faker->addProvider(new \Faker\Provider\ru_RU\Text($faker));
        
        $name = $faker->firstName();

        $text = random_int(0, 10);

        $publicated_at = random_int(0, 1);
        
        return [
            'name' => $name,
            'email' => $this->faker->email,
            'text' => $text == 2 ? $faker->name : $faker->realText(),
            'publicated_at' => $publicated_at ? now() : NULL,
        ];
    }
}
