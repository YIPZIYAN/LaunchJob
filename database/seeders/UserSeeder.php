<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Elon Mask',
            'email' => 'company@gmail.com',
            'password' => 'password',
            'company_id' => 1
        ])->assignRole('company');

        User::factory()->create([
            'name' => 'Employee 1',
            'email' => 'test@gmail.com',
            'password' => 'password',
        ])->assignRole('employee');
    }
}
