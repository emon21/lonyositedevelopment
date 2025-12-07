<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            UserSeeder::class,
            ReviewSeeder::class,
            SliderSeeder::class,
            // ServiceSeeder::class,
            // CareerSeeder::class,
            // FaqSeeder::class,
            // SettingSeeder::class,
            SiteTitleSeeder::class,
            FeatureSeeder::class,
            FinancialSeeder::class,
            AnswerSeeder::class,
            CategorySeeder::class,
            BlogSeeder::class,
        ]);
    }
}
