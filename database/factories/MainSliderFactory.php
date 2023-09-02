<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MainSlider>
 */
class MainSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $count = random_int(1, 2);
        
        return [
            'title' => 'Слайд' . $count,
            'image' => 'public/uploads/slider/main-slide' . $count . '.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
