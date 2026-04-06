<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'master_account_id',
        'broker_name',
        'account_number',
        'server',
        'password',
        'balance',
        'equity',
        'margin',
        'free_margin',
        'risk_percentage',
        'account_type',
        'status',
        'is_copy_trading_enabled',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'equity' => 'decimal:2',
        'margin' => 'decimal:2',
        'free_margin' => 'decimal:2',
        'risk_percentage' => 'decimal:2',
        'is_copy_trading_enabled' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function masterAccount()
    {
        return $this->belongsTo(MasterAccount::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
}
