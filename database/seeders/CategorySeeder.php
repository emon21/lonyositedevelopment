<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Category

        $category = [

            [
                'category_name' => 'Finance',
                'category_slug' => Str::slug('Finance'),
            ],
            [
                'category_name' => 'Health Care',
                'category_slug' => Str::slug('Health Care'),
            ],
            [
                'category_name' => 'IT',
                'category_slug' => Str::slug('IT'),
            ],
            [
                'category_name' => 'Real Estate',
                'category_slug' => Str::slug('Real Estate'),
            ],
            [
                'category_name' => 'Banking',
                'category_slug' => Str::slug('Banking'),
            ], 
            [
                'category_name' => 'Business',
                'category_slug' => Str::slug('Business'),
            ],
            [
                'category_name' => 'Technology',
                'category_slug' => Str::slug('Technology'),
            ],
            [
                'category_name' => 'Development',
                'category_slug' => Str::slug('Development'),
            ],
            [
                'category_name' => 'Uncategorized',
                'category_slug' => Str::slug('Uncategorized'),
            ],
            [
                'category_name' => 'Marketing',
                'category_slug' => Str::slug('Marketing'),
            ],
            [
                'category_name' => 'Health Care',
                'category_slug' => Str::slug('Health Care'),
            ]
            
        ];

        # delete category
        // DB::table('categories')->delete();
        BlogCategory::truncate();

        # Create Category
        // DB::table('categories')->insert($category);
        // foreach($category as $item){

        //     BlogCategory::create([$item]);
        // }

        // create() এর ভিতরে অবশ্যই key => value দিতে হয়।

        // BlogCategory::create([
        //     'name' => $item,
        //     'slug' => Str::slug($item),
        // ]);

        foreach ($category as $item) {
    BlogCategory::create($item); 
        }
    }
}
