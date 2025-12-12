<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clarifi;

class ClarifiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $clarifi = [

            [
                'title' => 'It clarifies all strategic financial decisions',
                'description' => 'With this tool, you can say goodbye to overspending, stay on track with your savings goals, and say goodbye to financial worries. Get ready for a clearer view of your finances like never before!',
                'image' => null
                
            ]

        ];

        # delete old data
        Clarifi::truncate();

        # insert new data
        foreach ($clarifi as $key => $value) {

            Clarifi::create($value);
        }

    }
}
