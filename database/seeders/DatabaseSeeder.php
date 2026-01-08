<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $u1 = \App\Models\User::factory()->create(
            [
                'email' => 'admin1@test.com',
                'name' => 'Admin One'
            ]);

        $u2 = \App\Models\User::factory()->create(
            [
                'email' => 'admin2@test.com',
                'name' => 'Admin Two'
            ]);

        foreach ([$u1, $u2] as $user) {
            \App\Models\Lead::factory(10)->create(['assigned_to' => $user->id])->each(function ($lead) {
                \App\Models\Task::factory(rand(1, 2))->create(['lead_id' => $lead->id]);
            });
        }
    }
}
