<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $about = [
            [
                'title' => 'Our mission is to bring financial wellness',
                'description' => 'We believe financial wellness is key to a better life. Our mission is to empower individuals and businesses with the tools they need to understand, manage, and grow their financial health.With our app, you can easily track spending, set budgets, automate savings, and get real-time insights into your financial world.For businesses, our software offers seamless integration with your existing tools to ensure that your accounting, invoicing, and financial reporting are effortless and organized.',
                'photo' => null,
            ]

        ];

        # delete old data
        About::truncate();
        # insert new data
        About::insert($about);
    }
}
