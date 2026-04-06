<?php

namespace Database\Seeders;

use App\Models\MasterAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterAccount::create([
            'name' => 'Gold Strategy Pro',
            'broker_name' => 'XM',
            'account_number' => '123456789',
            'server' => 'XMGlobal-Server 1',
            'balance' => 50000.00,
            'equity' => 52350.00,
            'status' => 'ACTIVE',
            'description' => 'Professional gold trading strategy with consistent monthly returns of 8-12%',
            'min_copy_amount' => 100.00,
            'max_copy_amount' => 10000.00,
            'copy_fee_percentage' => 5.00,
            'is_public' => true,
            'performance_stats' => [
                'monthly_return' => 10.5,
                'total_trades' => 1245,
                'win_rate' => 68.5,
                'profit_factor' => 1.85
            ]
        ]);

        MasterAccount::create([
            'name' => 'Forex Scalper Elite',
            'broker_name' => 'IC Markets',
            'account_number' => '987654321',
            'server' => 'ICMarkets-Live5',
            'balance' => 75000.00,
            'equity' => 78900.00,
            'status' => 'ACTIVE',
            'description' => 'High-frequency scalping strategy focusing on major currency pairs',
            'min_copy_amount' => 250.00,
            'max_copy_amount' => 15000.00,
            'copy_fee_percentage' => 7.50,
            'is_public' => true,
            'performance_stats' => [
                'monthly_return' => 15.2,
                'total_trades' => 3420,
                'win_rate' => 72.3,
                'profit_factor' => 2.15
            ]
        ]);

        MasterAccount::create([
            'name' => 'Conservative Growth',
            'broker_name' => 'Pepperstone',
            'account_number' => '555666777',
            'server' => 'Pepperstone-Edge02',
            'balance' => 100000.00,
            'equity' => 102500.00,
            'status' => 'ACTIVE',
            'description' => 'Low-risk strategy focused on steady growth with minimal drawdown',
            'min_copy_amount' => 500.00,
            'max_copy_amount' => 20000.00,
            'copy_fee_percentage' => 3.00,
            'is_public' => true,
            'performance_stats' => [
                'monthly_return' => 6.8,
                'total_trades' => 892,
                'win_rate' => 75.2,
                'profit_factor' => 1.45
            ]
        ]);
    }
}
