<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abouts = [
            'name_depan' => 'Ronaldi',
            'name_belakang' => 'Putra',
            'phone' => '081539432518',
            'email' => 'emailnyaronal@gmail.com',
            'birthday' => '1999-12-12',
            'profession' => 'Web Developer',
            'website' => 'https://ronaldis.me',
            'country' => 'Indonesia',
            'city' => 'Jakarta',
            'address' => 'Jl. Raya Ciputat',
            'image' => 'https://avatars.githubusercontent.com/u/42945782?v=4',
            'about' => 'Lorem',
        ];

        \App\Models\About::create($abouts);
    }
}
