<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        # Review List 
        $reviews = [
            [
                'name' => 'Liam Gallagher',
                'position' => 'Teacher of Luxe Escapes Hotels',
                'message' => 'This app transformed my budgeting! It has been a clear view longer have to worry of my expenses and savings goals.',
                'photo' => null
            ],
            [
                'name' => 'Emma Watson',
                'position' => 'Marketing Manager at Tech Solutions',
                'message' => 'An essential tool for managing my finances. The user-friendly interface and insightful reports have made budgeting a breeze.',
                'photo' => null
            ],
            [
                'name' => 'Noah Johnson',
                'position' => 'Freelance Designer',
                'message' => 'I love how this app helps me track my spending habits. It has improved my financial awareness and helped me save more each month.',
                'photo' => null
            ],
            [
                'name' => 'Olivia Taylor',
                'position' => 'Financial Analyst at Finance Firm',
                'message' => 'This app has been a game-changer for my budgeting. It has helped me make informed decisions and stay on top of my finances.',
                'photo' => null
            ],
            [
                'name' => 'Ethan Smith',
                'position' => 'Entrepreneur',
                'message' => 'I love how this app helps me track my spending habits. It has improved my financial awareness and helped me save more each month.',
                'photo' => null
            ],
            [
                'name' => 'Sophia Wilson',
                'position' => 'Financial Advisor',
                'message' => 'I love how this app helps me track my spending habits. It has improved my financial awareness and helped me save more each month.',
                'photo' => null
            ],
            [
                'name' => 'Jackson Lee',
                'position' => 'Business Owner',
                'message' => 'I love how this app helps me track my spending habits. It has improved my financial awareness and helped me save more each month.',
                'photo' => null
            ],
            [
                'name' => 'Mia Davis',
                'position' => 'Financial Planner',
                'message' => 'I love how this app helps me track my spending habits. It has improved my financial awareness and helped me save more each month.',
                'photo' => null
            ],
            [
                'name' => 'Lucas Garcia',
                'position' => 'Entrepreneur',
                'message' => 'I love how this app helps me track my spending habits. It has improved my financial awareness and helped me save more each month.',
                'photo' => null

            ],
            [
                'name' => 'Ava Johnson',
                'position' => 'Financial Analyst',
                'message' => 'I love how this app helps me track my spending habits. It has improved my financial awareness and helped me save more each month.',
                'photo' => null
            ]

        ];

        foreach ($reviews as $review) {
            \App\Models\Review::create($review);
        }
    }
}
