<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ToolClass;
use App\Models\ToolType;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToolType>
 */
class ToolTypeFactory extends Factory
{

    protected $model = ToolType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'toolClass_id' => ToolClass::factory(),
            'name' =>  fake()->name(),
            'description' => fake()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(), 
        ];
    }
}
