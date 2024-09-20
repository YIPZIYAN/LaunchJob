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
            'email' => 'chunyengoh030503@gmail.com',
            'password' => 'password',
        ])->assignRole('employee');

        User::factory()->create([
            'name' => 'Employee 2',
            'email' => 'junxianlee083@gmail.com',
            'password' => 'password',
        ])->assignRole('employee');

        User::factory()->create([
            'name' => 'Employee 3',
            'email' => 'gohcy-wm21@student.tarc.edu.my',
            'password' => 'password',
        ])->assignRole('employee');
    }
}
