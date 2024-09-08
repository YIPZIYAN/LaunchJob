<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {

        Role::create(['name' => 'company']);
        Role::create(['name' => 'employee']);

        $this->call([
            CompanySeeder::class,
            UserSeeder::class,
            JobPostSeeder::class,
            JobApplicationSeeder::class,
            InterviewSeeder::class,
        ]);

    }
}
