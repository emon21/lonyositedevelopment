<?php

namespace Database\Seeders;

use App\Models\App;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $app = [

            [
                'title' => 'Start a new level of money management',
                'description' => 'Our finance apps and software are powerful tools for managing personal or business finances, helping users stay organized, track financial health, and make informed decisions.',
                'photo' => null

            ]

        ];

        # delete old data
        App::truncate();

        # insert new data
        foreach ($app as $key => $value) {

            App::create($value);
        }
    }
}
