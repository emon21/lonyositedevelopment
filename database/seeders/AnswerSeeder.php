<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answer = [
            [
                'title' => 'Is my financial data safe and secure?',
                'description' => 'Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.'
            ],
            [
                'title' => 'Can I link multiple bank accounts?',
                'description' => 'Yes, most finance apps allow you to link multiple bank accounts, credit cards, and investment accounts for a comprehensive view of your finances.'
            ],
            [
                'title' => 'Are there any fees associated with using the app?',
                'description' => 'Many finance apps offer free versions with basic features, but some may charge for premium features or services. Be sure to check the app\'s pricing details.'
            ],
            [
                'title' => 'Can I set up budgets and financial goals?',
                'description' => 'Yes, most finance apps include budgeting tools that allow you to set spending limits and track your progress toward financial goals.'
            ],
            [
                'title' => 'Is customer support available if I need help?',
                'description' => 'Most finance apps offer customer support through various channels such as email, chat, or phone. Check the app\'s support options for more information.'
            ],
        ];

        # delete old Data
        Answer::truncate();

        # create data
        foreach ($answer as $key => $value) {
            Answer::create($value);
        }
    }
}
