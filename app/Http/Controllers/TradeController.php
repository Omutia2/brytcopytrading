<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\TradingAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::with('tradingAccount')
            ->where('user_id', Auth::user()->id)
            ->orderBy('opened_at', 'desc')
            ->get();
        
        $tradingAccounts = TradingAccount::where('user_id', Auth::user()->id)->get();
        
        return view('trades.index', compact('trades', 'tradingAccounts'));
    }

    public function show($id)
    {
        $trade = Trade::with('tradingAccount')
            ->where('user_id', Auth::user()->id)
            ->findOrFail($id);
        
        return view('trades.show', compact('trade'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trading_account_id' => 'required|exists:trading_accounts,id',
            'symbol' => 'required|string|max:20',
            'type' => 'required|in:BUY,SELL',
            'lot_size' => 'required|numeric|min:0.01',
            'entry_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Verify the trading account belongs to the user
        $tradingAccount = TradingAccount::where('user_id', Auth::user()->id)
            ->findOrFail($request->trading_account_id);

        $trade = new Trade();
        $trade->user_id = Auth::user()->id;
        $trade->trading_account_id = $request->trading_account_id;
        $trade->symbol = $request->symbol;
        $trade->type = $request->type;
        $trade->lot_size = $request->lot_size;
        $trade->entry_price = $request->entry_price;
        $trade->notes = $request->notes;
        $trade->status = 'OPEN';
        $trade->opened_at = now();
        $trade->save();

        return redirect()->route('trades.index')
            ->with('success', 'Trade added successfully!');
    }

    public function destroy($id)
    {
        $trade = Trade::where('user_id', Auth::user()->id)->findOrFail($id);
        $trade->delete();

        return redirect()->route('trades.index')
            ->with('success', 'Trade deleted successfully!');
    }

    public function close(Request $request, $id)
    {
        $request->validate([
            'exit_price' => 'required|numeric|min:0',
        ]);

        $trade = Trade::where('user_id', Auth::user()->id)->findOrFail($id);
        
        if ($trade->status !== 'OPEN') {
            return response()->json(['success' => false, 'message' => 'Trade is already closed'], 400);
        }

        $trade->exit_price = $request->exit_price;
        $trade->closed_at = now();
        $trade->status = 'CLOSED';
        
        // Calculate profit/loss (simplified calculation)
        $pipDifference = $trade->type === 'BUY' 
            ? $trade->exit_price - $trade->entry_price 
            : $trade->entry_price - $trade->exit_price;
        
        // This is a simplified calculation - you might want to make it more accurate based on the symbol
        $trade->profit_loss = $pipDifference * $trade->lot_size * 100000; // Assuming standard lots
        
        $trade->save();

        return response()->json(['success' => true, 'message' => 'Trade closed successfully']);
    }
}
