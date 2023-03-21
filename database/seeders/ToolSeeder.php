<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'name' => 'Flutter',
                'slug' => 'flutter',
                'icon' => 'https://storage.googleapis.com/cms-storage-bucket/4fd0db61df0567c0f352.png',
                'status' => 'active',
            ],
            [
                'name' => 'Dart',
                'slug' => 'dart',
                'icon' => 'https://dart.dev/assets/shared/dart/icon/64.png',
                'status' => 'non-active',
            ],
        ];

        foreach ($tools as $tool) {
            \App\Models\Tool::create($tool);
        }
    }
}
