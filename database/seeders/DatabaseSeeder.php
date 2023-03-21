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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Developer',
            'username' => 'developer',
            'avatar' => 'https://avatars.githubusercontent.com/u/1?v=4',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CategorySeeder::class,
            ToolSeeder::class,
            SosialSeeder::class,
        ]);
    }
}
