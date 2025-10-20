<?php

namespace Database\Factories;

use App\Models\ToolAttribute;
use App\Models\ToolType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToolAttribute>
 */
class ToolAttributeFactory extends Factory
{

    protected $model = ToolAttribute::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'toolType_id' => ToolType::factory(),
            'data' => $this->faker->word(),
            'data_type' => fake()->randomElement(['string','integer', 'boolean', 'text']),
        ];
    }
}
