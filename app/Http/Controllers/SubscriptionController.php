<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'billing_cycle' => 'required|in:MONTHLY,YEARLY',
        ]);

        // Create subscription without master account (not in current schema)
        Subscription::create([
            'user_id' => Auth::user()->id,
            'plan_name' => $request->plan_name,
            'price' => $request->price,
            'billing_cycle' => $request->billing_cycle,
            'status' => 'ACTIVE',
            'starts_at' => now(),
            'ends_at' => $request->billing_cycle === 'YEARLY' ? now()->addYear() : now()->addMonth(),
            'features' => json_encode([
                'Copy trading access',
                'Real-time trade execution',
                'Performance tracking',
                'Email notifications',
                'Priority support'
            ]),
        ]);

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription created successfully!');
    }
}
