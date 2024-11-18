<?php

namespace Database\Seeders;

use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Hafiz',
            'second_name' => 'Said',
            'email' => 'saidhafiz@example.com',
        ]);

        Job::factory(15)->create(function () {
            return [
                'title' => fake()->jobTitle(),
                'salary' => fake()->numberBetween(25000,50000),
                'employer_id' => Employer::factory(),
            ];
        });
    }
}
