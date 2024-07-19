<?php

namespace Database\Factories;

use App\Models\JobPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class JobPostFactory extends Factory
{
    protected $model = JobPost::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'min_salary' => $this->faker->randomFloat(),
            'max_salary' => $this->faker->randomFloat(),
            'position' => $this->faker->word(),
            'job_type' => $this->faker->word(),
        ];
    }
}
