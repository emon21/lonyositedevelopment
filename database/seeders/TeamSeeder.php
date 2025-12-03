<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $team = [

            [
                'name' => 'William Smith',
                'position' => 'Lead Software Engineer',
                'description' => 'As the Chief Executive Officer of Lonyo, Michael Chen brings over a decade of leadership and expertise in finance and technology.',
                'photo' => null
            ],
            [
                'name' => 'Alex Jonny',
                'position' => 'Head of Product',
                'description' => 'With a passion for innovation, he has been instrumental in shaping the company’s vision to empower individuals and businesses with smarter financial solutions. ',
                'photo' => null
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Chief Executive Officer',
                'description' => 'Under his guidance, Lonyo has grown into a trusted name in the finance software industry, known for its user-centric design, cutting-edge technology.',
                'photo' => null
            ],
            [
                'name' => 'Liam Discord',
                'position' => 'Chief Financial Officer',
                'description' => 'Michael enjoys mentoring young entrepreneurs and staying updated on the latest fintech trends to keep Lonyo ahead of the curve.',
                'photo' => null
            ],



        ];

        # OLD Data Delete
        Team::truncate();

        # Insert Data
        foreach ($team as $item) {
            Team::create($item);
        }
    }
}
