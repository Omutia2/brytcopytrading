<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'broker_name',
        'account_number',
        'server',
        'balance',
        'equity',
        'status',
        'description',
        'min_copy_amount',
        'max_copy_amount',
        'copy_fee_percentage',
        'is_public',
        'performance_stats',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'equity' => 'decimal:2',
        'min_copy_amount' => 'decimal:2',
        'max_copy_amount' => 'decimal:2',
        'copy_fee_percentage' => 'decimal:2',
        'is_public' => 'boolean',
        'performance_stats' => 'array',
    ];

    public function tradingAccounts()
    {
        return $this->hasMany(TradingAccount::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    public function getActiveCopiersCount()
    {
        return $this->tradingAccounts()->where('is_copy_trading_enabled', true)->count();
    }

    public function getTotalCopiedAmount()
    {
        return $this->tradingAccounts()->where('is_copy_trading_enabled', true)->sum('balance');
    }
}
