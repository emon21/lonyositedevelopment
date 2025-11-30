<?php

namespace Database\Seeders;

use App\Models\SiteTitle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $siteTitle = [

            // features           
            'features' => 'Features that make spending smarter',
           
            // clarifies 
            'clarifies' => 'It clarifies all strategic financial decisions',
        
            // financial 
            'financial' => 'Get all your financial updates in one place',
            
            // usability 
            'usability' => 'Its usability is simple and intuitive for users',
          
            // reviews 
            'reviews' => "Don't take our word for it, check user reviews",
            
            // answers
            'answers' => 'Find answers to all questions below',
           
            // management
            'management' => 'Start a new level of money management'  
        ];

        # Delete Old Data
        SiteTitle::truncate();

        # Insert Data
        SiteTitle::create($siteTitle);
    }
}
