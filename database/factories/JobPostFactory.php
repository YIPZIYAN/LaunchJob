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
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->text(),
            'location' => $this->faker->city(),
            'min_salary' => $this->faker->numberBetween(1,6000),
            'max_salary' => $this->faker->numberBetween(6000,20000),
            'period' => $this->faker->randomElement(['Internship','Part-time','Full-time']),
            'mode' => $this->faker->randomElement(['Hybrid','On-site','Remote']),
            'job_type_id' => $this->faker->randomNumber(1, 21),
            'company_id' => $this->faker->randomNumber(1,10),
        ];
    }
}
