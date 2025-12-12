<?php

namespace Database\Seeders;

use App\Models\Usability;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsabilitiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $Usability = [
            [
                'title' => 'Its usability is simple and intuitive for users',
                'description' => "It's a cloud-based accounting tool ideal for individuals & businesses to easily manage finances, invoices & payroll. Unlock the 3-step path to enhanced financial control.",
                'image' => null,
                'youtube' => null,
                'link' => '#'
            ]

        ];

        # delete old data
        Usability::truncate();

        # insert new data
        Usability::insert($Usability);
    }
}
