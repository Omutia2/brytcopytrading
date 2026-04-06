<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TradingAccount;
use App\Models\Trade;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'active_users' => User::whereHas('subscriptions', function($query) {
                $query->where('status', 'ACTIVE');
            })->count(),
            'total_trading_accounts' => TradingAccount::count(),
            'active_trading_accounts' => TradingAccount::where('status', 'ACTIVE')->count(),
            'total_trades' => Trade::count(),
            'open_trades' => Trade::where('status', 'OPEN')->count(),
            'total_subscriptions' => Subscription::count(),
            'active_subscriptions' => Subscription::where('status', 'ACTIVE')->count(),
            'total_profit_loss' => Trade::sum('profit_loss'),
            'total_balance' => TradingAccount::sum('balance'),
        ];

        $recentUsers = User::latest()->take(5)->get();
        $recentTrades = Trade::with('user', 'tradingAccount')->latest()->take(5)->get();
        $recentSubscriptions = Subscription::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentTrades', 'recentSubscriptions'));
    }
}
