<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MasterAccountController;
use App\Http\Controllers\Admin\MasterTradeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TradingAccountController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\SubscriptionController;
use Illuminate\Support\Facades\Route;

// Admin authentication routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');
    
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Users management
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        
        // Master accounts management
        Route::get('/master-accounts', [MasterAccountController::class, 'index'])->name('admin.master-accounts.index');
        Route::get('/master-accounts/create', [MasterAccountController::class, 'create'])->name('admin.master-accounts.create');
        Route::post('/master-accounts', [MasterAccountController::class, 'store'])->name('admin.master-accounts.store');
        Route::get('/master-accounts/{masterAccount}', [MasterAccountController::class, 'show'])->name('admin.master-accounts.show');
        Route::get('/master-accounts/{masterAccount}/edit', [MasterAccountController::class, 'edit'])->name('admin.master-accounts.edit');
        Route::put('/master-accounts/{masterAccount}', [MasterAccountController::class, 'update'])->name('admin.master-accounts.update');
        Route::delete('/master-accounts/{masterAccount}', [MasterAccountController::class, 'destroy'])->name('admin.master-accounts.destroy');
        
        // Master account trades management
        Route::get('/master-accounts/{masterAccount}/trades', [MasterTradeController::class, 'index'])->name('admin.master-accounts.trades');
        Route::get('/master-accounts/{masterAccount}/trades/create', [MasterTradeController::class, 'create'])->name('admin.master-accounts.trades.create');
        Route::post('/master-accounts/{masterAccount}/trades', [MasterTradeController::class, 'store'])->name('admin.master-accounts.trades.store');
        Route::get('/master-accounts/{masterAccount}/trades/{trade}', [MasterTradeController::class, 'show'])->name('admin.master-accounts.trades.show');
        Route::post('/master-accounts/{masterAccount}/trades/{trade}/close', [MasterTradeController::class, 'close'])->name('admin.master-accounts.trades.close');
        Route::delete('/master-accounts/{masterAccount}/trades/{trade}', [MasterTradeController::class, 'destroy'])->name('admin.master-accounts.trades.destroy');
        
        // Trading accounts management
        Route::get('/trading-accounts', [TradingAccountController::class, 'index'])->name('admin.trading-accounts.index');
        Route::get('/trading-accounts/create', [TradingAccountController::class, 'create'])->name('admin.trading-accounts.create');
        Route::post('/trading-accounts', [TradingAccountController::class, 'store'])->name('admin.trading-accounts.store');
        Route::get('/trading-accounts/{tradingAccount}', [TradingAccountController::class, 'show'])->name('admin.trading-accounts.show');
        Route::get('/trading-accounts/{tradingAccount}/edit', [TradingAccountController::class, 'edit'])->name('admin.trading-accounts.edit');
        Route::put('/trading-accounts/{tradingAccount}', [TradingAccountController::class, 'update'])->name('admin.trading-accounts.update');
        Route::delete('/trading-accounts/{tradingAccount}', [TradingAccountController::class, 'destroy'])->name('admin.trading-accounts.destroy');
        
        // Trades management
        Route::get('/trades', [TradeController::class, 'index'])->name('admin.trades.index');
        Route::get('/trades/create', [TradeController::class, 'create'])->name('admin.trades.create');
        Route::post('/trades', [TradeController::class, 'store'])->name('admin.trades.store');
        Route::get('/trades/{trade}', [TradeController::class, 'show'])->name('admin.trades.show');
        Route::get('/trades/{trade}/edit', [TradeController::class, 'edit'])->name('admin.trades.edit');
        Route::put('/trades/{trade}', [TradeController::class, 'update'])->name('admin.trades.update');
        Route::delete('/trades/{trade}', [TradeController::class, 'destroy'])->name('admin.trades.destroy');
        
        // Subscriptions management
        Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('admin.subscriptions.index');
        Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('admin.subscriptions.create');
        Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('admin.subscriptions.store');
        Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('admin.subscriptions.show');
        Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('admin.subscriptions.edit');
        Route::put('/subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('admin.subscriptions.update');
        Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('admin.subscriptions.destroy');
    });
});
