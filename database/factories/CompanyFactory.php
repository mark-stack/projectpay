<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'company_name' => fake()->company(),
            'company_email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'website' => fake()->url()
        ];
    }
}
