<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel:ToolClass>
 */
class ToolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => null,
            'class' => $this->faker->word() . '_' . $this->faker->unique()->numberBetween(1, 9999),
            'description'   =>  fake()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(), 
        ];
    }
}
