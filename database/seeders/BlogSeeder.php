<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        # blog Seeder

        // সব category নিয়ে আসি
        $categories = BlogCategory::pluck('id');
        $blogs = [
            [
                'title' => 'Laravel Best Practices',
                'description' => 'Learn modern best practices for Laravel development.',
                'photo' => null

            ],
            [
                'title' => 'PHP Clean Code Tips',
                'description' => 'Write clean and maintainable PHP code easily.',
                'photo' => null

            ],
            [
                'title' => 'Web Development Trends 2025',
                'description' => 'Latest trends in web development technologies.',
                'photo' => null

            ],

            [
                'title' => 'A guide to free personal finance software',
                'description' => 'Imagine having a tool that meticulously tracks all income and expenses savings all in one place — sounds like.',
                'photo' => null
            ],
            [
                'title' => 'AI-powered tools for increasing productivity',
                'description' => 'Artificial Intelligence (AI) has revolutionized many industries, and the field of finance and financial planning and analysis.',
                'photo' => null
            ],
            [
                'title' => 'Using finance software to boost your income',
                'description' => 'Are you aware of the fact that what is the most significant stress cause in the United States of America? If your.',
                'photo' => null
            ],
            [
                'title' => 'Why do need personal finance software',
                'description' => 'Personal finance software can help you manage your money more effectively and save on expenses. It can help you track your spending, set financial goals, and make informed financial decisions.',
                'photo' => null
            ],
            
        ];

        # Delete Blog Data
    //    Blog::truncate();

        foreach ($blogs as $blog) {
            Blog::create([
                'category_id' => $categories->random(),   // random category
                'title'       => $blog['title'],
                'slug'        => Str::slug($blog['title']),
                'description' => $blog['description'],
                'photo'       => $blog['photo'],
            ]);
        }
    }
}
