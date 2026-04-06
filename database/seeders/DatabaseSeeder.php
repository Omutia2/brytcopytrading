<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\Trade;
use App\Models\TradingAccount;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Create demo user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'phone' => '+1234567890',
            'country' => 'United States',
        ]);

        // Create trading accounts
        $account1 = TradingAccount::create([
            'user_id' => $user->id,
            'broker_name' => 'XM Global',
            'account_number' => '12345678',
            'server' => 'XMGlobal-Real 5',
            'balance' => 10000.00,
            'equity' => 10250.50,
            'margin' => 500.00,
            'free_margin' => 9750.50,
            'account_type' => 'LIVE',
            'status' => 'ACTIVE',
            'is_copy_trading_enabled' => true,
        ]);

        $account2 = TradingAccount::create([
            'user_id' => $user->id,
            'broker_name' => 'IC Markets',
            'account_number' => '87654321',
            'server' => 'ICMarketsSC-Live05',
            'balance' => 5000.00,
            'equity' => 5125.30,
            'margin' => 250.00,
            'free_margin' => 4875.30,
            'account_type' => 'DEMO',
            'status' => 'ACTIVE',
            'is_copy_trading_enabled' => false,
        ]);

        // Create sample trades
        $trades = [
            [
                'user_id' => $user->id,
                'trading_account_id' => $account1->id,
                'symbol' => 'EUR/USD',
                'type' => 'BUY',
                'lot_size' => 0.10,
                'entry_price' => 1.0845,
                'exit_price' => 1.0895,
                'profit_loss' => 125.50,
                'status' => 'CLOSED',
                'opened_at' => now()->subDays(2),
                'closed_at' => now()->subDays(2)->addHours(4),
            ],
            [
                'user_id' => $user->id,
                'trading_account_id' => $account1->id,
                'symbol' => 'GBP/USD',
                'type' => 'SELL',
                'lot_size' => 0.05,
                'entry_price' => 1.2732,
                'exit_price' => 1.2745,
                'profit_loss' => -45.20,
                'status' => 'CLOSED',
                'opened_at' => now()->subDays(1),
                'closed_at' => now()->subDays(1)->addHours(3),
            ],
            [
                'user_id' => $user->id,
                'trading_account_id' => $account1->id,
                'symbol' => 'USD/JPY',
                'type' => 'BUY',
                'lot_size' => 0.15,
                'entry_price' => 148.65,
                'profit_loss' => 89.30,
                'status' => 'OPEN',
                'opened_at' => now()->subHours(6),
            ],
            [
                'user_id' => $user->id,
                'trading_account_id' => $account2->id,
                'symbol' => 'AUD/USD',
                'type' => 'BUY',
                'lot_size' => 0.08,
                'entry_price' => 0.6543,
                'profit_loss' => 34.60,
                'status' => 'OPEN',
                'opened_at' => now()->subHours(8),
            ],
            [
                'user_id' => $user->id,
                'trading_account_id' => $account1->id,
                'symbol' => 'EUR/GBP',
                'type' => 'SELL',
                'lot_size' => 0.12,
                'entry_price' => 0.8567,
                'profit_loss' => -67.80,
                'status' => 'OPEN',
                'opened_at' => now()->subHours(4),
            ],
        ];

        foreach ($trades as $trade) {
            Trade::create($trade);
        }

        // Create subscription
        Subscription::create([
            'user_id' => $user->id,
            'plan_name' => 'PRO',
            'price' => 99.99,
            'billing_cycle' => 'MONTHLY',
            'status' => 'ACTIVE',
            'starts_at' => now()->subMonth(),
            'ends_at' => now()->addMonth(),
            'features' => json_encode([
                'Unlimited copy trading',
                'Real-time execution',
                'Advanced risk management',
                'Priority support',
                'Performance analytics',
            ]),
        ]);

        // Create additional users for demo
        User::factory(5)->create();
    }
}
