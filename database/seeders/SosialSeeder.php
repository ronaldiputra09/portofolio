<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sosials = [
            [
                'name' => 'Facebook',
                'link' => 'https://facebook.com',
                'icon' => 'fab fa-facebook-f',
            ],
            [
                'name' => 'Twitter',
                'link' => 'https://twitter.com',
                'icon' => 'fab fa-twitter',
            ],
            [
                'name' => 'Instagram',
                'link' => 'https://instagram.com',
                'icon' => 'fab fa-instagram',
            ],
        ];

        foreach ($sosials as $sosial) {
            \App\Models\Sosial::create($sosial);
        }
    }
}
