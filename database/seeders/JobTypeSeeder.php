<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobType = [
            ['name' => 'Administration'],
            ['name' => 'Advertising'],
            ['name' => 'Agriculture'],
            ['name' => 'Arts'],
            ['name' => 'Finance'],
            ['name' => 'Construction'],
            ['name' => 'Education'],
            ['name' => 'Engineering'],
            ['name' => 'Healthcare'],
            ['name' => 'Hospitality'],
            ['name' => 'Information Technology'],
            ['name' => 'Legal'],
            ['name' => 'Marketing'],
            ['name' => 'Media Communication'],
            ['name' => 'Manufacturing'],
            ['name' => 'Sales'],
            ['name' => 'Science'],
            ['name' => 'Social Services'],
            ['name' => 'Logistics'],
            ['name' => 'Real Estate'],
            ['name' => 'Other'],
        ];

        // Insert categories into the database
        DB::table('job_types')->insert($jobType);
    }
}
