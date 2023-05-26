<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'project_name' => fake()->text(60),
            'description' => fake()->text(500),
            'inclusions' => fake()->text(300),
            'exclusions' => fake()->text(300),
            'project_value_aud_dollars' => fake()->numberBetween(100000,1000000)
        ];
    }
}
