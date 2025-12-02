<?php

namespace Database\Seeders;

use App\Models\Financial;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FinancialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         $financial = Financial::create([
        // 'title' => 'Unified Financial Overview',
        // 'description' => 'Stay on top of your finances using one central dashboard.'
        
        'title' => 'Get all your financial updates in one place',
        'description' => 'This feature ensures you can easily stay on top of your finances by consolidating all updates into a single dashboard.'
        ]);

        $financial->tabs()->createMany([
        [
            'tab_icon' => 'frontend/assets/images/v1/tv.svg',
            'tab_title' => 'Unified Dashboard',
            'tab_description' => 'View all your accounts, transactions & investments in one central location. See every credit & debit transaction as it happens across all your accounts. Get a complete view of your expenses with expense categories.',
            'order_number' => 1,
        ],
        [
            'tab_icon' => 'frontend/assets/images/v1/alerm.svg',
            'tab_title' => 'Real-Time Updates',
            'tab_description' => 'This feature ensures you can easily stay on top of your finances by consolidating all updates into a single dashboard.View all your accounts, transactions iew of your expenses with expense categories.',
            'order_number' => 2,
        ],
    ]);
    }
}
