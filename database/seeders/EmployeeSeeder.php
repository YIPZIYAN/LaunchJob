<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->create([
            'user_id' => '2',
            'profession' => 'test',
        ]);

        Employee::factory()->create([
            'user_id' => '3',
            'profession' => 'test',

        ]);

        Employee::factory()->create([
            'user_id' => '4',
            'profession' => 'test',
        ]);
    }
}
