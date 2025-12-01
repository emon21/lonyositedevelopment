<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $feature = [
            [
                'icon' => 'feature1',
                'title' => 'Expense Tracking',
                'description' => 'Allows users to record and categorize daily transactions such as income, expenses, bills, and savings.',
            ],
            [
                'icon' => 'feature2',
                'title' => 'Budgeting Tools',
                'description' => 'Provides visual insights like graphs or pie charts to show how much is spent versus the budgeted amount.',
            ],
            [
                'icon' => 'feature3',
                'title' => 'Investment Tracking',
                'description' => 'For users interested in investing, finance apps often provide tools to track stocks, bonds or mutual funds.',
            ],
            [
                'icon' => 'feature4',
                'title' => 'Tax Management',
                'description' => 'This tool integrate with tax software to help users prepare for tax season, deduct expenses, and file returns.',
            ],
            [
                'icon' => 'feature5',
                'title' => 'Bill Management',
                'description' => 'Tracks upcoming bills, sets reminders for due dates, and enables easy payments via integration with online banking',
            ],
            [
                'icon' => 'feature6',
                'title' => 'Security Features',
                'description' => 'Provides bank-level encryption to ensure user data and financial information remain safe, MFA and biometric logins.',
            ]

        ];

        // Delete Data
        Feature::truncate();


        // insert Data
        Feature::insert($feature);
    }
}
