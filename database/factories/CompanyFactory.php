<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default job-state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
//            'avatar' => fake()->image('public/storage',200,200,fullPath: false),
            'description' => $this->faker->realText(200),
            'address' => $this->faker->address
        ];
    }
}
