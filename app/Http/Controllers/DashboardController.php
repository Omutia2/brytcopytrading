<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get user's trading accounts
        $tradingAccounts = $user->tradingAccounts()->where('status', 'ACTIVE')->get();
        
        // Get recent trades
        $recentTrades = $user->trades()->with('tradingAccount')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        
        // Get active trades
        $activeTrades = $user->trades()->where('status', 'OPEN')
            ->with('tradingAccount')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Calculate statistics
        $totalBalance = $tradingAccounts->sum('balance');
        $totalProfitLoss = $user->trades()->sum('profit_loss');
        $activeTradesCount = $user->trades()->where('status', 'OPEN')->count();
        
        return view('dashboard', compact(
            'user',
            'tradingAccounts',
            'recentTrades',
            'activeTrades',
            'totalBalance',
            'totalProfitLoss',
            'activeTradesCount'
        ));
    }
}
