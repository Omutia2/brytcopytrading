<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with('user')
            ->latest()
            ->paginate(20);
        
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('admin.subscriptions.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'status' => 'required|in:ACTIVE,INACTIVE,EXPIRED',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date|after:starts_at',
            'features' => 'nullable|string',
        ]);

        Subscription::create($request->all());

        return redirect()->route('admin.subscriptions.index')
            ->with('success', 'Subscription created successfully.');
    }

    public function show(Subscription $subscription)
    {
        $subscription->load('user');
        
        return view('admin.subscriptions.show', compact('subscription'));
    }

    public function edit(Subscription $subscription)
    {
        $users = User::orderBy('name')->get();
        return view('admin.subscriptions.edit', compact('subscription', 'users'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'status' => 'required|in:ACTIVE,INACTIVE,EXPIRED',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date|after:starts_at',
            'features' => 'nullable|string',
        ]);

        $subscription->update($request->all());

        return redirect()->route('admin.subscriptions.index')
            ->with('success', 'Subscription updated successfully.');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')
            ->with('success', 'Subscription deleted successfully.');
    }
}
